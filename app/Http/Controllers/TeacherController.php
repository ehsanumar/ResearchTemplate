<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Researchs;
use Illuminate\Http\Request;

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
            'score' => 'required|integer|min:0', // Adjust validation rules as needed
        ]);

        $research = Researchs::findOrFail($id);

        // Update the score and save the research
        $research->score = $request->score;
        $research->save();

        // Return a success message (or redirect)
        return back();
    }

    public function DownloadPDF($id){
        $FindResearch = Researchs::with('teacher')->findOrFail($id);
        return PDF::loadView('PDF.pdfgenerate',['research' => $FindResearch])->download('research_' . $id . '.pdf');
    }

}
