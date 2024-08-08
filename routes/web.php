<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pasController;
use App\Http\Controllers\patController;
use App\Http\Controllers\ptsController;
use App\Http\Controllers\ZipController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\OsisController;
use App\Http\Controllers\rptsController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\raporController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KepsekController;
use App\Http\Controllers\TendikController;
use App\Http\Controllers\averageController;
use App\Http\Controllers\DatabaseDashboard;
use App\Http\Controllers\DataKelasController;
use App\Http\Controllers\NotulensiController;
use App\Http\Controllers\SupervisiController;
use App\Http\Controllers\WaliKelasController;
use App\Http\Controllers\DataMutasiController;
use App\Http\Controllers\NomorSuratController;
use App\Http\Controllers\PunishmentController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\GeneratePdfController;
use App\Http\Controllers\suratKeluarController;
use App\Http\Controllers\DataPrestasiController;
use App\Http\Controllers\DormPurchaseController;
use App\Http\Controllers\KepalaLabkomController;
use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\DataKelulusanController;
use App\Http\Controllers\WakaKesiswaanController;
use App\Http\Controllers\WakaKurikulumController;
use App\Http\Controllers\SchoolPurchaseController;
use App\Http\Controllers\SuratPengajuanController;
use App\Http\Controllers\SuratPeringatanController;
use App\Http\Controllers\PklAdministrasiSiswaController;
use App\Http\Controllers\PklAdministrasiSekolahController;



Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->name('dashboard');

Route::view('homepage', 'homepage')
    ->middleware(['auth', 'verified'])
    ->name('homepage');

Route::view('penilaian', 'page.home.penilaian')
    ->name('penilaian');

Route::view('administrasi', 'page.home.administrasiKeguruan')
    ->name('administrasi');

Route::view('finance', 'page.home.finance')
    ->name('finance');

Route::view('created-by', 'page.home.createdBy')
    ->name('created-by');

Route::view('sarpras', 'page.home.sarpras')
    ->name('sarpras');

Route::view('pkl', 'database.pkl.pkl')
    ->name('pkl');


Route::get('/database', [DatabaseDashboard::class, 'index'])->name('dashboard');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';

Route::controller(averageController::class)->group(function () {
    Route::get('/penilaian/rapor/rerata', 'index')->name('rerata');
    Route::get('/penilaian/rapor/create', 'create')->name('rerata.create');
    Route::post('/penilaian/rapor/store', 'store')->name('rerata.perform');
});
Route::controller(raporController::class)->group(function () {
    Route::get('/penilaian/rapor', 'index')->name('rapor');
    Route::get('/penilaian/rapor/create', 'create')->name('rapor.create');
    Route::post('/penilaian/rapor/store', 'store')->name('rapor.perform');
    Route::get('/penilaian/rapor/edit/{id}', 'edit')->name('rapor.edit');
    Route::put('/penilaian/rapor/update/{id}', 'update')->name('rapor.update');
    Route::delete('/penilaian/rapor/delete/{id}', 'destroy')->name('rapor.delete');
    Route::get('/penilaian/rapor/pdf/{id}', 'pdf')->name('rapor.pdf');
});
Route::controller(rptsController::class)->group(function () {
    Route::get('/penilaian/rpts', 'index')->name('rpts');
    Route::get('/penilaian/rpts/create', 'create')->name('rpts.create');
    Route::post('/penilaian/rpts/store', 'store')->name('rpts.perform');
    Route::get('/penilaian/rpts/edit/{id}', 'edit')->name('rpts.edit');
    Route::put('/penilaian/rpts/update/{id}', 'update')->name('rpts.update');
    Route::delete('/penilaian/rpts/delete/{id}', 'destroy')->name('rpts.delete');
    Route::get('/penilaian/rpts/pdf/{id}', 'pdf')->name('rpts.pdf');
});

