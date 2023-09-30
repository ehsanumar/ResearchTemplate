<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Researchs extends Model
{
    use HasFactory;
    protected $table = 'researchs';
    protected $fillable = [
        'student_name',
        'user_id',
        'department_id',
        'faculty_id',
        'content',
        'status',
        'title',
        'abstract',
        'keyword',
        'refrence',
        'teacher_id',
    ];
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
    public function faculty()
    {
        return $this->belongsTo(faculties::class, 'faculty_id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
