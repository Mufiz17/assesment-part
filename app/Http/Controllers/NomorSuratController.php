<?php

namespace App\Http\Controllers;

use App\Models\nomorSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NomorSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
           'tp' => 'required',
           'tanggal' => 'required|date',
           'no_surat' => 'required',
           'keperluan' => 'required',
           'file_surat' => 'required|mimes:pdf|file'
        ],[
            'tp.required'=> 'Kolom ini wajib diisi',
            'tanggal.required'=> 'Kolom ini wajib diisi',
            'no_surat.required'=> 'Kolom ini wajib diisi',
            'keperluan.required'=> 'Kolom ini wajib diisi',
            'file_surat.required'=> 'Wajib upload file',
        ]);

        $validated['file_surat'] = $request->file('file_surat')->store('nomor-surat');

        nomorSurat::create($validated);
        return redirect()->route('inbox.index')->with('success', 'Data nomor surat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validasi input
    $validated = $request->validate([
        'tp' => 'required',
        'tanggal' => 'required|date',
        'no_surat' => 'required',
        'keperluan' => 'required',
        'file_surat' => 'nullable|mimes:pdf|file' // Nullable karena file tidak harus diupload kembali
    ], [
        'tp.required' => 'Kolom ini wajib diisi',
        'tanggal.required' => 'Kolom ini wajib diisi',
        'no_surat.required' => 'Kolom ini wajib diisi',
        'keperluan.required' => 'Kolom ini wajib diisi',
        'file_surat.mimes' => 'File harus berupa PDF',
    ]);

    // Cari nomor surat berdasarkan ID
    $nomorSurat = nomorSurat::findOrFail($id);

    // Update file jika diupload
    if ($request->hasFile('file_surat')) {
        // Hapus file lama jika ada
        if ($nomorSurat->file_surat) {
            Storage::delete($nomorSurat->file_surat);
        }
        // Simpan file baru
        $validated['file_surat'] = $request->file('file_surat')->store('nomor-surat');
    }

    // Update data
    $nomorSurat->update($validated);

    // Redirect dengan pesan sukses
    return redirect()->route('inbox.index')->with('success', 'Data nomor surat berhasil diupdate');
}

public function downloadSurat($id)
{
    $no_surat = nomorSurat::findOrFail($id);

    if ($no_surat->file_surat && Storage::exists($no_surat->file_surat)) {
        return Storage::download($no_surat->file_surat);
    }

    return redirect()->route('inbox.index')->with('error', 'File surat tidak ditemukan');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        nomorSurat::findOrFail($id)->delete();
        return redirect()->route('inbox.index')->with('success', 'Data notulensi berhasil dihapus');
    }
}
