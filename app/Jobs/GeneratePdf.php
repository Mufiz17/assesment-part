<?php

namespace App\Jobs;

use App\Models\Rpts;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;

class GeneratePdf implements ShouldQueue
{
    protected $rpts;
    protected $fileName;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($rpts, $fileName)
    {
        $this->rpts = $rpts;
        $this->fileName = $fileName;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $pdf = Pdf::loadView('page.rapor.pts.merdeka', ['rpts' => $this->rpts]);
        Storage::put("pdfs/{$this->fileName}.pdf", $pdf->output());
    }
}
