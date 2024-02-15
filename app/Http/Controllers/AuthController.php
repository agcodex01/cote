<?php

namespace App\Http\Controllers;

use App\Consts\UserConstant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            switch ($user->type) {
                case UserConstant::ADMIN:
                    return redirect()->intended('dashboard');
                case UserConstant::STUDENT:
                    return redirect()->route('students.grades.index', $user->student);
                case UserConstant::TEACHER:
                    return redirect()->route('teachers.subjects.index', $user->teacher);
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    public function logout()
    {
        Auth::logout();

        return redirect()->route('landing.page');
    }
}
