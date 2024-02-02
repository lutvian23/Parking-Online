<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kendaraanModel extends Model
{
    protected $table = 'kendaraan';
    protected $primarykey = 'idKendaraan';
    protected $keyType = 'int';
    public $incrementing = false;
    protected $fillable = ['idKendaraan', 'plat', 'jenis', 'idClient'];

    public function deletes($idKendaraan)
    {
        return $this->where('idKendaraan', $idKendaraan)->delete();
    }
}
