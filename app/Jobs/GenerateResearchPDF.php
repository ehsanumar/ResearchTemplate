<?php

namespace App\Jobs;

use App\Models\Researchs;
use Illuminate\Bus\Queueable;
use PDF;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateResearchPDF implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $researchId;

    public function __construct($researchId)
    {
        $this->researchId = $researchId;
    }

    public function handle()
    {
        $research = Researchs::with('teacher')->findOrFail($this->researchId);

        $pdf = PDF::loadView('PDF.pdfgenerate', ['research' => $research]);

        $pdfPath = storage_path("app/public/researchs/research_{$this->researchId}.pdf");

        $pdf->save($pdfPath);

        return $pdfPath;
    }
}