Route::controller(pasController::class)->group(function () {
    Route::get('/penilaian/pas', 'index')->name('pas');
    Route::get('/penilaian/pas/create', 'create')->name('pas.create');
    Route::post('/penilaian/pas/store', 'store')->name('pas.perform');
    Route::get('/penilaian/pas/edit/{id}', 'edit')->name('pas.edit');
    Route::put('/penilaian/pas/update/{id}', 'update')->name('pas.update');
    Route::delete('/penilaian/pas/delete/{id}', 'destroy')->name('pas.delete');
    Route::get('/penilaian/pas/download/{id}', 'download')->name('pas.download');
});

Route::controller(patController::class)->group(function () {
    Route::get('/penilaian/pat', 'index')->name('pat');
    Route::get('/penilaian/pat/create', 'create')->name('pat.create');
    Route::post('/penilaian/pat/store', 'store')->name('pat.perform');
    Route::get('/penilaian/pat/edit/{id}', 'edit')->name('pat.edit');
    Route::put('/penilaian/pat/update/{id}', 'update')->name('pat.update');
    Route::delete('/penilaian/pat/delete/{id}', 'destroy')->name('pat.delete');
    Route::get('/penilaian/pat/download/{id}', 'download')->name('pat.download');
});

Route::controller(ptsController::class)->group(function () {
    Route::get('/penilaian/pts', 'index')->name('pts');
    Route::get('/penilaian/pts/create', 'create')->name('pts.create');
    Route::post('/penilaian/pts/store', 'store')->name('pts.perform');
    Route::get('/penilaian/pts/edit/{id}', 'edit')->name('pts.edit');
    Route::put('/penilaian/pts/update/{id}', 'update')->name('pts.update');
    Route::delete('/penilaian/pts/delete/{id}', 'destroy')->name('pts.delete');
    Route::get('/penilaian/pts/download/{id}', 'download')->name('pts.download');
});




// Korespondensi
Route::get('/korespondensi', [indexController::class, 'index'])->name('inbox.index');
Route::get('/pdf/{model}', [GeneratePdfController::class, 'generatepdf'])->name('pdf');

Route::controller(SuratMasukController::class)->group(function () {
    // Route::get('/inbox', 'index')->name('inbox.index');
    Route::post('/korespondensi', 'store')->name('inbox.store');
    Route::get('/korespondensi/{id}/edit', 'edit')->name('inbox.edit');
    Route::get('/korespondensi/{id}/download', 'download')->name('inbox.download');
    Route::put('/korespondensi/{id}', 'update')->name('inbox.update');
    Route::get('korespondensi/pdf', 'generatepdf')->name('inbox.pdf');
    Route::delete('/korespondensi/delete/{id}', 'destroy')->name('inbox.destroy');
});

Route::controller(suratKeluarController::class)->group(function () {
    Route::post('/outbox', 'store')->name('outbox.store');
    Route::get('/outbox/{id}/edit', 'edit')->name('outbox.edit');
    Route::get('/outbox/{id}/download', 'download')->name('outbox.download');
    Route::put('/outbox/{id}', 'update')->name('outbox.update');
    Route::delete('/outbox/delete/{id}', 'destroy')->name('outbox.destroy');
});

Route::controller(SuratPeringatanController::class)->group(function () {
    Route::post('/sp', 'store')->name('sp.store');
    Route::get('/sp/{id}/edit', 'edit')->name('sp.edit');
    route::get('/sp/{id}/download', 'download')->name('sp.download');
    Route::put('/sp/{id}', 'update')->name('sp.update');
    Route::delete('/sp/delete/{id}', 'destroy')->name('sp.destroy');
});

Route::controller(NomorSuratController::class)->group(function () {
    Route::post('/no_surat', 'store')->name('no_surat.store');
    Route::get('/no_surat/{id}/edit', 'edit')->name('no_surat.edit');
    Route::get('/no_surat/{id}/download', 'downloadSurat')->name('no_surat.download');
    Route::put('/no_surat/{id}', 'update')->name('no_surat.update');
    Route::delete('/no_surat/delete/{id}', 'destroy')->name('no_surat.destroy');
});

