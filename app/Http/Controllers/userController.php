<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\userModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use App\Models\clientModel;
use App\Models\kendaraanModel;
use App\Models\penitipanModel;
use App\Models\User;

class userController extends Controller
{

    protected $UserModel;
    protected $clientModel;
    protected $kendaraanModel;
    protected $penitipanModel;
    public function __construct()
    {
        $this->UserModel = new User();
        $this->clientModel = new clientModel();
        $this->kendaraanModel = new kendaraanModel();
        $this->penitipanModel = new penitipanModel();
    }
    //    <-------------- FITUR LOGIN -------------->

    // LOGIN
    public function login()
    {
        return view('page/login');
    }

    public function auth(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/menu'); //regenerete agar melewati middle ware terlebih dahulu
            }
            session::put('logErr', 'Login failed!!');
            return back()->with('logErr', session::get('logErr'));
        } catch (ValidationException $e) {
            session::put('logErr', 'Login failed!!');
            return back()->with('logErr', session::get('logErr'));
        }
    }

    // LOGOUT
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    // VIEW REGIST
    public function register()
    {
        return view('page/register');
    }

    // SAVE REGIST
    public function registerSave(Request $request)
    {
        $client = new clientModel();
        try {
            $clientId = $client::orderBy('idClient', 'desc')->limit(1)->pluck('idClient')->first();
            if ($clientId === null) {
                $isClient = 1;
            } else {
                $isClient = $clientId + 1;
            }

            $request->validate([
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users', 'email')
                ],
                'nama' => 'required',
                'noTelp' => 'required',
                'alamat' => 'required',
                'password' => 'required'
            ]);
            clientModel::create([
                'idClient' => $isClient,
                'namaClient' => $request->input('nama'),
                'notelpClient' => $request->input('noTelp'),
                'alamatClient' => $request->input('alamat')
            ]);

            $generet = Hash::make($request->input('password')); //GENERET CODE
            User::create([
                'name' => $request->input('nama'),
                'idClient' => $isClient,
                'email' => $request->input('email'),
                'password' => $generet
            ]);
            return redirect('login')->with('success', 'Regist Success');
        } catch (ValidationException $e) {
            session::put('logErr', 'Regist Failed!!');
            return back()->with('logErr', session::get('logErr'));
        }
    }
    //    <-------------- END FITUR LOGIN -------------->


    //    <-------------- MENU -------------->
    public function menu()
    {
        $user = Auth::user();
        $client = $this->clientModel->where('idClient', $user->idClient)->first();
        $idClient = $client->idClient;
        $data = [
            'name' => $user->name,
            'idClient' => $idClient
        ];
        if ($user->idClient == 1) {
            return view('admin/index', $data);
        } else {
            return view('page/menu', $data);
        }
    }


    //    <-------------- PROFILE -------------->
    public function profile()
    {
        $user = Auth::user();
        $client = clientModel::where('idClient', $user->idClient)->first();
        $transport = kendaraanModel::where('idClient', $client->idClient)->get();
        $Hasport = [];
        foreach ($transport as $trs) {
            $Hasport[] = [
                'plat' => $trs->plat ?? null,
                'kendaraan' => $trs->jenis ?? null
            ];
        }

        $data = [
            'user' => [
                'name' => $user->name,
                'noTelp' => $client->notelpClient,
                'alamat' => $client->alamatClient,
            ],
            'transport' => $Hasport
        ];
        return view('page/profile', $data);
    }


    //    <-------------- PAGE CREATE TRANSPORT -------------->
    public function createTransport()
    {
        return view('page/transcreate');
    }


    //    <-------------- PAGE CREATE TRANSPORT -------------->
    public function checkin()
    {
        $user = Auth::user();
        $idClient = $user->idClient;
        $transport = $this->kendaraanModel->where('idClient', $idClient)->get();
        $trs = [];

        foreach ($transport as $value) {
            $trs[] = ['plat' => $value->plat ?? null];
        }
        $data = [
            'name' => $user->name,
            'plat' => $trs,
            'title' => 'checkin',
        ];
        return view('page/checkin', $data);
    }

    public function shooter(Request $request)
    {
        $user = Auth::user();
        $plat = $request->input('plat');
        $data = [
            'title' => 'Shooter',
            'qr' => $plat
        ];
        return view('page/shooter', $data);
    }

    public function status()
    {
        $users = Auth::user();
        $idClient = $users->idClient;
        $penitipan = $this->penitipanModel
            ->where('idClient', $idClient)
            ->orderBy('start', 'desc')
            ->get();
        $pnpn = [];
        foreach ($penitipan as $value) {
            $pnpn[] = [
                'idPenitipan' => $value->idPenitipan ?? null,
                'plat' => $value->plat ?? null,
                'status' => $value->status ?? null,
                'start' => $value->start ?? null,
                'end' => $value->end ?? null
            ];
        }

        $data = [
            'title' => 'STATUS',
            'penitipan' => $pnpn
        ];
        return view('page/status', $data);
    }

    public function detailPenitip($idPenitipan)
    {
        $penitipan = $this->penitipanModel->where('idPenitipan', $idPenitipan)->first();
        $data = [
            'title' => 'Detail Penitipan',
            'penitip' => $penitipan
        ];
        return view('page/detail', $data);
    }

    public function parkNow()
    {
        $parkNow = $this->penitipanModel->where('status', "MENITIP")->get();
        $length = $parkNow->count();
        $data = [
            'parkNow' => $length
        ];
        return view('page/index', $data);
    }
}
