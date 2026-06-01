<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard()
    {
        $student = Auth::user()->student;
        // Logic to get schedule based on group
        $schedule = $student && $student->group ? $student->group->schedules()->with(['subject', 'teacher'])->get() : [];

        return view('student.dashboard', compact('student', 'schedule'));
    }
}
