<?php

namespace App\Http\Controllers;

use App\Models\clientModel;
use Illuminate\Validation\Rule;
use App\Models\kendaraanModel;
use App\Models\penitipanModel;
use App\Models\User;
use App\Http\Controllers\DateTime;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;


class adminController extends Controller
{
    protected $userModel;
    protected $kendaraanModel;
    protected $clientModel;
    protected $penitipanModel;

    public function __construct()
    {
        $this->userModel = new User();
        $this->kendaraanModel = new kendaraanModel();
        $this->clientModel = new clientModel();
        $this->penitipanModel = new penitipanModel();
    }

    public function checkin()
    {
        $gwt = $this->userModel->admin();
        $convert = substr($gwt, 0, 15);
        $data = [
            'title' => 'Scanner',
            'qr' => $convert

        ];
        return view('admin/scan', $data);
    }

    public function user(Request $request)
    {
        $keyword = $request->input("keyword");
        $client = $this->clientModel->client($keyword);
        $clt = [];
        foreach ($client as $value) {
            $clt[] = [
                'idClient' => $value->idClient ?? null,
                'namaClient' => $value->namaClient ?? null,
                'noTelp' => $value->notelpClient ?? null,
                'alamat' => $value->alamatClient ?? null,
                'jumlah' => $value->Jumlah_kendaraan ?? null
            ];
        }
        $data = [
            'title' => 'User',
            'client' => $clt
        ];
        return view('admin/user', $data);
    }

    public function detail($idClient)
    {
        $client = $this->clientModel->where('idClient', $idClient)->first();
        $users = $this->userModel->where('idClient', $idClient)->first();
        $transport = $this->kendaraanModel->where('idClient', $idClient)->get();
        $data = [
            'title' => 'Detail',
            'client' => $client,
            'users' => $users,
            'transport' => $transport

        ];
        return view('admin/detail', $data);
    }

    public function editProfile($idClient)
    {
        $client = $this->clientModel->where('idClient', $idClient)->first();
        $users = $this->userModel->where('idClient', $idClient)->first();
        $data = [
            'title' => 'edit User',
            'client' => $client,
            'users' => $users

        ];
        return view('admin/editprofile', $data);
    }

    public function update(Request $request, $idClient)
    {
        $users = $this->userModel->where('idClient', $idClient)->first();
        $oldEmail = $users->email;
        $newEmail = $request->input('email');
        if ($oldEmail === $newEmail) {
            $validats = 'required|email';
        } else {
            $validats = 'required|email|' . Rule::unique('users')->ignore($idClient);
        }
        try {
            $request->validate([
                'nama' => 'required',
                'noTelp' => 'required',
                'email' => $validats,
                'alamat' => 'required',
            ]);
            $this->clientModel->where('idClient', $idClient)->update([
                'namaClient' => $request->input('nama'),
                'notelpClient' => $request->input('noTelp'),
                'alamatClient' => $request->input('alamat'),
            ]);

            return redirect(url('/detail/' . $idClient . '/admin'));
        } catch (ValidationException $e) {
            return back()->with('logErr', 'Harap isi dengan benar');
        };
    }

    public function addData($idClient)
    {
        $data = [
            'title' => 'tambah Barang',
            'idClient' => $idClient
        ];
        return view('admin/add', $data);
    }

    public function createTransport(Request $request, $idClient)
    {
        $inputan = [
            'plat' => $request->input('plat'),
            'jenis' => $request->input('jenis'),
            'ktp' => $request->input('ktp'),
            'stnk' => $request->input('stnk')
        ];
        $validator = Validator::make($inputan, [
            'plat' => 'required|unique:kendaraan',
            'jenis' => 'required',
            'ktp' => 'required',
            'stnk' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->with('logErr', 'Pastikan semua di isi dengan benar');
        }
        return redirect(url('/detail/' . $idClient . '/admin'))->with('success', 'Kendaraan berhasil di tambahkan');
    }

    public function deleteTransport(Request $request)
    {
        $idKendaraan = $request->input('idKendaraan');
        $this->kendaraanModel->deletes($idKendaraan);
        return back()->with('success', 'kendaraan berhasil di hapus');
    }

    public function checkinPlat(Request $request)
    {
        $plat = $request->input('plat');

        if (is_numeric($plat)) {
            $client = $this->penitipanModel->where('idPenitipan', $plat)->first();
            $idPenitipan = optional($client)->idPenitipan;
            $status = $client->status;
            if ($idPenitipan) {
                if ($status === "OFF") {
                    return back()->with('logErr', 'Kendaraan sudah keluar');
                }
                $timestamp = now()->toDateTime();
                $this->penitipanModel->where('idPenitipan', $idPenitipan)->update([
                    'status' => 'OFF',
                    'end' => $timestamp
                ]);
                return back()->with('success', 'Kendaraan berhasil keluar');
            } else {
                return back()->with('logErr', 'plat tidak terdaftar');
            }
        }
        $client = $this->kendaraanModel->where('plat', $plat)->first();
        if (empty($client)) {
            return back()->with('logErr', 'plat tidak terdaftar');
        }
        $idClient = $client->idClient;
        $timestamp = now()->toDateTime();
        $this->penitipanModel->create([
            'idClient' => $idClient,
            'status' => 'MENITIP',
            'plat' => $request->input('plat'),
            'start' => $timestamp

        ]);
        return redirect(url('menu'))->with('success', 'Checkin berhasil');
    }

    public function statusAdmin()
    {
        $penitipan = $this->penitipanModel->where('status', "OFF")->get();
        $data = [
            'title' => "History",
            'penitipan' => $penitipan
        ];
        return view('admin/history', $data);
    }
}
