<?php

namespace App\Http\Controllers;

use App\Models\notulensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NotulensiController extends Controller
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
        //
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
            'waktu' => 'required',
            'daring' => 'required',
            'materi' => 'required',
            'peserta' => 'required',
            'pemateri' => 'required',
            'hasil' => 'required',
            'file_surat' => 'required|mimes:pdf|file',
            'file_dokumentasi' => 'nullable|mimes:jpg,jpeg,png|file'
        ], [
            'tp.required' => 'Kolom ini wajib diisi',
            'tanggal.required' => 'Kolom ini wajib diisi',
            'waktu.required' => 'Kolom ini wajib diisi',
            'daring.required' => 'Kolom ini wajib diisi',
            'materi.required' => 'Kolom ini wajib diisi',
            'peserta.required' => 'Kolom ini wajib diisi',
            'pemateri.required' => 'Kolom ini wajib diisi',
            'hasil.required' => 'Kolom ini wajib diisi',
            'file_surat.required' => 'Wajib upload file surat',
            'file_surat.mimes' => 'File surat harus berupa PDF',
            'file_dokumentasi.mimes' => 'File dokumentasi harus berupa JPG, JPEG, atau PNG',
        ]);

        $validated['file_surat'] = $request->file('file_surat')->store('notulensi-surat');
        if ($request->hasFile('file_dokumentasi')) {
            $validated['file_dokumentasi'] = $request->file('file_dokumentasi')->store('notulensi-dokumentasi');
        }

        notulensi::create($validated);
        return redirect()->route('inbox.index')->with('success', 'Data notulensi berhasil ditambahkan');
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

    public function downloadSurat($id)
    {
        $notulensi = Notulensi::findOrFail($id);

        if ($notulensi->file_surat && Storage::exists($notulensi->file_surat)) {
            return Storage::download($notulensi->file_surat);
        }

        return redirect()->route('inbox.index')->with('error', 'File surat tidak ditemukan');
    }

    /**
     * Download the specified file dokumentasi.
     */
    public function downloadDokumentasi($id)
    {
        $notulensi = Notulensi::findOrFail($id);

        if ($notulensi->file_dokumentasi && Storage::exists($notulensi->file_dokumentasi)) {
            return Storage::download($notulensi->file_dokumentasi);
        }

        return redirect()->route('inbox.index')->with('error', 'File dokumentasi tidak ditemukan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tp' => 'required',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'daring' => 'required',
            'peserta' => 'required',
            'pemateri' => 'required',
            'materi' => 'required',
            'hasil' => 'required',
            'file_surat' => 'nullable|mimes:pdf|file',
            'file_dokumentasi' => 'nullable|mimes:jpg,jpeg,png|file'
        ], [
            'tp.required' => 'Kolom ini wajib diisi',
            'tanggal.required' => 'Kolom ini wajib diisi',
            'waktu.required' => 'Kolom ini wajib diisi',
            'daring.required' => 'Kolom ini wajib diisi',
            'materi.required' => 'Kolom ini wajib diisi',
            'peserta.required' => 'Kolom ini wajib diisi',
            'pemateri.required' => 'Kolom ini wajib diisi',
            'hasil.required' => 'Kolom ini wajib diisi',
            'file_surat.mimes' => 'File surat harus berupa PDF',
            'file_dokumentasi.mimes' => 'File dokumentasi harus berupa JPG, JPEG, atau PNG',
        ]);

        $notulensi = Notulensi::findOrFail($id);

        if ($request->hasFile('file_surat')) {
            if ($notulensi->file_surat) {
                Storage::delete($notulensi->file_surat);
            }
            $validated['file_surat'] = $request->file('file_surat')->store('notulensi-surat');
        }

        if ($request->hasFile('file_dokumentasi')) {
            if ($notulensi->file_dokumentasi) {
                Storage::delete($notulensi->file_dokumentasi);
            }
            $validated['file_dokumentasi'] = $request->file('file_dokumentasi')->store('notulensi-dokumentasi');
        }

        $notulensi->update($validated);

        return redirect()->route('inbox.index')->with('success', 'Data notulensi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        notulensi::findOrFail($id)->delete();
        return redirect()->route('inbox.index')->with('success', 'Data notulensi berhasil dihapus');
    }
}
