<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student\Students;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Check if student exists
        $student = Students::firstOrCreate(
            ['email' => $user->email],
            [
                'student_id' => 'STD' . str_pad($user->id, 6, '0', STR_PAD_LEFT),
                'name' => $user->name,
                'email' => $user->email,
                'status' => 'active'
            ]
        );

        $enrolledSubjects = $student->subjects()->paginate(5);
        return view('Students.StudentDashboard', compact('enrolledSubjects'));
    }

    public function subjects()
    {
        $student = Students::with('subjects')
            ->where('email', Auth::user()->email)
            ->first();

        if (!$student) {
            return redirect()->route('login')->with('error', 'Student record not found.');
        }

        return view('Students.studentSubjects', compact('student'));
    }

    public function grades()
    {
        $student = Students::with(['subjects', 'grades'])
            ->where('email', Auth::user()->email)
            ->first();

        if (!$student) {
            return redirect()->route('login')->with('error', 'Student record not found.');
        }

        return view('Students.studentGrades', compact('student'));
    }
}