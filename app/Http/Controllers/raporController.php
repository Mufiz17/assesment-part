<?php

namespace App\Http\Controllers;

use App\Models\rapor;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class raporController extends Controller
{
    public function index()
    {
        $rapor = rapor::get();
        return view('page.rapor.rapor', compact('rapor'));
    }

    public function create()
    {
        return view('page.rapor.create');
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

        rapor::create([
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
            'beriman' => $request->beriman,
            'mandiri' => $request->mandiri,
            'gotong_royong' => $request->gotong_royong,
            'pramuka' => $request->pramuka,
            'bultang' => $request->bultang,
            'futsal' => $request->futsal,
            'silat' => $request->silat,
            'desc_pramuka' => $request->desc_pramuka,
            'desc_bultang' => $request->desc_bultang,
            'desc_futsal' => $request->desc_futsal,
            'desc_silat' => $request->desc_silat,
            'izin' => $request->izin,
            'sakit' => $request->sakit,
            'alpha' => $request->alpha,
            'prestasi' => $request->prestasi,
            'note' => $request->note,
            'pai' => $request->pai,
            'desc_pai' => $request->desc_pai,
            'pkn' => $request->pkn,
            'desc_pkn' => $request->desc_pkn,
            'indo' => $request->indo,
            'desc_indo' => $request->desc_indo,
            'mtk' => $request->mtk,
            'desc_mtk' => $request->desc_mtk,
            'sejindo' => $request->sejindo,
            'desc_sejindo' => $request->desc_sejindo,
            'bhs_asing' => $request->bhs_asing,
            'desc_bhs_asing' => $request->desc_bhs_asing,
            'sbd' => $request->sbd,
            'desc_sbd' => $request->desc_sbd,
            'pjok' => $request->pjok,
            'desc_pjok' => $request->desc_pjok,
            'simdig' => $request->simdig,
            'desc_simdig' => $request->desc_simdig,
            'fis' => $request->fis,
            'desc_fis' => $request->desc_fis,
            'kim' => $request->kim,
            'desc_kim' => $request->desc_kim,
            'sis_kom' => $request->sis_kom,
            'desc_sis_kom' => $request->desc_sis_kom,
            'komjar' => $request->komjar,
            'desc_komjar' => $request->desc_komjar,
            'progdas' => $request->progdas,
            'desc_progdas' => $request->desc_progdas,
            'ddg' => $request->ddg,
            'desc_ddg' => $request->desc_ddg,
            'iaas' => $request->iaas,
            'desc_iaas' => $request->desc_iaas,
            'paas' => $request->paas,
            'desc_paas' => $request->desc_paas,
            'saas' => $request->saas,
            'desc_saas' => $request->desc_saas,
            'siot' => $request->siot,
            'desc_siot' => $request->desc_siot,
            'skj' => $request->skj,
            'desc_skj' => $request->desc_skj,
            'pkk' => $request->pkk,
            'desc_pkk' => $request->desc_pkk,
        ]);

        return redirect("/rapor")->with("success", "Berhasil disimpan");
    }

    public function edit($id)
    {
        $rapor = rapor::find($id);
        return view('page.rapor.edit', compact('rapor'));
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

        rapor::find($id)->update([
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
            'beriman' => $request->beriman,
            'mandiri' => $request->mandiri,
            'gotong_royong' => $request->gotong_royong,
            'pramuka' => $request->pramuka,
            'bultang' => $request->bultang,
            'futsal' => $request->futsal,
            'silat' => $request->silat,
            'desc_pramuka' => $request->desc_pramuka,
            'desc_bultang' => $request->desc_bultang,
            'desc_futsal' => $request->desc_futsal,
            'desc_silat' => $request->desc_silat,
            'izin' => $request->izin,
            'sakit' => $request->sakit,
            'alpha' => $request->alpha,
            'prestasi' => $request->prestasi,
            'note' => $request->note,
            'pai' => $request->pai,
            'desc_pai' => $request->desc_pai,
            'pkn' => $request->pkn,
            'desc_pkn' => $request->desc_pkn,
            'indo' => $request->indo,
            'desc_indo' => $request->desc_indo,
            'mtk' => $request->mtk,
            'desc_mtk' => $request->desc_mtk,
            'sejindo' => $request->sejindo,
            'desc_sejindo' => $request->desc_sejindo,
            'bhs_asing' => $request->bhs_asing,
            'desc_bhs_asing' => $request->desc_bhs_asing,
            'sbd' => $request->sbd,
            'desc_sbd' => $request->desc_sbd,
            'pjok' => $request->pjok,
            'desc_pjok' => $request->desc_pjok,
            'simdig' => $request->simdig,
            'desc_simdig' => $request->desc_simdig,
            'fis' => $request->fis,
            'desc_fis' => $request->desc_fis,
            'kim' => $request->kim,
            'desc_kim' => $request->desc_kim,
            'sis_kom' => $request->sis_kom,
            'desc_sis_kom' => $request->desc_sis_kom,
            'komjar' => $request->komjar,
            'desc_komjar' => $request->desc_komjar,
            'progdas' => $request->progdas,
            'desc_progdas' => $request->desc_progdas,
            'ddg' => $request->ddg,
            'desc_ddg' => $request->desc_ddg,
            'iaas' => $request->iaas,
            'desc_iaas' => $request->desc_iaas,
            'paas' => $request->paas,
            'desc_paas' => $request->desc_paas,
            'saas' => $request->saas,
            'desc_saas' => $request->desc_saas,
            'siot' => $request->siot,
            'desc_siot' => $request->desc_siot,
            'skj' => $request->skj,
            'desc_skj' => $request->desc_skj,
            'pkk' => $request->pkk,
            'desc_pkk' => $request->desc_pkk,
        ]);

        return redirect("/rapor")->with("success", "Berhasil diPerbaharui");
    }

    public function destroy($id)
    {
        rapor::findOrFail($id)->delete();
        return redirect("/rapor")->with("success", "Berhasil dihapus");
    }

    public function pdf($id)
    {
        $rapor = Rapor::findOrFail($id);
        $pdf = Pdf::loadView('page.rapor.merdeka', compact('rapor'));
        return $pdf->stream('rapor.pdf');
    }

    // public function chart($id)
    // {
    //     $rapor = Rapor::findOrFail($id);
    //     $chartData = [
    //         '$rapor->pai',
    //         '$rapor->pkn',
    //         '$rapor->indo',
    //         '$rapor->mtk',
    //         '$rapor->sejindo',
    //         '$rapor->bhs_asing',
    //         '$rapor->sbd',
    //         '$rapor->pjok',
    //         '$rapor->simdig',
    //         '$rapor->fis',
    //         '$rapor->kim',
    //         '$rapor->sis_kom',
    //         '$rapor->komjar',
    //         '$rapor->progdas',
    //         '$rapor->ddg',
    //         '$rapor->iaas',
    //         '$rapor->paas',
    //         '$rapor->saas',
    //         '$rapor->siot',
    //         '$rapor->skj',
    //         '$rapor->pkk'
    //     ];


    //     return view('page.rapor.rapor', compact('rapor', 'chartData'));
    // }
}
