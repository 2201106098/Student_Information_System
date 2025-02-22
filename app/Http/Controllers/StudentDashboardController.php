<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student\Students;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $student = Students::with(['subjects', 'grades'])
            ->where('email', Auth::user()->email)
            ->first();

        $enrolledSubjects = $student->subjects;

        return view('Students.StudentDashboard', compact('enrolledSubjects'));
    }

    public function subjects()
    {
        $student = Students::with('subjects')
            ->where('email', Auth::user()->email)
            ->first();

        return view('Students.studentSubjects', compact('student'));
    }

    public function grades()
    {
        $student = Students::with(['subjects', 'grades'])
            ->where('email', Auth::user()->email)
            ->first();

        return view('Students.studentGrades', compact('student'));
    }
}