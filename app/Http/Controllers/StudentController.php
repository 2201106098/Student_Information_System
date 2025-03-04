<?php

namespace App\Http\Controllers;

use App\Models\Student\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = Students::all();
        return view('Students.Students', compact('students'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'student_id' => 'required|unique:students,student_id',
                'name' => 'required|string|max:255',
                'email' => [
                    'required',
                    'email',
                    'unique:students,email',
                    function ($attribute, $value, $fail) {
                        if (!str_ends_with($value, '@student.buksu.edu.ph')) {
                            $fail('The email must be a valid student.buksu.edu.ph address.');
                        }
                    },
                ],
                'password' => 'required|min:8|confirmed',
                'status' => 'required|in:active,inactive'
            ]);

            // Hash the password before saving
            $validated['password'] = Hash::make($request->password);

            // Create user in the users table first
            $user = \App\Models\User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => $validated['password'],
                'role' => 'student', // Add this if you have a role column
            ]);

            // Then create the student record
            $student = Students::create([
                'user_id' => $user->id, // Link to the user record
                'student_id' => $validated['student_id'],
                'name' => $validated['name'],
                'email' => $validated['email'],
                'status' => $validated['status'],
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Student added successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error adding student. ' . $e->getMessage()
            ], 422);
        }
    }

    public function show(Students $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Students $student)
    {
        return redirect()->route('students.index');
    }

    public function update(Request $request, Students $student)
    {
        try {
            $validated = $request->validate([
                'student_id' => 'required|unique:students,student_id,' . $student->id,
                'name' => 'required',
                'email' => 'required|email|unique:students,email,' . $student->id,
                'status' => 'required|in:active,inactive'
            ]);

            $student->update($validated);
            
            return response()->json([
                'success' => true,
                'message' => 'Student updated successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating student. ' . $e->getMessage()
            ], 422);
        }
    }

    public function destroy(Students $student)
    {
        try {
            $student->delete();
            return response()->json([
                'success' => true,
                'message' => 'Student deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting student. ' . $e->getMessage()
            ], 422);
        }
    }
}