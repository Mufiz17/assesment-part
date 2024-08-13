<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tahsin extends Model
{
    use HasFactory;
    protected $table = 'tahsin';
    protected $fillable = [
        'tanggal',
        'kelas',
        'nama',
        'surat',
        'ayat',
        'predikat',
        'pengajar',
    ];
}
