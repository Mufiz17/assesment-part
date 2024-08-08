<?php

namespace App\Http\Controllers;

use App\Models\average;
use Illuminate\Http\Request;

class averageController extends Controller
{
    public function index()
    {
        $rerata = average::get();
        return view('page.rapor.rerata.rerata', compact('rerata'));
    }
    public function create()
    {
        return view('page.rapor.rerata.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'angkatan' => 'required',
            'pai' => 'nullable|numeric|min:0|max:100',
            'pkn' => 'nullable|numeric|min:0|max:100',
            'indo' => 'nullable|numeric|min:0|max:100',
            'mtk' => 'nullable|numeric|min:0|max:100',
            'sejindo' => 'nullable|numeric|min:0|max:100',
            'bhs_asing' => 'nullable|numeric|min:0|max:100',
            'sbd' => 'nullable|numeric|min:0|max:100',
            'pjok' => 'nullable|numeric|min:0|max:100',
            'simdig' => 'nullable|numeric|min:0|max:100',
            'fis' => 'nullable|numeric|min:0|max:100',
            'kim' => 'nullable|numeric|min:0|max:100',
            'sis_kom' => 'nullable|numeric|min:0|max:100',
            'komjar' => 'nullable|numeric|min:0|max:100',
            'progdas' => 'nullable|numeric|min:0|max:100',
            'ddg' => 'nullable|numeric|min:0|max:100',
            'iaas' => 'nullable|numeric|min:0|max:100',
            'paas' => 'nullable|numeric|min:0|max:100',
            'saas' => 'nullable|numeric|min:0|max:100',
            'siot' => 'nullable|numeric|min:0|max:100',
            'skj' => 'nullable|numeric|min:0|max:100',
            'pkk' => 'nullable|numeric|min:0|max:100',
        ]);

        average::create([
            'angkatan' => $request->angkatan,
            'pai' => $request->pai,
            'pkn' => $request->pkn,
            'indo' => $request->indo,
            'mtk' => $request->mtk,
            'sejindo' => $request->sejindo,
            'bhs_asing' => $request->bhs_asing,
            'sbd' => $request->sbd,
            'pjok' => $request->pjok,
            'simdig' => $request->simdig,
            'fis' => $request->fis,
            'kim' => $request->kim,
            'sis_kom' => $request->sis_kom,
            'komjar' => $request->komjar,
            'progdas' => $request->progdas,
            'ddg' => $request->ddg,
            'iaas' => $request->iaas,
            'paas' => $request->paas,
            'saas' => $request->saas,
            'siot' => $request->siot,
            'skj' => $request->skj,
            'pkk' => $request->pkk,
        ]);

        return redirect("/penilaian/rapor/rerata")->with("success", "Berhasil ditambahkan");

    }
}
