<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class clientModel extends Model
{
    protected $table = 'client';
    protected $primarykey = 'idClient';
    protected $increment = false;
    protected $keyType = 'string';
    protected $fillable = ['idClient', 'namaClient', 'notelpClient', 'alamatClient'];


    public function client($keyword)
    {
        if ($keyword != null) {
            $result = DB::table('client')
                ->leftJoin('kendaraan', 'kendaraan.idClient', '=', 'client.idClient')
                ->select('client.idClient', 'client.namaClient', 'client.notelpClient', 'client.alamatClient', DB::raw('COUNT(kendaraan.idClient) as Jumlah_kendaraan'))
                ->where('namaClient', $keyword)->orWhere('plat', $keyword)
                ->groupBy('client.idClient', 'client.namaClient', 'client.notelpClient', 'client.alamatClient')
                ->get();
        } else {
            $result = DB::table('client')
                ->leftJoin('kendaraan', 'kendaraan.idClient', '=', 'client.idClient')
                ->select('client.idClient', 'client.namaClient', 'client.notelpClient', 'client.alamatClient', DB::raw('COUNT(kendaraan.idClient) as Jumlah_kendaraan'))
                ->groupBy('client.idClient', 'client.namaClient', 'client.notelpClient', 'client.alamatClient')
                ->get();
        }
        return $result;
    }
}
