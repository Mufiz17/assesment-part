<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\suratPengajuan;
use Illuminate\Support\Facades\Storage;

class SuratPengajuanController extends Controller
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
            'no_surat' => 'required',
            'jenis_pengajuan' => 'required',
            'nama_pengajuan' => 'required',
            'nominal' => 'required',
            'file_surat' => 'required|mimes:pdf|file'
        ]);

        $validated['file_surat'] = $request->file('file_surat')->store('surat-pengajuan');

        suratPengajuan::create($validated);
        return redirect()->route('inbox.index')->with('success', 'Data surat pengajuan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function download($id)
    {
        $suratPengajuan = suratPengajuan::findOrFail($id);

        if ($suratPengajuan->file_surat && Storage::exists($suratPengajuan->file_surat)) {
            return Storage::download($suratPengajuan->file_surat);
        }

        return redirect()->route('inbox.index')->with('error', 'File surat tidak ditemukan');
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
        $validated = $request->validate([
            'tp' => 'required',
            'tanggal' => 'required|date',
            'no_surat' => 'required',
            'jenis_pengajuan' => 'required',
            'nama_pengajuan' => 'required',
            'nominal' => 'required',
            'file_surat' => 'required|mimes:pdf|file'
        ]);

        $suratPengajuan = suratPengajuan::findOrFail($id);

        if ($request->hasFile('file_surat')) {
            $validated['file_surat'] = $request->file('file_surat')->store('surat-pengajuan');
        }

        $suratPengajuan->update($validated);
        return redirect()->route('inbox.index')->with('success', 'Data surat pengajuan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        suratPengajuan::findOrFail($id)->delete();
        return redirect()->route('inbox.index')->with('success', 'Data surat pengajuan berhasil dihapus');
    }
}
