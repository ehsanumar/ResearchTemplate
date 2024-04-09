<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\faculties;
use Illuminate\View\View;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use Laravel\Socialite\Facades\Socialite;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    // LoginController.php

    //Oauth google Authintecate
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $email = $googleUser->getEmail();
        $allowedPattern = '/@.*\.soran\.edu\.iq$/';
        try {
            if (preg_match($allowedPattern, $email)) {
                $user = User::where('email', $email)->first();
                if (!$user) {
                    // User doesn't exist, create a new user
                    $newUser = User::create([
                        'name' => $googleUser->name,
                        'email' => $googleUser->email,
                    ])->assignRole('student');
                    Auth::login($newUser);
                    return view('requiredAdditionalInfo', [
                        'departments' => Department::pluck('department', 'id'),
                        'faculties' => faculties::pluck('faculty', 'id'),
                    ]);
                } else {
                    Auth::login($user);
                    return redirect()->intended(RouteServiceProvider::HOME); // Redirect to a dashboard or home page

                }
            }else {
                return redirect('login')->with('error', 'Invalid email domain. just this type email @**.soran.edu.iq');
            }
        } catch (\Throwable $th) {
            dd('Something went wrong ' . $th->getMessage());
        }
    }
}
