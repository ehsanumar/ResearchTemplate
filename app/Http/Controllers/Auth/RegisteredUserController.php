<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\faculties;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Spatie\Permission\Traits\HasRoles;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class RegisteredUserController extends Controller
{
    use HasRoles, Notifiable, HasFactory;
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register', [
            'departments' => Department::pluck('department', 'id'),
            'faculties' => faculties::pluck('faculty', 'id'),
        ]);
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'department_id' => ['required'],
            'phone' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'faculty_id' => ['required'],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'department_id' => $request->department_id,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'faculty_id' => $request->faculty_id,
        ])->assignRole('student');
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function showAdditionalInfoForm(Request $request)
    {
        $request->validate([
            'department_id' => ['required'],
            'phone' => ['required'],
            'faculty_id' => ['required'],
            'password' => ['required'],
        ]);

        // Find the currently authenticated user (the one who needs to update their info)
        $user = User::where('id', auth()->id())->first();

        // Update the user's information
        $user->update([
            'department_id' => $request['department_id'],
            'faculty_id' => $request['faculty_id'],
            'phone' => $request['phone'],
            'password' => $request['password'],
        ]);

        // Redirect to the home page
        return redirect(RouteServiceProvider::HOME);
    }
}
