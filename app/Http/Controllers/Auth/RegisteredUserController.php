<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use App\Models\faculties;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Spatie\Permission\Traits\HasRoles;

class RegisteredUserController extends Controller
{
    use HasRoles;
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register',[
            'departments' => Department::pluck('department','id') ,
            'faculties' => faculties::pluck('faculty','id') ,]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'department_id' => ['required'],
            'phone' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'faculty_id' => ['required'],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'department_id' =>$request->department_id,
            'phone' =>$request->phone,
            'password' => Hash::make($request->password),
            'faculty_id' =>$request->faculty_id,
        ])->assignRole('student');
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