Route::controller(NotulensiController::class)->group(function () {
    Route::post('/notulensi', 'store')->name('notulensi.store');
    Route::get('/notulensi/{id}/edit', 'edit')->name('notulensi.edit');
    Route::get('/notulensi/{id}/downloadSurat', 'downloadSurat')->name('notulensi.download');
    Route::get('/notulensi/{id}/downloadDokumentasi', 'downloadDokumentasi')->name('notulensi.download_dokumentasi');
    Route::put('/notulensi/{id}', 'update')->name('notulensi.update');
    Route::delete('/notulensi/delete/{id}', 'destroy')->name('notulensi.destroy');
});

Route::controller(SuratPengajuanController::class)->group(function () {
    Route::post('/pengajuan', 'store')->name('pengajuan.store');
    Route::get('/pengajuan/{id}/edit', 'edit')->name('pengajuan.edit');
    Route::get('/pengajuan/{id}/download', 'download')->name('pengajuan.download');
    Route::put('/pengajuan/{id}', 'update')->name('pengajuan.update');
    Route::delete('/pengajuan/delete/{id}', 'destroy')->name('pengajuan.destroy');
});


// Administrasi
Route::view('administrasi-keguruan', 'page.home.administrasiKeguruan')->name('administrasiKeguruan');

// Routes for Mapel
Route::prefix('administrasi-keguruan/mapel')->group(function () {
    Route::get('/', [MapelController::class, 'index'])->name('mapel.index');
    Route::get('/create', [MapelController::class, 'create'])->name('mapel.create');
    Route::post('/', [MapelController::class, 'store'])->name('mapel.store');
    Route::get('/{id}/edit', [MapelController::class, 'edit'])->name('mapel.edit');
    Route::put('/{id}', [MapelController::class, 'update'])->name('mapel.update');
    Route::delete('/{id}', [MapelController::class, 'destroy'])->name('mapel.destroy');
    Route::get('/{id}/download', [MapelController::class, 'downloadFiles'])->name('mapel.download');
});

// Routes for Kepala Lab Kom
Route::prefix('administrasi-keguruan/kepalaLabKom')->group(function () {
    Route::get('/', [KepalaLabkomController::class, 'index'])->name('kepalaLabKom.index');
    Route::get('/create', [KepalaLabkomController::class, 'create'])->name('kepalaLabKom.create');
    Route::post('/', [KepalaLabkomController::class, 'store'])->name('kepalaLabKom.store');
    Route::get('/{id}/edit', [KepalaLabkomController::class, 'edit'])->name('kepalaLabKom.edit');
    Route::put('/{id}', [KepalaLabkomController::class, 'update'])->name('kepalaLabKom.update');
    Route::delete('/{id}', [KepalaLabkomController::class, 'destroy'])->name('kepalaLabKom.destroy');
    Route::get('/{id}/download', [KepalaLabkomController::class, 'downloadFiles'])->name('kepalaLabKom.download');
});

// Routes for OSIS
Route::prefix('administrasi-keguruan/osis')->group(function () {
    Route::get('/', [OsisController::class, 'index'])->name('osis.index');
    Route::get('/create', [OsisController::class, 'create'])->name('osis.create');
    Route::post('/', [OsisController::class, 'store'])->name('osis.store');
    Route::get('/{id}/edit', [OsisController::class, 'edit'])->name('osis.edit');
    Route::put('/{id}', [OsisController::class, 'update'])->name('osis.update');
    Route::delete('/{id}', [OsisController::class, 'destroy'])->name('osis.destroy');
    Route::get('/{id}/download', [OsisController::class, 'downloadFiles'])->name('osis.download');
});

// Routes for Perpustakaan
Route::prefix('administrasi-keguruan/perpustakaan')->group(function () {
    Route::get('/', [PerpustakaanController::class, 'index'])->name('perpustakaan.index');
    Route::get('/create', [PerpustakaanController::class, 'create'])->name('perpustakaan.create');
    Route::post('/', [PerpustakaanController::class, 'store'])->name('perpustakaan.store');
    Route::get('/{id}/edit', [PerpustakaanController::class, 'edit'])->name('perpustakaan.edit');
    Route::put('/{id}', [PerpustakaanController::class, 'update'])->name('perpustakaan.update');
    Route::delete('/{id}', [PerpustakaanController::class, 'destroy'])->name('perpustakaan.destroy');
    Route::get('/{id}/download', [PerpustakaanController::class, 'downloadFiles'])->name('perpustakaan.download');
});

