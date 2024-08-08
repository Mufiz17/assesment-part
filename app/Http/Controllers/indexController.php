<?php

namespace App\Http\Controllers;

use App\Models\nomorSurat;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use App\Models\suratPengajuan;
use App\Models\suratPeringatan;
use App\Http\Controllers\NotulensiController;
use App\Models\notulensi;

class indexController extends Controller
{
    public function index(){
        $suratmasuk = SuratMasuk::all();
        $suratkeluar = SuratKeluar::all();
        $suratperingatan = suratPeringatan::all();
        $nomorsurat = nomorSurat::all();
        $notulensi = notulensi::all();
        $suratpengajuan= suratPengajuan::all();

        return view('page.home.korespondensi', compact('suratmasuk', 'suratkeluar', 'nomorsurat', 'suratperingatan', 'suratpengajuan', 'notulensi'));
    }
}
