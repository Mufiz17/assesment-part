<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class average extends Model
{
    use HasFactory;
    protected $table = 'average';
    protected $fillable = [
        'angkatan',
        'pai',
        'pkn',
        'indo',
        'mtk',
        'sejindo',
        'bhs_asing',
        'sbd',
        'pjok',
        'simdig',
        'fis',
        'kim',
        'sis_kom',
        'komjar',
        'progdas',
        'ddg',
        'iaas',
        'paas',
        'saas',
        'siot',
        'skj',
        'pkk',
    ];
}