// Routes for Walas
Route::prefix('administrasi-keguruan/walas')->group(function () {
    Route::get('/', [WaliKelasController::class, 'index'])->name('walas.index');
    Route::get('/create', [WaliKelasController::class, 'create'])->name('walas.create');
    Route::post('/', [WaliKelasController::class, 'store'])->name('walas.store');
    Route::get('/{id}/edit', [WaliKelasController::class, 'edit'])->name('walas.edit');
    Route::put('/{id}', [WaliKelasController::class, 'update'])->name('walas.update');
    Route::delete('/{id}', [WaliKelasController::class, 'destroy'])->name('walas.destroy');
    Route::get('/download/{id}', [WaliKelasController::class, 'downloadFile'])->name('walas.downloadFile');
});

// Routes for Waka Kurikulum
Route::prefix('administrasi-keguruan/waka-kurikulum')->group(function () {
    Route::get('/', [WakaKurikulumController::class, 'index'])->name('waka_kurikulum.index');
    Route::get('/create', [WakaKurikulumController::class, 'create'])->name('waka_kurikulum.create');
    Route::post('/', [WakaKurikulumController::class, 'store'])->name('waka_kurikulum.store');
    Route::get('/{wakaKurikulum}/edit', [WakaKurikulumController::class, 'edit'])->name('waka_kurikulum.edit');
    Route::put('/{wakaKurikulum}', [WakaKurikulumController::class, 'update'])->name('waka_kurikulum.update');
    Route::delete('/{wakaKurikulum}', [WakaKurikulumController::class, 'destroy'])->name('waka_kurikulum.destroy');
    Route::get('/exportPDF/{id}', [WakaKurikulumController::class, 'exportPDF'])->name('waka_kurikulum.exportPDF');
    Route::get('/download/{id}', [WakaKurikulumController::class, 'downloadFile'])->name('waka_kurikulum.downloadFile');
});

// Routes for Waka Kesiswaan
Route::prefix('administrasi-keguruan/waka-kesiswaan')->group(function () {
    Route::get('/', [WakaKesiswaanController::class, 'index'])->name('waka_kesiswaan.index');
    Route::get('/create', [WakaKesiswaanController::class, 'create'])->name('waka_kesiswaan.create');
    Route::post('/', [WakaKesiswaanController::class, 'store'])->name('waka_kesiswaan.store');
    Route::get('/{id}/edit', [WakaKesiswaanController::class, 'edit'])->name('waka_kesiswaan.edit');
    Route::put('/{id}', [WakaKesiswaanController::class, 'update'])->name('waka_kesiswaan.update');
    Route::delete('/{id}', [WakaKesiswaanController::class, 'destroy'])->name('waka_kesiswaan.destroy');
    Route::get('/exportPDF/{id}', [WakaKesiswaanController::class, 'exportPDF'])->name('waka_kesiswaan.exportPDF');
    Route::get('/{id}/download', [WakaKesiswaanController::class, 'downloadFiles'])->name('waka_kesiswaan.download');
});

// Routes for Kepsek
Route::prefix('administrasi-keguruan/kepsek')->group(function () {
    Route::get('/', [KepsekController::class, 'index'])->name('kepsek.index');
    Route::get('/create', [KepsekController::class, 'create'])->name('kepsek.create');
    Route::post('/', [KepsekController::class, 'store'])->name('kepsek.store');
    Route::get('/{id}/edit', [KepsekController::class, 'edit'])->name('kepsek.edit');
    Route::put('/{id}', [KepsekController::class, 'update'])->name('kepsek.update');
    Route::delete('/{id}', [KepsekController::class, 'destroy'])->name('kepsek.destroy');
    Route::get('/exportPDF/{id}', [KepsekController::class, 'exportPDF'])->name('kepsek.exportPDF');
    Route::get('/download/{id}', [KepsekController::class, 'downloadFiles'])->name('kepsek.download');
});

