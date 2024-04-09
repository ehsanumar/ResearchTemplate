<?php

namespace App\Listeners;

use App\Mail\ResearchSendToTeacher;
use App\Models\User;
use App\Models\Researchs;
use Illuminate\Support\Facades\Mail;

class SendEmailToSupervizor
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $research
     * @return void
     */
    public function handle($research)
    {
//        dd($research->research['title']);
        // Split the content into 1MB chunks
        $chunkSize = 1024 * 1024; // 1MB
        $content = $research->research['content'];
        $contentChunks = str_split($content, $chunkSize);
        // Create a new Researchs record for each chunk
        foreach ($contentChunks as $contentChunk) {
            $new = Researchs::create([
                'student_name' => $research->research['student_name'],
                'teacher_id' => $research->research['teacher_name'],
                'title' => $research->research['title'],
                'abstract' => $research->research['abstract'],
                'keyword' => $research->research['keyword'],
                'refrence' => $research->research['refrence'],
                'department_id' => auth()->user()->department_id,
                'faculty_id' => auth()->user()->faculty_id,
                'content' => $contentChunk,
                'user_id' => auth()->id(),
                'status' => 'in_progress'
            ]);
        }

        //send email notification to Teacher Manager
        $teacher = User::where('id', $new->teacher_id)->first();
        Mail::to($teacher)->send(new ResearchSendToTeacher($new));

    }
}
