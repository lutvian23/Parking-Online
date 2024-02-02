<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\kendaraanModel;
use Illuminate\Http\Request;

class kendaraanController extends Controller
{
    public function kendaraan()
    {
        $userTransport = DB::table('users')
            ->select('kendaraan.*,users.*')
            ->join('kendaraan', 'users.plat = kendaraan.plat')
            ->get();
        $data = [
            'userTransport' => $userTransport,
            'kendaraan' => kendaraanModel::all()
        ];
        return view('page/profile', $data);
    }
}
