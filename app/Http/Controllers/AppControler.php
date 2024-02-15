<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AppControler extends Controller
{
    public function dashboard()
    {
        $headers  = ['Dashboard'];
        $data = [
            'courses' => Course::count(),
            'students' => Student::count(),
            'teachers' => Teacher::count(),
            'subjects' => Subject::count(),
        ];

        $schoolYear = SchoolYear::where('current', 1)->first();

        return view('dashboard', compact('headers', 'data', 'schoolYear'));
    }

    public function me()
    {
        $headers = ['Profile'];
        $user = Auth::user();

        return view('profile', compact('headers', 'user'));
    }

    public function updatePassword(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ])->after(function ($validator) use ($request, $user) {
            if (!Hash::check($request->current_password, $user->password)) {
                $validator->errors()->add('current_password', 'Your current password is incorrect.');
            }
        });

        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Password Changed');
    }
}