// Routes for Supervisi
Route::prefix('administrasi-keguruan/supervisi')->group(function () {
    Route::get('/', [SupervisiController::class, 'index'])->name('supervisi.index');
    Route::get('/create', [SupervisiController::class, 'create'])->name('supervisi.create');
    Route::post('/', [SupervisiController::class, 'store'])->name('supervisi.store');
    Route::get('/{id}/edit', [SupervisiController::class, 'edit'])->name('supervisi.edit');
    Route::put('/{id}', [SupervisiController::class, 'update'])->name('supervisi.update');
    Route::delete('/{id}', [SupervisiController::class, 'destroy'])->name('supervisi.destroy');
});


// database
Route::controller(PklAdministrasiSekolahController::class)->group(function () {
    Route::get('pkl/adm-sekolah', 'index')->name('pkl.sekolah.index');
    Route::get('pkl/adm-sekolah/create', 'create')->name('pkl.sekolah.create');
    Route::post('pkl/adm-sklh/create/data', 'store')->name('pkl.sekolah.store');
    Route::get('pkl/adm-sekolah/edit/{id}', 'edit')->name('pkl.sekolah.edit');
    Route::post('pkl/adm-sekolah/update/{id}', 'update')->name('pkl.sekolah.update');
    Route::delete('pkl/adm-sekolah/delete/{id}', 'destroy')->name('pkl.sekolah.destroy');
});

Route::controller(PklAdministrasiSiswaController::class)->group(function () {
    Route::get('pkl/adm-siswa', 'index')->name('pkl.siswa.index');
    Route::get('pkl/adm-siswa/create', 'create')->name('pkl.siswa.create');
    Route::post('pkl/adm-siswa/create/data', 'store')->name('pkl.siswa.store');
    Route::get('pkl/adm-siswa/edit/{id}', 'edit')->name('pkl.siswa.edit');
    Route::post('pkl/adm-siswa/update/{id}', 'update')->name('pkl.siswa.update');
    Route::delete('pkl/adm-siswa/delete/{id}', 'destroy')->name('pkl.siswa.destroy');
});

Route::controller(GuruController::class)->group(function () {
    Route::get('/guru', 'index')->name('guru.index');
    Route::get('/guru/create', 'create')->name('guru.create');
    Route::get('/guru/export/{id}', 'export')->name('guru.export');
    Route::get('/guru/edit/{id}', 'edit')->name('guru.edit');
    Route::post('/guru/update/{id}', 'update')->name('guru.update');
    Route::post('/guru/create/data', 'store')->name('guru.store');
    Route::delete('/guru/delete/{id}', 'destroy')->name('guru.destroy');
    Route::get('/guru/download/{id}', 'download')->name('guru.download');
    Route::get('/guru/{id}/export-pdf', 'exportPdf')->name('guru.exportPdf');
    Route::get('/guru/{id}/download', 'downloadFile')->name('guru.download.file');
});

Route::controller(TendikController::class)->group(function () {
    Route::get('/tendik', 'index')->name('tendik.index');
    Route::get('/tendik/create', 'create')->name('tendik.create');
    Route::get('/tendik/edit/{id}', 'edit')->name('tendik.edit');
    Route::post('/tendik/create/data', 'store')->name('tendik.store');
    Route::delete('/tendik/delete/{id}', 'destroy')->name('tendik.destroy');
    Route::put('/tendik/update/{id}', 'update')->name('tendik.update');
    Route::get('/tendik/{id}/export-pdf', 'exportPdf')->name('tendik.exportPdf');
});

Route::controller(DataPrestasiController::class)->group(function () {
    Route::get('/data-prestasi', 'index')->name('prestasi.index');
    Route::get('/data-prestasi/create', 'create')->name('prestasi.create');
    Route::post('/data-prestasi/create/data', 'store')->name('prestasi.store');
    Route::get('/data-prestasi/edit/{id}', 'edit')->name('prestasi.edit');
    Route::post('/data-prestasi/update/{id}', 'update')->name('prestasi.update');
    Route::delete('/data-prestasi/delete/{id}', 'destroy')->name('prestasi.destroy');
    Route::get('/data-prestasi/export-pdf', [DataPrestasiController::class, 'exportPdf'])->name('prestasi.exportPdf');
});

