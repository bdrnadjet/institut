<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function dashboard()
    {
        $teacher = Auth::user()->teacher;
        $schedules = $teacher ? $teacher->schedules()->with(['group', 'subject'])->get() : [];

        return view('teacher.dashboard', compact('schedules'));
    }
}
