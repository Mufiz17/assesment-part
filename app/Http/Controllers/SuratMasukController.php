<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Tambahkan baris ini




class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suratMasuk = SuratMasuk::all();
        return view('page.korespondensi.index', compact('suratMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     */

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
            'jenis_surat' => 'required',
            'perihal' => 'required',
            'dari' => 'required',
            'file_surat' => 'required|mimes:pdf|file'
        ], [
            'tp.required'=> 'Kolom ini wajib diisi',
            'tanggal.required'=> 'Kolom ini wajib diisi',
            'no_surat.required'=> 'Kolom ini wajib diisi',
            'jenis_surat.required'=> 'Kolom ini wajib diisi',
            'perihal.required'=> 'Kolom ini wajib diisi',
            'dari.required'=> 'Kolom ini wajib diisi',
            'file_surat.required'=> 'Wajib upload file',
        ]);

        $file = $request->file('file_surat');
        $fileName = $file->getClientOriginalName();
        $validated['file_surat'] = $file->storeAs('surat-masuk', $fileName);


        SuratMasuk::create($validated);
        return redirect()->route('inbox.index')->with('success', 'Data surat masuk berhasil ditambahkan');
    }

    // download
    public function download($id)
    {
        $import = SuratMasuk::findOrFail($id);

        $filePath = public_path('storage/' . $import->file_surat);

        return response()->download($filePath);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        return view('database.inbox.edit', compact('suratMasuk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
                // dd($request->all());
        $validated = $request->validate([
            'tp' => 'nullable',
            'tanggal' => 'nullable|date',
            'no_surat' => 'nullable',
            'jenis_surat' => 'nullable',
            'perihal' => 'nullable',
            'dari' => 'nullable',
            'file_surat' => 'nullable|mimes:pdf|file'
        ], [
            'tp.nullable'=> 'Kolom ini wajib diisi',
            'tanggal.nullable'=> 'Kolom ini wajib diisi',
            'no_surat.nullable'=> 'Kolom ini wajib diisi',
            'jenis_surat.nullable'=> 'Kolom ini wajib diisi',
            'perihal.nullable'=> 'Kolom ini wajib diisi',
            'dari.nullable'=> 'Kolom ini wajib diisi',
            'file_surat.mimes'=> 'File harus berupa format PDF',
        ]);

        $suratMasuk = SuratMasuk::findOrFail($id);

        if ($request->hasFile('file_surat')) {
            $file = $request->file('file_surat');
            $fileName = $file->getClientOriginalName();
            $validated['file_surat'] = $file->storeAs('surat-masuk', $fileName);

            // Hapus file lama jika ada
            if ($suratMasuk->file_surat) {
                Storage::disk('public')->delete($suratMasuk->file_surat);
            }
        }

        $suratMasuk->update($validated);

        return redirect()->route('inbox.index')->with('success', 'Data surat masuk berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        SuratMasuk::findOrFail($id)->delete();
        return redirect()->route('inbox.index')->with('success', 'Data surat masuk berhasil dihapus');
    }
}
