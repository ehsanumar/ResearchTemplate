<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResearchRequest;
use App\Models\Researchs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ResearchsController extends Controller
{
    public function index()
    {

    }


    public function create(Request $request)
    {

    }

    // public function store(ResearchRequest $request)
    // {
    //     $ResearchDataSend=$request->validated();
    //     $ResearchDataSend=Researchs::create([
    //         'student_name' => $request['student_name'],
    //         'teacher_id' => $request['teacher_name'],
    //         'title' => $request['title'],
    //         'abstract' => $request['abstract'],
    //         'keyword' => $request['keyword'],
    //         'refrence' => $request['refrence'],
    //         'department_id'=> auth()->user()->department_id,
    //         'faculty_id'=> auth()->user()->faculty_id,
    //         'content'=> $request['content'],
    //         'user_id'=> auth()->id(),
    //         'status' => 'in_progress'
    //     ]);
    //     return back();
    // }

    public function store(ResearchRequest $request)
    {
        $ResearchDataSend = $request->validated();

        // Split the content into 1MB chunks
        $chunkSize = 1 * 1024 * 1024; // 1MB
        $content = $request['content'];
        $contentChunks = str_split($content, $chunkSize);

        // Create a new Researchs record for each chunk
        foreach ($contentChunks as $contentChunk) {
            Researchs::create([
                'student_name' => $request['student_name'],
                'teacher_id' => $request['teacher_name'],
                'title' => $request['title'],
                'abstract' => $request['abstract'],
                'keyword' => $request['keyword'],
                'refrence' => $request['refrence'],
                'department_id' => auth()->user()->department_id,
                'faculty_id' => auth()->user()->faculty_id,
                'content' => $contentChunk,
                'user_id' => auth()->id(),
                'status' => 'in_progress'
            ]);

            // Sleep for a while to avoid overloading the server
            sleep(1); // Sleep for 1 second
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Researchs  $researchs
     * @return \Illuminate\Http\Response
     */
    public function show(Researchs $researchs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Researchs  $researchs
     * @return \Illuminate\Http\Response
     */
    public function edit(Researchs $researchs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Researchs  $researchs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Researchs $researchs)
    {
        //
    }


    public function destroy($research)
    {
        $research=Researchs::findOrFail($research);
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
