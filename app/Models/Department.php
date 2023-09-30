<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $fillable = [
        'department',
    ];
    public function faculties(){
        return $this->belongsTo(faculties::class,'faculty_id');
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
