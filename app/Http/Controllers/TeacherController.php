<?php

namespace App\Http\Controllers;

use PDF;
use ZipArchive;
use App\Models\Researchs;
use Illuminate\Http\Request;
use App\Jobs\GenerateResearchPDF;
use Illuminate\Support\Facades\Storage;


class TeacherController extends Controller
{
    public function ChangeStatus(Request $request, $id)
    {
        $FindResearch = Researchs::findOrFail($id);
        $FindResearch->update([
            'status' => $request['status'],
        ]);
        return back();
    }
    public function AddScore(Request $request, $id)
    {
        // Validate the score data
        $this->validate($request, [
            'score' => 'required|integer|min:0|max:100', // Adjust validation rules as needed
        ]);

        $research = Researchs::findOrFail($id);

        // Update the score and save the research
        $research->score = $request->score;
        $research->save();

        return back();
    }

    public function DownloadPDF($id)
    {
        $FindResearch = Researchs::with('teacher')->findOrFail($id);
        return PDF::loadView('PDF.pdfgenerate', ['research' => $FindResearch])->download('research_' . $id . '.pdf');
    }

    public function downloadAllResearchs()
    {
        $researchs = Researchs::all();

        // Check if there are any research records
        if ($researchs->isEmpty()) {
            return redirect()->back()->with('error', 'No research records found.');
        }

        $zipFileName = 'research_pdfs.zip';
        $zipFilePath = storage_path("app/public/researchs/{$zipFileName}");

        $zip = new ZipArchive();
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            foreach ($researchs as $research) {
                // Generate PDF synchronously
                $pdfPath = (new GenerateResearchPDF($research->id))->handle();

                if ($pdfPath && file_exists($pdfPath)) {
                    $zip->addFile($pdfPath, "research_{$research->id}.pdf");
                }
            }

            $zip->close();

            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        }

        return redirect()->back()->with('error', 'Error creating zip file.');
    }
}

