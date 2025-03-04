<?php

namespace App\Http\Controllers;

use App\Models\Subject\Students;
use App\Models\Subject\Subjects;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;

class SubjectController extends Controller
{
    public function index()
    
    {
        $subjects = Subjects::paginate(5);
        return view('Subjects.Subjects', compact('subjects'));
    }

    public function store(StoreSubjectRequest $request)
    {
        try {
            Subjects::create($request->validated());
            
            return response()->json([
                'success' => true,
                'message' => 'Subject added successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Subject already exists.'
            ], 422);
        }
    }

    public function show(Subjects $subject)
    {
        return view('Subjects.show', compact('subject'));
    }

    public function edit(Subjects $subject)
    {
        return view('Subjects.edit', compact('subject'));
    }

    public function update(UpdateSubjectRequest $request, Subjects $subject)
    {
        try {
            $subject->update($request->validated());
            
            return response()->json([
                'success' => true,
                'message' => 'Subject updated successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating subject. ' . $e->getMessage()
            ], 422);
        }
    }

    public function destroy(Subjects $subject)
    {
        $subject->delete();
        return redirect()->back()->with('success', 'Subject deleted successfully');
    }
}