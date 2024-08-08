<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

use App\Models\notulensi;
use App\Models\nomorSurat;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use App\Models\suratPengajuan;
use App\Models\suratPeringatan;
use Barryvdh\DomPDF\Facade\Pdf;

class GeneratePdfController extends Controller
{
    public function generatePdf($model, Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');



        $models = [
            'suratmasuk' => [
                'model' => SuratMasuk::class,
                'view' => 'page.pdf.suratmasukpdf',
                'default_filename' => 'suratmasuk.pdf',
            ],
            'suratkeluar' => [
                'model' => SuratKeluar::class,
                'view' => 'page.pdf.suratkeluarpdf',
                'default_filename' => 'suratkeluar.pdf',
            ],
            'suratperingatan' => [
                'model' => suratPeringatan::class,
                'view' => 'page.pdf.suratperingatanpdf',
                'default_filename' => 'suratperingatan.pdf',
            ],
            'nomorsurat' => [
                'model' => nomorSurat::class,
                'view' => 'page.pdf.nomorsuratpdf',
                'default_filename' => 'nomorsurat.pdf',
            ],
            'notulensi' => [
                'model' => notulensi::class,
                'view' => 'page.pdf.notulensipdf',
                'default_filename' => 'notulensi.pdf',
            ],
            'suratpengajuan' => [
                'model' => suratPengajuan::class,
                'view' => 'page.pdf.suratpengajuanpdf',
                'default_filename' => 'suratpengajuan.pdf',
            ],

        ];

        if (!isset($models[$model])) {
            abort(404, 'Model tidak ditemukan');
        }

        $modelClass = $models[$model]['model'];

        $query = $modelClass::query();
        if ($model === 'suratperingatan' && $request->has('subjek') && !empty($request->subjek)) {
            $query->where('subjek', $request->subjek);
        }

        if ($startDate) {
            $query->where('tanggal', '>=', $startDate);
        }

        if ($endDate) {
            $query->where('tanggal', '<=', $endDate);
        }

        $filteredData = $query->orderBy('tanggal', 'ASC')->get();

        $filename = $request->input('filename', $models[$model]['default_filename']);

        $pdf = Pdf::loadView($models[$model]['view'], ['data' => $filteredData])
                  ->setPaper('a4', 'landscape');

        return $pdf->stream($filename);
    }

    }