Route::controller(SiswaController::class)->group(function () {
    Route::get('/siswa', 'index')->name('siswa.index');
    Route::get('/siswa/create', 'create')->name('siswa.create');
    Route::post('/siswa/create/data', 'store')->name('siswa.store');
    Route::get('/siswa/edit/{id}', 'edit')->name('siswa.edit');
    Route::post('/siswa/update/{id}', 'update')->name('siswa.update');
    Route::delete('/siswa/delete/{id}', 'destroy')->name('siswa.destroy');
    Route::get('/siswa/{id}/export-pdf', 'exportPdf')->name('siswa.exportPdf');
});

Route::controller(DataMutasiController::class)->group(function () {
    Route::get('/data-mutasi', 'index')->name('mutasi.index');
    Route::get('/data-mutasi/create', 'create')->name('mutasi.create');
    Route::post('/data-mutasi/create/data', 'store')->name('mutasi.store');
    Route::get('/data-mutasi/edit/{id}', 'edit')->name('mutasi.edit');
    Route::put('/data-mutasi/update/{id}', 'update')->name('mutasi.update');
    Route::delete('/mutasi/{id}', 'destroy')->name('mutasi.destroy');
    Route::get('/mutasi/export', 'exportPdf')->name('mutasi.export');
});

Route::controller(DataKelulusanController::class)->group(function () {
    Route::get('/kelulusan', 'index')->name('kelulusan.index');
    Route::get('/kelulusan/create', 'create')->name('kelulusan.create');
    Route::post('/kelulusan/create/data', 'store')->name('kelulusan.store');
    Route::get('/kelulusan/edit/{id}', 'edit')->name('kelulusan.edit');
    Route::post('/kelulusan/update/{id}', 'update')->name('kelulusan.update');
    Route::delete('/kelulusan/delete/{id}', 'destroy')->name('kelulusan.destroy');
    Route::get('/kelulusan/export/{id}', 'exportPdfCv')->name('kelulusan.export.data');
    Route::get('/kelulusan/export-pdf', 'exportPdf')->name('kelulusan.export');
});

Route::controller(DataKelasController::class)->group(function () {
    Route::post('/kelas/create/data', 'store')->name('kelas.store');
    Route::get('/kelas/edit/{id}', 'edit')->name('kelas.edit');
    Route::put('/kelas/update/{id}', 'update')->name('kelas.update');
    Route::delete('/kelas/delete/{id}', 'destroy')->name('kelas.destroy');
    Route::get('/kelas/export/{id}', 'exportPdfCv')->name('kelas.export.data');
    Route::get('/kelas/export-pdf', 'exportPdf')->name('kelas.export');
    Route::get('/kelas/upgrade', 'upgrade')->name('kelas.upgrade');
});
Route::get('/kelas', [DataKelasController::class, 'index'])->name('kelas.index');

Route::get('/api/siswa', [PunishmentController::class, 'getSiswaByAngkatan']);
Route::get('/api/siswa', [DataKelasController::class, 'getSiswaByAngkatan']);
Route::get('/api/siswa-lulus/', [DataKelasController::class, 'getSiswaLulusByAngkatan']);

Route::get('/kelas/create', [DataKelasController::class, 'create'])->name('kelas.create');

Route::get('/zip-file', [ZipController::class, 'zipFile']);
Route::get('/zip-file/guru/{nama}', [ZipController::class, 'zipFileGuru'])->name('file.guru');
Route::get('/zip-file/tendik/{nama}', [ZipController::class, 'zipFileTendik'])->name('file.tendik');
Route::get('/zip-file/siswa/{nama}', [ZipController::class, 'zipFileSiswa'])->name('file.siswa');
Route::get('/zip-file/pkl/sekolah/{id}', [ZipController::class, 'zipFilePklSekolah'])->name('file.pkl.sekolah');
Route::get('/zip-file/pkl/siswa/{id}', [ZipController::class, 'zipFilePklSiswa'])->name('file.siswa.sekolah');

