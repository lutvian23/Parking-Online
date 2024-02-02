<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penitipanModel extends Model
{
    protected $table = 'penitipan';
    protected $primarykey = 'idPenitipan';
    // protected $keyType = 'int';
    public $incrementing = false;
    protected $fillable = ['idClient', 'plat', 'status', 'start', 'end'];
}
