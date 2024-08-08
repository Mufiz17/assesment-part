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
        // Validasi input
        $request->validate([
            'tahun_ajaran' => 'required',
            'kelas' => 'required',
            'nama' => 'required',
            'semester' => 'required',
            'nisn' => 'required',
            // Tambahkan validasi untuk input lain sesuai kebutuhan
        ], [
            'tahun_ajaran.required' => 'Tahun ajaran harus diisi',
            'kelas.required' => 'Kelas harus diisi',
            'nama.required' => 'Nama harus diisi',
            'semester.required' => 'Semester harus diisi',
            // Tambahkan pesan validasi lainnya jika perlu
        ]);

        // Mengumpulkan data dari request
        $data = $request->only([
           'tahun_ajaran',
            'kelas',
            'nama',
            'nisn',
            'semester',
            'released',
            'wname',
            'nip',
            'hmaster',
            'hmnip',
            'beriman',
            'mandiri',
            'gotong_royong',
            'pramuka',
            'bultang',
            'futsal',
            'silat',
            'desc_pramuka',
            'desc_bultang',
            'desc_futsal',
            'desc_silat',
            'izin',
            'sakit',
            'alpha',
            'prestasi', // Ini bisa berupa JSON jika menyimpan beberapa nilai
            'desc_prestasi', // Ini bisa berupa JSON jika menyimpan beberapa nilai
            'note',
            'pai',
            'desc_pai',
            'pkn',
            'desc_pkn',
            'indo',
            'desc_indo',
            'mtk',
            'desc_mtk',
            'sejindo',
            'desc_sejindo',
            'bhs_asing',
            'desc_bhs_asing',
            'sbd',
            'desc_sbd',
            'pjok',
            'desc_pjok',
            'simdig',
            'desc_simdig',
            'fis',
            'desc_fis',
            'kim',
            'desc_kim',
            'sis_kom',
            'desc_sis_kom',
            'komjar',
            'desc_komjar',
            'progdas',
            'desc_progdas',
            'ddg',
            'desc_ddg',
            'iaas',
            'desc_iaas',
            'paas',
            'desc_paas',
            'saas',
            'desc_saas',
            'siot',
            'desc_siot',
            'skj',
            'desc_skj',
            'pkk',
            'desc_pkk',
        ]);

        // Menyimpan data prestasi dan deskripsi prestasi jika ada
        $data['prestasi'] = $request->input('prestasi', []);
        $data['desc_prestasi'] = $request->input('desc_prestasi', []);

        // Membuat entri baru di database
        rapor::create($data);

        return redirect("/penilaian/rapor")->with("success", "Berhasil disimpan");
    }


    public function edit($id)
    {
        $rapor = rapor::find($id);
        return view('page.rapor.edit', compact('rapor'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'tahun_ajaran' => 'required',
            'kelas' => 'required',
            'nama' => 'required',
            'semester' => 'required',
            'nisn' => 'required',
            'prestasi.*' => 'nullable|string', // Validasi untuk array prestasi
            'desc_prestasi.*' => 'nullable|string', // Validasi untuk array desc_prestasi
            // Tambahkan validasi untuk input lain sesuai kebutuhan
        ], [
            'tahun_ajaran.required' => 'Tahun ajaran harus diisi',
            'kelas.required' => 'Kelas harus diisi',
            'nama.required' => 'Nama harus diisi',
            'semester.required' => 'Semester harus diisi',
            'prestasi.*.string' => 'Prestasi harus berupa string',
            'desc_prestasi.*.string' => 'Deskripsi prestasi harus berupa string',
            // Tambahkan pesan validasi lainnya jika perlu
        ]);

        // Temukan entri yang akan diperbarui
        $rapor = Rapor::findOrFail($id);

        // Mengumpulkan data dari request
        $data = $request->only([
            'tahun_ajaran',
            'kelas',
            'nama',
            'nisn',
            'semester',
            'released',
            'wname',
            'nip',
            'hmaster',
            'hmnip',
            'beriman',
            'mandiri',
            'gotong_royong',
            'pramuka',
            'bultang',
            'futsal',
            'silat',
            'desc_pramuka',
            'desc_bultang',
            'desc_futsal',
            'desc_silat',
            'izin',
            'sakit',
            'alpha',
            'prestasi', // Ini bisa berupa JSON jika menyimpan beberapa nilai
            'desc_prestasi', // Ini bisa berupa JSON jika menyimpan beberapa nilai
            'note',
            'pai',
            'desc_pai',
            'pkn',
            'desc_pkn',
            'indo',
            'desc_indo',
            'mtk',
            'desc_mtk',
            'sejindo',
            'desc_sejindo',
            'bhs_asing',
            'desc_bhs_asing',
            'sbd',
            'desc_sbd',
            'pjok',
            'desc_pjok',
            'simdig',
            'desc_simdig',
            'fis',
            'desc_fis',
            'kim',
            'desc_kim',
            'sis_kom',
            'desc_sis_kom',
            'komjar',
            'desc_komjar',
            'progdas',
            'desc_progdas',
            'ddg',
            'desc_ddg',
            'iaas',
            'desc_iaas',
            'paas',
            'desc_paas',
            'saas',
            'desc_saas',
            'siot',
            'desc_siot',
            'skj',
            'desc_skj',
            'pkk',
            'desc_pkk',
        ]);

        $data['prestasi'] = $request->input('prestasi', []);
        $data['desc_prestasi'] = $request->input('desc_prestasi', []);

        // Update entri di database
        $rapor->update($data);

        return redirect("/penilaian/rapor")->with("success", "Berhasil diperbarui");
    }


    public function destroy($id)
    {
        rapor::findOrFail($id)->delete();
        return redirect("/penilaian/rapor")->with("success", "Berhasil dihapus");
    }

    public function pdf($id)
    {
        $rapor = Rapor::findOrFail($id);
        $pdf = Pdf::loadView('page.rapor.merdeka', compact('rapor'));
        return $pdf->stream('rapor.pdf');
    }
}
