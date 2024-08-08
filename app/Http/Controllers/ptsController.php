<?php

namespace App\Http\Controllers;

use ZipArchive;
use App\Models\pts;
use Illuminate\Http\Request;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use Illuminate\Support\Facades\Storage;

class ptsController extends Controller
{
    public function index()
    {
        $pts = pts::get();
        return view('page.exam.pts.pts', compact('pts'));
    }

    public function create()
    {
        return view('page.exam.pts.create');
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

        pts::create($validateData);

        return redirect('/penilaian/pts')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pts = pts::find($id);
        return view('page.exam.pts.edit', compact('pts'));
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

        $pts = pts::findOrFail($id);

        $fileFields = [
            'kisi_kisi', 'soal', 'jawaban', 'proker', 'kehadiran',
            'ba', 'sk_panitia', 'tatib', 'surat_pemberitahuan', 'jadwal', 'daftar_nilai', 'tanda_terima_dan_penerimaan_soal', 'kehadiran_panitia'
        ];

        foreach ($fileFields as $fileField) {
            if ($request->file($fileField)) {
                // Hapus file lama jika ada
                if ($pts->$fileField) {
                    Storage::delete($pts->$fileField);
                }
                // Simpan file baru
                $file = $request->file($fileField);
                $originalName = $file->getClientOriginalName();
                $validateData[$fileField] = $file->storeAs($fileField, $originalName);
            } else {
                // Set the field to the old value if no file was uploaded
                $validateData[$fileField] = $pts->$fileField;
            }
        }

        $pts->update($validateData);

        return redirect('/penilaian/pts')->with('success', 'Data berhasil diperbaharui');
    }


    public function destroy($id)
    {
        $pts = pts::findOrFail($id);

        $fileFields = [
            'kisi_kisi', 'soal', 'jawaban', 'proker', 'kehadiran',
            'ba', 'sk_panitia', 'tatib', 'surat_pemberitahuan', 'jadwal', 'daftar_nilai', 'tanda_terima_dan_penerimaan_soal', 'kehadiran_panitia'
        ];

        foreach ($fileFields as $fileField) {
            if ($pts->$fileField) {
                Storage::delete($pts->$fileField);
            }
        }

        $pts->delete();

        return redirect('/penilaian/pts')->with('success', 'Data berhasil dihapus');
    }

    public function download($id)
    {
        $pts = pts::findOrFail($id);

        $directories = [
           'kisi_kisi', 'soal', 'jawaban', 'proker', 'kehadiran',
            'ba', 'sk_panitia', 'tatib', 'surat_pemberitahuan', 'jadwal', 'daftar_nilai', 'tanda_terima_dan_penerimaan_soal', 'kehadiran_panitia'
        ];

        // Create a temporary file to store the zip
        $zipFileName = 'pts_files_' . $pts->mapel . '.zip';
        $zipFilePath = storage_path('app/temp/' . $zipFileName);

        // Ensure the temp directory exists
        if (!Storage::exists('temp')) {
            Storage::makeDirectory('temp');
        }

        // Initialize zip archive
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($directories as $dir) {
                if ($pts->$dir) {
                    $dirPath = public_path('storage/' . $pts->$dir);
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