Route::controller(PunishmentController::class)->group(function () {
    Route::get('/punishment', 'index')->name('punishment.index');
    Route::get('/punishment/create', 'create')->name('punishment.create');
    Route::post('/punishment/create/data', 'store')->name('punishment.store');
    Route::get('/punishment/{id}/edit', [PunishmentController::class, 'edit'])->name('punishment.edit');
    Route::put('/punishment/{id}', [PunishmentController::class, 'update'])->name('punishment.update');
    Route::delete('/punishment/delete/{id}', 'destroy')->name('punishment.destroy');
    Route::get('/punishment/export-pdf', 'exportPdf')->name('punishment.export');
});

Route::get('/kelas/export', [DataKelasController::class, 'exportPdf'])->name('kelas.export');


// Sarpras
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/school-purchase', 'sekolah')->name('school-purchases.index');
    Route::view('/dorm-purchases', 'asrama')->name('dorm-purchases.index');
    Route::view('goodItems', 'goodItems')->name('good-items-school');
    Route::view('damagedItems', 'damagedItems')->name('damaged-items-school');
    Route::view('print', 'print')->name('print');
    Route::view('profile', 'profile')->name('profile');
});

// Routes for SchoolPurchase
// Route::resource('school-purchases', SchoolPurchaseController::class);

Route::controller(SchoolPurchaseController::class)->group(function () {
    Route::get('/school-purchase', 'index')->name('school-purchases.index');
    Route::get('/good-items-school', 'goodItems')->name('good-items-school');
    Route::get('/damaged-items-school', 'damagedItems')->name('damaged-items-school');

    Route::post('/school-purchase', 'store')->name('school-purchases.store');
    Route::get('/school-purchases/{id}/download', 'download')->name('school-purchases.download');

    Route::get('/school-purchases/create', 'create')->name('school-purchases.create');
    Route::get('/school-purchases/{id}/edit', 'edit')->name('school-purchases.edit');
    Route::put('/school-purchases/{id}', 'update')->name('school-purchases.update');
    Route::delete('/school-purchases/{id}', 'destroy')->name('school-purchases.destroy');
    Route::get('/school-purchases/print', 'print')->name('school-purchases.print');

    Route::get('/damaged-items-school/{$id}', 'getDamaged')->name('damaged-items-school.getDamaged');
    Route::get('/damaged-items-school/{id}/edit', 'edit')->name('damaged-items-school.edit');
    // Route::get('/items/{id}', 'show')->name('items.show');
    Route::put('/damaged-items-school/{id}', 'damaged')->name('damaged-items-school.damaged');
});

Route::controller(DormPurchaseController::class)->group(function () {
    Route::get('/dorm-purchase', 'index')->name('dorm-purchases.index');
    Route::get('/good-items-dorm', 'goodItems')->name('good-items-dorm');
    Route::get('/damaged-items-dorm', 'damagedItems')->name('damaged-items-dorm');

    Route::post('/dorm-purchase', 'store')->name('dorm-purchases.store');
    Route::get('/dorm-purchases/{id}/download', 'download')->name('dorm-purchases.download');

    Route::get('/dorm-purchases/create', 'create')->name('dorm-purchases.create');
    Route::get('/dorm-purchases/{id}/edit', 'edit')->name('dorm-purchases.edit');
    Route::put('/dorm-purchases/{id}', 'update')->name('dorm-purchases.update');
    Route::delete('/dorm-purchases/{id}', 'destroy')->name('dorm-purchases.destroy');
    Route::get('/dorm-purchases/print', 'print')->name('dorm-purchases.print');

    Route::get('/damaged-items-dorm/{$id}', 'getDamaged')->name('damaged-items-dorm.getDamaged');
    Route::get('/damaged-items-dorm/{id}/edit', 'edit')->name('damaged-items-dorm.edit');
    // Route::get('/items/{id}', 'show')->name('items.show');
    Route::put('/damaged-items-dorm/{id}', 'damaged')->name('damaged-items-dorm.damaged');
});

Route::get('zip-file', [SchoolPurchaseController::class, 'zip']);
