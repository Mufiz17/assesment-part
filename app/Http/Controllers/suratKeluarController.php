<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class suratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $suratKeluar = SuratKeluar::all();
        return view('page.korespondensi.index', compact('suratKeluar'));
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
        $validated=$request->validate([
            'tp' => 'required',
            'tanggal' => 'required|date',
            'no_surat' => 'required',
            'jenis_surat' => 'required',
            'perihal' => 'required',
            'kepada' => 'required',
            'file_surat' => 'required|mimes:pdf|file'
        ], [
            'tp.required'=> 'Kolom ini wajib diisi',
            'tanggal.required'=> 'Kolom ini wajib diisi',
            'no_surat.required'=> 'Kolom ini wajib diisi',
            'jenis_surat.required'=> 'Kolom ini wajib diisi',
            'perihal.required'=> 'Kolom ini wajib diisi',
            'kepada.required'=> 'Kolom ini wajib diisi',
            'file_surat.required'=> 'Wajib upload file',

        ]);

        $validated['file_surat'] = $request->file('file_surat')->store('surat-keluar');

        SuratKeluar::create($validated);

        return redirect()->route('inbox.index')->with('success', 'Data surat keluar berhasil ditambahkan');
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

        // dd($request->all());
        $validated = $request->validate([
            'tp' => 'required',
            'tanggal' => 'required|date',
            'no_surat' => 'required',
            'jenis_surat' => 'required',
            'perihal' => 'required',
            'kepada' => 'required',
            'file_surat' => 'nullable|mimes:pdf|file' // Nullable karena tidak wajib diisi saat update
        ], [
            'tp.required'=> 'Kolom ini wajib diisi',
            'tanggal.required'=> 'Kolom ini wajib diisi',
            'no_surat.required'=> 'Kolom ini wajib diisi',
            'jenis_surat.required'=> 'Kolom ini wajib diisi',
            'perihal.required'=> 'Kolom ini wajib diisi',
            'kepada.required'=> 'Kolom ini wajib diisi',
            'file_surat.mimes'=> 'File harus berupa format PDF',
        ]);

        $suratKeluar = SuratKeluar::findOrFail($id);

        if ($request->hasFile('file_surat')) {
            // Hapus file lama jika ada
            if ($suratKeluar->file_surat) {
                Storage::disk('public')->delete($suratKeluar->file_surat);
            }
            // Simpan file baru
            $validated['file_surat'] = $request->file('file_surat')->store('surat-keluar');
        }

        $suratKeluar->update($validated);

        return redirect()->route('inbox.index')->with('success', 'Data surat keluar berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SuratKeluar::findOrFail($id)->delete();
        return redirect()->route('inbox.index')->with('success', 'Data surat keluar berhasil dihapus');
    }
}
