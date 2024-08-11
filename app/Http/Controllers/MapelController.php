<?php

namespace App\Http\Controllers;

use ZipArchive;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MapelController extends Controller
{
    public function index(Request $request)
    {
        $tahunAjaranFilter = $request->query('tahun_ajaran', '');
        $kelasFilter = $request->query('kelas', '');
        $mapelFilter = $request->query('mapel', '');

        $query = Mapel::query();

        if ($tahunAjaranFilter) {
            $query->where('tahun_ajaran', $tahunAjaranFilter);
        }

        if ($kelasFilter) {
            $query->where('kelas', $kelasFilter);
        }

        if ($mapelFilter) {
            $query->where('mapel', $mapelFilter);
        }

        $mapels = $query->paginate(10);

        $tahunAjaranOptions = Mapel::select('tahun_ajaran')->distinct()->pluck('tahun_ajaran');
        $kelasOptions = Mapel::select('kelas')->distinct()->pluck('kelas');
        $mapelOptions = Mapel::select('mapel')->distinct()->pluck('mapel');

        return view('page.mapel.index', compact('mapels', 'tahunAjaranFilter', 'kelasFilter', 'mapelFilter', 'tahunAjaranOptions', 'kelasOptions', 'mapelOptions'));
    }


    public function create()
    {
        return view('page.mapel.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validateData = $request->validate([
            'tahun_ajaran' => 'required',
            'kelas' => 'required',
            'mapel' => 'required',
            'kategori_kurikulum' => 'required',
            'pkg' => 'nullable|file|max:2056',
            'silabus' => 'nullable|file|max:2056',
            'ki_kd_skl' => 'nullable|file|max:2056',
            'kode_etik' => 'nullable|file|max:2056',
            'program_semester' => 'nullable|file|max:2056',
            'program_tahunan' => 'nullable|file|max:2056',
            'kaldik_sekolah' => 'nullable|file|max:2056',
            'jak' => 'nullable|file|max:2056',
            'analisi_waktu' => 'nullable|file|max:2056',
            'daftar_hadir_siswa' => 'nullable|file|max:2056',
            'jadwal_pelajaran' => 'nullable|file|max:2056',
            'kisi_kisi_soal_kartu_soal' => 'nullable|file|max:2056',
            'rpp_1.*' => 'nullable|file|max:2056',
            'pendukung_rpp_1.*' => 'nullable|file|max:2056',
            'rpp_2.*' => 'nullable|file|max:2056',
            'pendukung_rpp_2.*' => 'nullable|file|max:2056',
            'rpp_3.*' => 'nullable|file|max:2056',
            'pendukung_rpp_3.*' => 'nullable|file|max:2056',
            'rpp_4.*' => 'nullable|file|max:2056',
            'pendukung_rpp_4.*' => 'nullable|file|max:2056',
            'rpp_5.*' => 'nullable|file|max:2056',
            'pendukung_rpp_5.*' => 'nullable|file|max:2056',
            'rpp_6.*' => 'nullable|file|max:2056',
            'pendukung_rpp_6.*' => 'nullable|file|max:2056',
            'rpp_7.*' => 'nullable|file|max:2056',
            'pendukung_rpp_7.*' => 'nullable|file|max:2056',
            'rpp_8.*' => 'nullable|file|max:2056',
            'pendukung_rpp_8.*' => 'nullable|file|max:2056',
            'rpp_9.*' => 'nullable|file|max:2056',
            'pendukung_rpp_9.*' => 'nullable|file|max:2056',
            'rpp_10.*' => 'nullable|file|max:2056',
            'pendukung_rpp_10.*' => 'nullable|file|max:2056',
            'rpp_11.*' => 'nullable|file|max:2056',
            'pendukung_rpp_11.*' => 'nullable|file|max:2056',
            'rpp_12.*' => 'nullable|file|max:2056',
            'pendukung_rpp_12.*' => 'nullable|file|max:2056',
            'rpp_13.*' => 'nullable|file|max:2056',
            'pendukung_rpp_13.*' => 'nullable|file|max:2056',
        ], [
            'tahun_ajaran.required' => 'Tahun ajaran harus diisi',
            'kelas.required' => 'Kelas harus diisi',
            'mapel.required' => 'Mapel harus diisi',
            'kategori_kurikulum.required' => 'Kategori harus diisi',
        ]);

        $fileFields = [
            'pkg',
            'silabus',
            'ki_kd_skl',
            'kode_etik',
            'program_semester',
            'program_tahunan',
            'kaldik_sekolah',
            'jak',
            'analisi_waktu',
            'daftar_hadir_siswa',
            'jadwal_pelajaran',
            'kisi_kisi_soal_kartu_soal',
            'rpp_1',
            'pendukung_rpp_1',
            'rpp_2',
            'pendukung_rpp_2',
            'rpp_3',
            'pendukung_rpp_3',
            'rpp_4',
            'pendukung_rpp_4',
            'rpp_5',
            'pendukung_rpp_5',
            'rpp_6',
            'pendukung_rpp_6',
            'rpp_7',
            'pendukung_rpp_7',
            'rpp_8',
            'pendukung_rpp_8',
            'rpp_9',
            'pendukung_rpp_9',
            'rpp_10',
            'pendukung_rpp_10',
            'rpp_11',
            'pendukung_rpp_11',
            'rpp_12',
            'pendukung_rpp_12',
            'rpp_13',
            'pendukung_rpp_13',
        ];

        foreach ($fileFields as $fileField) {
            if (strpos($fileField, 'rpp') !== false && $request->hasFile($fileField)) {
                $rppFiles = [];
                foreach ($request->file($fileField) as $file) {
                    $originalName = $file->getClientOriginalName();
                    $rppFiles[] = $file->storeAs($fileField, $originalName);
                }
                $validateData[$fileField] = json_encode($rppFiles); // Simpan sebagai JSON
            } elseif ($request->hasFile($fileField)) {
                $file = $request->file($fileField);
                $originalName = $file->getClientOriginalName();
                $validateData[$fileField] = $file->storeAs($fileField, $originalName);
            }
        }

        // Simpan data ke database
        Mapel::create($validateData);

        return redirect()->route('mapel.index')->with('success', 'Mapel created successfully.');
    }

    public function edit($id)
    {
        $mapel = Mapel::findOrFail($id);
        $rppFiles = Storage::files('rpp');

        return view('page.mapel.edit', compact('mapel', 'rppFiles'));
    }

    public function update(Request $request, $id)
    {
        $mapel = Mapel::findOrFail($id);

        $validateData = $request->validate([
            'tahun_ajaran' => 'required',
            'kelas' => 'required',
            'mapel' => 'required',
            'kategori_kurikulum' => 'required',
            'pkg' => 'nullable|file|max:2056',
            'silabus' => 'nullable|file|max:2056',
            'ki_kd_skl' => 'nullable|file|max:2056',
            'kode_etik' => 'nullable|file|max:2056',
            'program_semester' => 'nullable|file|max:2056',
            'program_tahunan' => 'nullable|file|max:2056',
            'kaldik_sekolah' => 'nullable|file|max:2056',
            'jak' => 'nullable|file|max:2056',
            'analisi_waktu' => 'nullable|file|max:2056',
            'daftar_hadir_siswa' => 'nullable|file|max:2056',
            'jadwal_pelajaran' => 'nullable|file|max:2056',
            'kisi_kisi_soal_kartu_soal' => 'nullable|file|max:2056',
            'rpp_1.*' => 'nullable|file|max:2056',
            'rpp_2.*' => 'nullable|file|max:2056',
            'rpp_3.*' => 'nullable|file|max:2056',
            'rpp_4.*' => 'nullable|file|max:2056',
            'rpp_5.*' => 'nullable|file|max:2056',
            'rpp_6.*' => 'nullable|file|max:2056',
            'rpp_7.*' => 'nullable|file|max:2056',
            'rpp_8.*' => 'nullable|file|max:2056',
            'rpp_9.*' => 'nullable|file|max:2056',
            'rpp_10.*' => 'nullable|file|max:2056',
            'rpp_11.*' => 'nullable|file|max:2056',
            'rpp_12.*' => 'nullable|file|max:2056',
            'rpp_13.*' => 'nullable|file|max:2056',
        ], [
            'tahun_ajaran.required' => 'Tahun ajaran harus diisi',
            'kelas.required' => 'Kelas harus diisi',
            'mapel.required' => 'Mapel harus diisi',
            'kategori_kurikulum.required' => 'Kategori harus diisi',
        ]);

        $fileFields = [
            'pkg',
            'silabus',
            'ki_kd_skl',
            'kode_etik',
            'program_semester',
            'program_tahunan',
            'kaldik_sekolah',
            'jak',
            'analisi_waktu',
            'daftar_hadir_siswa',
            'jadwal_pelajaran',
            'kisi_kisi_soal_kartu_soal',
            'rpp_1',
            'rpp_2',
            'rpp_3',
            'rpp_4',
            'rpp_5',
            'rpp_6',
            'rpp_7',
            'rpp_8',
            'rpp_9',
            'rpp_10',
            'rpp_11',
            'rpp_12',
            'rpp_13',
        ];

        foreach ($fileFields as $fileField) {
            if ($fileField === 'rpp' && $request->hasFile($fileField)) {
                $rppFiles = [];
                foreach ($request->file($fileField) as $file) {
                    $originalName = $file->getClientOriginalName();
                    $rppFiles[] = $file->storeAs($fileField, $originalName);
                }
                $validateData[$fileField] = json_encode($rppFiles); // Simpan sebagai JSON
            } elseif ($request->hasFile($fileField)) {
                // Jika ada file baru, hapus file lama jika ada
                if (isset($validateData[$fileField])) {
                    $oldFile = $validateData[$fileField];
                    if ($oldFile && Storage::exists($oldFile)) {
                        Storage::delete($oldFile);
                    }
                }
                // Simpan file baru
                $file = $request->file($fileField);
                $originalName = $file->getClientOriginalName();
                $validateData[$fileField] = $file->storeAs($fileField, $originalName);
            } else {
                // Jika tidak ada file baru, pertahankan data lama
                if (isset($validateData[$fileField])) {
                    $validateData[$fileField] = $validateData[$fileField];
                }
            }
        }

        $mapel->update($validateData);

        return redirect()->route('mapel.index')->with('success', 'Mapel updated successfully.');
    }

    public function destroy($id)
    {
        // Temukan mapel berdasarkan ID
        $mapel = Mapel::findOrFail($id);

        // Define file fields
        $fileFields = [
            'rpp',
            'silabus',
            'ki_kd_skl',
            'kode_etik',
            'program_semester',
            'program_tahunan',
            'kaldik_sekolah',
            'jak',
            'analisi_waktu',
            'daftar_hadir_siswa',
            'jadwal_pelajaran',
            'kisi_kisi_soal_kartu_soal',
            'pkg'
        ];

        foreach ($fileFields as $fileField) {
            if ($mapel->$fileField) {
                if ($fileField === 'rpp') {
                    // Handle JSON formatted data for rpp
                    $files = json_decode($mapel->$fileField, true);
                    if (is_array($files)) {
                        foreach ($files as $file) {
                            Storage::delete($file); // Delete each file listed in the JSON
                        }
                    }
                } else {
                    // Handle individual files
                    Storage::delete($mapel->$fileField); // Delete the single file
                }
            }
        }

        // Hapus entri dari database
        $mapel->delete();

        return redirect()->route('mapel.index')->with('success', 'Mapel deleted successfully.');
    }

    public function downloadFiles($id)
    {
        $mapel = Mapel::findOrFail($id);

        $directories = [
            'rpp',
            'silabus',
            'ki_kd_skl',
            'kode_etik',
            'program_semester',
            'program_tahunan',
            'kaldik_sekolah',
            'jak',
            'analisi_waktu',
            'daftar_hadir_siswa',
            'jadwal_pelajaran',
            'kisi_kisi_soal_kartu_soal',
            'pkg'
        ];

        // Create a temporary file to store the zip
        $zipFileName = 'Mapel_files_' . $mapel->mapel . '.zip';
        $zipFilePath = public_path('storage/' . $zipFileName);

        // Ensure the public directory exists
        if (!Storage::exists('public')) {
            Storage::makeDirectory('public');
            Log::info('Created public directory: ' . public_path('storage'));
        }

        // Initialize zip archive
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($directories as $dir) {
                if ($mapel->$dir) {
                    $files = json_decode($mapel->$dir);
                    if (is_array($files)) {
                        foreach ($files as $file) {
                            $filePath = public_path('storage/' . $file);
                            if (file_exists($filePath)) {
                                $zip->addFile($filePath, $dir . '/' . basename($filePath));
                            }
                        }
                    } else {
                        $filePath = public_path('storage/' . $mapel->$dir);
                        if (file_exists($filePath)) {
                            $zip->addFile($filePath, $dir . '/' . basename($filePath));
                        }
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
}
