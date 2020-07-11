<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharian extends Model
{
    protected $fillable = [
        'tanggal', 'namapegawai', 'keterangan', 'jumlahpemasukan'
    ];
}
