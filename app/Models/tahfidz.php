<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tahfidz extends Model
{
    use HasFactory;
    protected $table = 'tahfidz';
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
