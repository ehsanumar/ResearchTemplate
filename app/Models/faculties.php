<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faculties extends Model
{
    use HasFactory;
    protected $fillable=['faculty'];
    public function department(){
        return $this->hasMany(Department::class);
    }
}
