<?php

namespace App\Http\Controllers;

use App\Models\tahsin;
use Illuminate\Http\Request;

class tahsinController extends Controller
{
    public function index()
    {
        $tahsin = tahsin::get();
        return view('page.keasramaan.quran.tahsin.tahsin', compact('tahsin'));
    }

    public function create()
    {
        return view('page.keasramaan.quran.tahsin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'kelas' => 'required',
            'nama' => 'required',
            'surat' => 'required',
            'ayat' => 'required',
            'predikat' => 'required',
            'pengajar' => 'required',
        ], [
            'tanggal.required' => 'Tahun ajaran harus diisi',
            'kelas.required' => 'Kelas harus diisi',
            'nama.required' => 'Nama harus diisi',
            'surat.required' => 'Surat harus diisi',
            'ayat.required' => 'Ayat harus diisi',
            'predikat.required' => 'Predikat harus diisi',
            'pengajar.required' => 'Pengajar harus diisi',
        ]);

        tahsin::create([
            'tanggal' => $request->tanggal,
            'kelas' => $request->kelas,
            'nama' => $request->nama,
            'surat' => $request->surat,
            'ayat' => $request->ayat,
            'predikat' => $request->predikat,
            'pengajar' => $request->pengajar,
        ]);

        return redirect("/sekolah-keasramaan/al-quran/tahsin")->with("success", "Berhasil disimpan");
    }

    public function edit($id)
    {
        $tahsin = tahsin::find($id);
        return view('page.keasramaan.quran.tahsin.edit', compact('tahsin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required',
            'kelas' => 'required',
            'nama' => 'required',
            'surat' => 'required',
            'ayat' => 'required',
            'predikat' => 'required',
            'pengajar' => 'required',
        ], [
            'tanggal.required' => 'Tahun ajaran harus diisi',
            'kelas.required' => 'Kelas harus diisi',
            'nama.required' => 'Nama harus diisi',
            'surat.required' => 'Surat harus diisi',
            'ayat.required' => 'Ayat harus diisi',
            'predikat.required' => 'Predikat harus diisi',
            'pengajar.required' => 'Pengajar harus diisi',
        ]);

        tahsin::find($id)->update([
            'tanggal' => $request->tanggal,
            'kelas' => $request->kelas,
            'nama' => $request->nama,
            'surat' => $request->surat,
            'ayat' => $request->ayat,
            'predikat' => $request->predikat,
            'pengajar' => $request->pengajar,
        ]);

        return redirect("/sekolah-keasramaan/al-quran/tahsin")->with("success", "Berhasil diPerbaharui");
    }

    public function destroy($id)
    {
        tahsin::findOrFail($id)->delete();
        return redirect("/sekolah-keasramaan/al-quran/tahsin")->with("success", "Berhasil dihapus");
    }
}
