<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kharian extends Model
{
    protected $fillable = [
        'tanggal', 'koderekening', 'namapegawai', 'uraian', 'jumlahanggaran'
    ];
}
