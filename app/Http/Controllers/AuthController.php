<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class AuthController extends Controller
{
    public function register()
    {
        $title = 'Register | Laravel Ecommerce';

        return view('auth.register', [
            'title' => $title,
        ]);
    }


    public function registerSave(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255|regex:/^[a-zA-Z ]+$/',
            'last_name' => 'required|max:25|regex:/^[a-zA-Z ]+$/',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'level' => 'Admin',
        ]);
        $user->email_verified_at = now();
        $user->remember_token = csrf_token();

        $user->save();

        return redirect()->route('login')->with('success', 'User created Successfully.');
    }

    public function login()
    {

        $title = 'Login | Laravel Ecommerce';

        if (View::exists('auth.login')) {
            return view('auth.login', [
                'title' => $title,
            ]);
        } else {
            return abort(404);
        }
    }

    public function authentication(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            "email" => 'required|email',
            "password" => 'required',
        ]);

        if (auth()->attempt($validated, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->route('products')->with('success', 'Login Successfully.');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        // auth()->logout();
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login')->with('success', 'Logout Successfully.');
    }

    public function profile()
    {
        $title = 'Profile | Laravel Ecommerce';

        return view('profile', [
            'title' => $title,
        ]);
    }
}
