<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notulensi extends Model
{
    use HasFactory;

    protected $table = 'notulensi';

    protected $primarykey = 'id';

    protected $fillable = [
        'tp',
        'tanggal',
        'waktu',
        'daring',
        'materi',
        'pemateri',
        'peserta',
        'hasil',
        'file_surat',
        'file_dokumentasi',
        'start_date',
        'end_date',
    ];

    protected $dates = ['tanggal'];
}
