<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
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
    public function DownloadPDF($id){
        $FindResearch = Researchs::with('teacher')->findOrFail($id);
        $pdfGenerate= PDF::loadView('PDF.pdfgenerate',['research' => $FindResearch]);
        return $pdfGenerate->download('research_' . $id . '.pdf');
    }

}
