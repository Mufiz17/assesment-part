<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suratPengajuan extends Model
{
    use HasFactory;
    // use HasFormatRupiah;
    protected $table = 'surat_pengajuan';

    protected $fillable = [
        'tp',
        'tanggal',
        'no_surat',
        'jenis_pengajuan',
        'nominal',
        'nama_pengajuan',
        'file_surat',
        'start_date',
        'end_date'
    ];

    protected $dates = ['tanggal'];
}
