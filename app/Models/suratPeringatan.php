<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suratPeringatan extends Model
{
    use HasFactory;

    protected $table ='surat_peringatan';

    protected $fillable = [
        'tp',
        'tanggal',
        'subjek',
        'no_surat',
        'alasan',
        'sp',
        'keterangan',
        'file_surat',
        'start_date',
        'end_date',
        'siswa',
        'guru'
    ];

    protected $dates = ['tanggal'];
}
