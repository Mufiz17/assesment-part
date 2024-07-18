<?php

namespace App\Jobs;

use App\Models\Rapor;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GeneratePdf implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $raporId;

    /**
     * Create a new job instance.
     */
    public function __construct($raporId)
    {
        $this->raporId = $raporId;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $rapor = Rapor::findOrFail($this->raporId);
        $pdf = FacadePdf::loadView('page.rapor.merdeka', compact('rapor'));
        $pdf->save(storage_path('app/public/rapor.pdf')); // Simpan PDF ke dalam storage
    }
}
