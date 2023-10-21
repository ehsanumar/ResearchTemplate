<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Researchs;
use App\Mail\StudentToTeacher;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ResearchRequest;

class ResearchsController extends Controller
{

    public function store(ResearchRequest $request)
    {
        $ResearchDataSend = $request->validated();

        // Split the content into 1MB chunks
        $chunkSize = 1 * 1024 * 1024; // 1MB
        $content = $request['content'];
        $contentChunks = str_split($content, $chunkSize);
        // Create a new Researchs record for each chunk
        foreach ($contentChunks as $contentChunk) {
            $new = Researchs::create([
                'student_name' => $ResearchDataSend['student_name'],
                'teacher_id' => $ResearchDataSend['teacher_name'],
                'title' => $ResearchDataSend['title'],
                'abstract' => $ResearchDataSend['abstract'],
                'keyword' => $ResearchDataSend['keyword'],
                'refrence' => $ResearchDataSend['refrence'],
                'department_id' => auth()->user()->department_id,
                'faculty_id' => auth()->user()->faculty_id,
                'content' => $contentChunk,
                'user_id' => auth()->id(),
                'status' => 'in_progress'
            ]);
            //send email notification to Teacher Manager
            $teacher = User::where('id', $new->teacher_id)->first();
            Mail::to($teacher)->send(new StudentToTeacher($new));

            // Sleep for a while to avoid overloading the server
            sleep(0.5); // Sleep for 0.5 second
        }

        return back();
    }





    public function edit($research)
    {
        //in user model i creat a fn to get user if teacher and if user in this department
        $teachersInSameDepartment = User::teachersInSameDepartment()->pluck('name', 'id');
        $research = Researchs::with('teacher')->where('id', $research)
            ->where('user_id', auth()->id())
            ->first();
        return view('editResearch.research-edit',[
                'research' => $research,
                'teachers' => $teachersInSameDepartment,
            ]
        );
    }


    public function update(ResearchRequest $request,$research){
        $ResearchDataUpdate = $request->validated();
$updateResearch=Researchs::where('id',$research);
        // Split the content into 1MB chunks
        $chunkSize = 1 * 1024 * 1024; // 1MB
        $content = $ResearchDataUpdate['content'];
        $contentChunks = str_split($content, $chunkSize);
        // Create a new Researchs record for each chunk
        foreach ($contentChunks as $contentChunk) {
            $updateResearch->update([
                'student_name' => $ResearchDataUpdate['student_name'],
                'teacher_id' => $ResearchDataUpdate['teacher_name'],
                'title' => $ResearchDataUpdate['title'],
                'abstract' => $ResearchDataUpdate['abstract'],
                'keyword' => $ResearchDataUpdate['keyword'],
                'refrence' => $ResearchDataUpdate['refrence'],
                'department_id' => auth()->user()->department_id,
                'faculty_id' => auth()->user()->faculty_id,
                'content' => $contentChunk,
                'user_id' => auth()->id(),
                'status' => 'in_progress'
            ]);
            // Sleep for a while to avoid overloading the server
            sleep(0.5); // Sleep for 1 second
        }

        return back();
    }


    public function destroy($research)
    {
        $research = Researchs::findOrFail($research);
        // Retrieve the content of the research
        $content = $research->content;

        // Find all image paths in the content
        $imagePaths = [];
        preg_match_all('/images\/[^\s]+\.(jpg|jpeg|png|gif)/i', $content, $matches);

        // If matches were found, add them to the $imagePaths array
        if (!empty($matches[0])) {
            $imagePaths = $matches[0];
        }
        // Loop through image paths and delete associated images
        foreach ($imagePaths as $imagePath) {
            // Construct the full image path
            $fullImagePath = storage_path('app/public/' . $imagePath);

            // Delete the image file
            if (file_exists($fullImagePath)) {
                unlink($fullImagePath);
            }
        }
        $research->delete();
        return redirect()->route('dashboard');
    }
}
