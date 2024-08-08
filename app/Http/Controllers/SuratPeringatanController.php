<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\suratPeringatan;
use Illuminate\Support\Facades\Storage;

class SuratPeringatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */


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
            'subjek' => 'required',
            'no_surat' => 'required',
            'alasan' => 'required',
            'sp' => 'required',
            'keterangan' => 'nullable',
            'file_surat' => 'required|mimes:pdf|file',
            'siswa' => 'nullable',
            'guru' => 'nullable',
        ], [
            'tp.required' => 'Kolom ini wajib diisi',
            'tanggal.required' => 'Kolom ini wajib diisi',
            'subjek.required' => 'Kolom ini wajib diisi',
            'no_surat.required' => 'Kolom ini wajib diisi',
            'alasan.required' => 'Kolom ini wajib diisi',
            'sp.required' => 'Kolom ini wajib diisi',
            'file_surat.required' => 'Wajib upload file',
        ]);

        $validated['file_surat'] = $request->file('file_surat')->store('surat-peringatan');

        suratPeringatan::create($validated);
        return redirect()->route('inbox.index')->with('success', 'Data surat peringatan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function download($id)
    {
        $suratPeringatan = suratPeringatan::findOrFail($id);

        if ($suratPeringatan->file_surat && Storage::exists($suratPeringatan->file_surat)) {
            return Storage::download($suratPeringatan->file_surat);
        }

        return redirect()->route('inbox.index')->with('error', 'File surat tidak ditemukan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tp' => 'required',
            'tanggal' => 'required|date',
            'subjek' => 'required',
            'no_surat' => 'required',
            'alasan' => 'required',
            'sp' => 'required',
            'keterangan' => 'nullable',
            'file_surat' => 'nullable|mimes:pdf|file',
            'siswa' => 'nullable',
            'guru' => 'nullable',
        ], [
            'tp.required' => 'Kolom ini wajib diisi',
            'tanggal.required' => 'Kolom ini wajib diisi',
            'subjek.required' => 'Kolom ini wajib diisi',
            'no_surat.required' => 'Kolom ini wajib diisi',
            'alasan.required' => 'Kolom ini wajib diisi',
            'sp.required' => 'Kolom ini wajib diisi',
            'file_surat.mimes' => 'File harus berupa format PDF',
        ]);

        $suratPeringatan = SuratPeringatan::findOrFail($id);

        if ($request->hasFile('file_surat')) {
            // Hapus file lama jika ada
            if ($suratPeringatan->file_surat) {
                Storage::disk('public')->delete($suratPeringatan->file_surat);
            }
            // Simpan file baru
            $validated['file_surat'] = $request->file('file_surat')->store('surat-peringatan');
        }

        $suratPeringatan->update($validated);

        return redirect()->route('inbox.index')->with('success', 'Data surat peringatan berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        suratPeringatan::findOrFail($id)->delete();
        return redirect()->route('inbox.index')->with('success', 'Data surat peringatan berhasil dihapus');
    }
}
