<?php

namespace App\Http\Controllers;

use App\Models\rpts;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class rptsController extends Controller
{
    public function index()
    {
        $rpts = rpts::get();
        return view('page.rapor.pts.rapor', compact('rpts'));
    }

    public function create()
    {
        return view('page.rapor.pts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun_ajaran' => 'required',
            'kelas' => 'required',
            'nama' => 'required',
            'semester' => 'required',
            'nisn' => 'required',
        ], [
            'tahun_ajaran.required' => 'Tahun ajaran harus diisi',
            'kelas.required' => 'Kelas harus diisi',
            'nama.required' => 'Nama harus diisi',
            'semester.required' => 'Semester harus diisi',
        ]);

        rpts::create([
            'tahun_ajaran' => $request->tahun_ajaran,
            'kelas' => $request->kelas,
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'semester' => $request->semester,
            'released' => $request->released,
            'wname' => $request->wname,
            'nip' => $request->nip,
            'hmaster' => $request->hmaster,
            'hmnip' => $request->hmnip,
            'kehadiran' => $request->kehadiran,
            'izin' => $request->izin,
            'sakit' => $request->sakit,
            'alpha' => $request->alpha,
            'note' => $request->note,
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

        return redirect("/penilaian/rpts")->with("success", "Berhasil disimpan");
    }

    public function edit($id)
    {
        $rpts = rpts::find($id);
        return view('page.rapor.pts.edit', compact('rpts'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun_ajaran' => 'required',
            'kelas' => 'required',
            'nama' => 'required',
            'semester' => 'required',
            'nisn' => 'required',
        ], [
            'tahun_ajaran.required' => 'Tahun ajaran harus diisi',
            'kelas.required' => 'Kelas harus diisi',
            'nama.required' => 'Nama harus diisi',
            'semester.required' => 'Semester harus diisi',
            'nisn.required' => 'NISN harus diisi',
        ]);

        rpts::find($id)->update([
            'tahun_ajaran' => $request->tahun_ajaran,
            'kelas' => $request->kelas,
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'semester' => $request->semester,
            'released' => $request->released,
            'wname' => $request->wname,
            'nip' => $request->nip,
            'hmaster' => $request->hmaster,
            'hmnip' => $request->hmnip,
            'kehadiran' => $request->kehadiran,
            'izin' => $request->izin,
            'sakit' => $request->sakit,
            'alpha' => $request->alpha,
            'note' => $request->note,
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

        return redirect("/penilaian/rpts")->with("success", "Berhasil diPerbaharui");
    }

    public function destroy($id)
    {
        rpts::findOrFail($id)->delete();
        return redirect("/penilaian/rpts")->with("success", "Berhasil dihapus");
    }

    public function pdf($id)
    {
        $rpts = rpts::findOrFail($id);
        $pdf = Pdf::loadView('page.rapor.pts.merdeka', compact('rpts'));
        return $pdf->stream('rpts.pdf');
    }
}
