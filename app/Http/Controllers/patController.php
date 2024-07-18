<?php

namespace App\Http\Controllers;

use ZipArchive;
use App\Models\pat;
use Illuminate\Http\Request;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use Illuminate\Support\Facades\Storage;

class patController extends Controller
{
    public function index()
    {
        $pat = pat::get();
        return view('page.exam.pat.pat', compact('pat'));
    }

    public function create()
    {
        return view('page.exam.pat.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'tahun_ajaran' => 'required',
            'kelas' => 'required',
            'mapel' => 'required',
            'kisi_kisi' => 'file|max:2056',
            'soal' => 'file|max:2056',
            'jawaban' => 'file|max:2056',
            'proker' => 'file|max:2056',
            'kehadiran' => 'file|max:2056',
            'ba' => 'file|max:2056',
            'sk_panitia' => 'file|max:2056',
            'tatib' => 'file|max:2056',
            'surat_pemberitahuan' => 'file|max:2056',
            'jadwal' => 'file|max:2056',
            'daftar_nilai' => 'file|max:2056',
            'tanda_terima_dan_penerimaan_soal' => 'file|max:2056',
            'kehadiran_panitia' => 'file|max:2056',
        ], [
            'tahun_ajaran.required' => 'Tahun ajaran harus diisi',
            'kelas.required' => 'Kelas harus diisi',
            'mapel.required' => 'Mapel harus diisi',
        ]);

        // Menyimpan file-file yang di-upload dengan nama asli
        $fileFields = [
            'kisi_kisi', 'soal', 'jawaban', 'proker', 'kehadiran',
            'ba', 'sk_panitia', 'tatib', 'surat_pemberitahuan', 'jadwal', 'daftar_nilai', 'tanda_terima_dan_penerimaan_soal', 'kehadiran_panitia'
        ];

        foreach ($fileFields as $fileField) {
            if ($request->file($fileField)) {
                $file = $request->file($fileField);
                $originalName = $file->getClientOriginalName();
                $validateData[$fileField] = $file->storeAs($fileField, $originalName);
            }
        }

        pat::create($validateData);

        return redirect('/pat')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pat = pat::find($id);
        return view('page.exam.pat.edit', compact('pat'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'tahun_ajaran' => 'required',
            'kelas' => 'required',
            'mapel' => 'required',
            'kisi_kisi' => 'file|max:2056',
            'soal' => 'file|max:2056',
            'jawaban' => 'file|max:2056',
            'proker' => 'file|max:2056',
            'kehadiran' => 'file|max:2056',
            'ba' => 'file|max:2056',
            'sk_panitia' => 'file|max:2056',
            'tatib' => 'file|max:2056',
            'surat_pemberitahuan' => 'file|max:2056',
            'jadwal' => 'file|max:2056',
            'daftar_nilai' => 'file|max:2056',
            'tanda_terima_dan_penerimaan_soal' => 'file|max:2056',
            'kehadiran_panitia' => 'file|max:2056',
        ], [
            'tahun_ajaran.required' => 'Tahun ajaran harus diisi',
            'kelas.required' => 'Kelas harus diisi',
            'mapel.required' => 'Mapel harus diisi',
        ]);

        $pat = pat::findOrFail($id);

        $fileFields = [
            'kisi_kisi', 'soal', 'jawaban', 'proker', 'kehadiran',
            'ba', 'sk_panitia', 'tatib', 'surat_pemberitahuan', 'jadwal', 'daftar_nilai', 'tanda_terima_dan_penerimaan_soal', 'kehadiran_panitia'
        ];

        foreach ($fileFields as $fileField) {
            if ($request->file($fileField)) {
                // Hapus file lama jika ada
                if ($pat->$fileField) {
                    Storage::delete($pat->$fileField);
                }
                // Simpan file baru
                $file = $request->file($fileField);
                $originalName = $file->getClientOriginalName();
                $validateData[$fileField] = $file->storeAs($fileField, $originalName);
            } else {
                // Set the field to the old value if no file was uploaded
                $validateData[$fileField] = $pat->$fileField;
            }
        }

        $pat->update($validateData);

        return redirect('/pat')->with('success', 'Data berhasil diperbaharui');
    }


    public function destroy($id)
    {
        $pat = pat::findOrFail($id);

        $fileFields = [
            'kisi_kisi', 'soal', 'jawaban', 'proker', 'kehadiran',
            'ba', 'sk_panitia', 'tatib', 'surat_pemberitahuan', 'jadwal', 'daftar_nilai', 'tanda_terima_dan_penerimaan_soal', 'kehadiran_panitia'
        ];

        foreach ($fileFields as $fileField) {
            if ($pat->$fileField) {
                Storage::delete($pat->$fileField);
            }
        }

        $pat->delete();

        return redirect('/pat')->with('success', 'Data berhasil dihapus');
    }

    public function download($id)
    {
        $pat = pat::findOrFail($id);

        $directories = [
           'kisi_kisi', 'soal', 'jawaban', 'proker', 'kehadiran',
            'ba', 'sk_panitia', 'tatib', 'surat_pemberitahuan', 'jadwal', 'daftar_nilai', 'tanda_terima_dan_penerimaan_soal', 'kehadiran_panitia'
        ];

        // Create a temporary file to store the zip
        $zipFileName = 'pat_files_' . $pat->mapel . '.zip';
        $zipFilePath = storage_path('app/temp/' . $zipFileName);

        // Ensure the temp directory exists
        if (!Storage::exists('temp')) {
            Storage::makeDirectory('temp');
        }

        // Initialize zip archive
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($directories as $dir) {
                if ($pat->$dir) {
                    $dirPath = public_path('storage/' . $pat->$dir);
                    if (is_dir($dirPath)) {
                        $this->addDirectoryToZip($zip, $dirPath, $dir);
                    } elseif (is_file($dirPath)) {
                        $zip->addFile($dirPath, $dir . '/' . basename($dirPath));
                    }
                }
            }
            $zip->close();

            // Download the created zip file
            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        } else {
            return back()->with('error', 'Failed to create zip file');
        }
    }

    private function addDirectoryToZip($zip, $dirPath, $zipPath)
    {
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($dirPath),
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file) {
            if (!$file->isDir()) {
                // Get the relative path for the zip file
                $filePath = $file->getRealPath();
                $relativePath = $zipPath . '/' . substr($filePath, strlen($dirPath) + 1);

                // Add file to the zip
                $zip->addFile($filePath, $relativePath);
            }
        }
    }
}
