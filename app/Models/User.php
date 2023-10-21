<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Department;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    // User.php

    public function scopeTeachersInSameDepartment($query)
    {
        $teacherRole = Role::where('name', 'teacher')->first();
        $departmentId = auth()->user()->department_id;

        return $query->whereHas('roles', function ($query) use ($teacherRole) {
            $query->where('name', $teacherRole->name);
        })->where('department_id', $departmentId);
    }

    protected $fillable = [
        'name',
        'email',
        'phone',
        'department_id',
        'faculty_id',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',

    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function department(){
        return $this->belongsTo(department::class);
        }
    public function faculty(){
        return $this->belongsTo(faculties::class);
        }

}
