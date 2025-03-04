<?php

namespace App\Http\Controllers;

use App\Models\Student\Students;
use App\Models\Subject\Subjects;
use App\Http\Requests\EnrollmentRequest;

class EnrollmentController extends Controller
{
    public function index()
    {
        return view('enrollment', [
            'students' => Students::whereDoesntHave('subjects')->get(),
            'enrolledStudents' => Students::has('subjects')->with('subjects')->get(),
            'subjects' => Subjects::all(),
        ]);
    }

    public function enroll(EnrollmentRequest $request)
    {
        try {
            $validated = $request->validated();
            $student = Students::findOrFail($validated['student_id']);
            
            $existingSubjects = $student->subjects->pluck('id')->toArray();
            $newSubjects = array_diff($validated['subjects'], $existingSubjects);
            
            if (empty($newSubjects)) {
                return $this->errorResponse('Student is already enrolled in these subjects');
            }

            $student->subjects()->attach($newSubjects);
            return $this->successResponse([], 'Student enrolled successfully');
        } catch (\Exception $e) {
            return $this->errorResponse('Error enrolling student: ' . $e->getMessage());
        }
    }

    public function updateSubjects(EnrollmentRequest $request)
    {
        try {
            $validated = $request->validated();
            $student = Students::findOrFail($validated['student_id']);
            $student->subjects()->sync($validated['subjects']);
            
            return $this->successResponse([], 'Subjects updated successfully');
        } catch (\Exception $e) {
            return $this->errorResponse('Error updating subjects: ' . $e->getMessage());
        }
    }

    public function getStudentSubjects($id)
    {
        $student = Students::findOrFail($id);
        return response()->json($student->subjects->pluck('id'));
    }
}