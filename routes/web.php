<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/profile/exactProfile',[ProfileController::class, 'index'])->name('exactProfile');

Route::middleware(['auth', 'verified'])->group(function () {
    // Base dashboard route that will redirect based on user type
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Add these profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Student Dashboard Routes
    Route::prefix('student')->name('student.')->group(function () {
        Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
        Route::get('/subjects', [StudentDashboardController::class, 'subjects'])->name('subjects');
        Route::get('/grades', [StudentDashboardController::class, 'grades'])->name('grades');
    });

    // Admin/Teacher Routes
    Route::middleware(['role:admin,teacher'])->group(function () {
        Route::resources([
            'students' => StudentController::class,
            'subjects' => SubjectController::class,
            'grades' => GradeController::class,
        ]);

        // Enrollment Routes
        Route::prefix('enrollment')->name('enrollment.')->group(function () {
            Route::get('/', [EnrollmentController::class, 'index'])->name('index');
            Route::post('/enroll', [EnrollmentController::class, 'enroll'])->name('enroll');
            Route::put('/subjects', [EnrollmentController::class, 'updateSubjects'])->name('subjects.update');
            Route::get('/student/{id}/subjects', [EnrollmentController::class, 'getStudentSubjects'])->name('student.subjects');
        });
    });
});

// Prevent direct access to layout files
Route::get('/layouts/{any}', function () {
    return redirect('/dashboardTemp');
})->where('any', '.*');

    Route::resource('subjects', SubjectController::class);

Route::middleware(['auth', 'user.type:student'])->group(function () {
    Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])
        ->name('student.dashboard');
    Route::get('/student/studentSubjects', [StudentDashboardController::class, 'subjects'])
        ->name('student.studentSubjects');
    Route::get('/student/studentGrades', [StudentDashboardController::class, 'grades'])
        ->name('student.studentGrades');
});

Route::middleware(['auth', 'user.type:instructor'])->group(function () {
    Route::resource('students', StudentController::class);
    Route::resource('subjects', SubjectController::class);
    
    // Grade routes
    Route::get('/grades', [GradeController::class, 'index'])->name('grades.index');
    Route::post('/grades', [GradeController::class, 'store'])->name('grades.store');
    Route::put('/grades/{grade}', [GradeController::class, 'update'])->name('grades.update');
    Route::delete('/grades/{grade}', [GradeController::class, 'destroy'])->name('grades.destroy');
    
    // Enrollment routes
    Route::get('/enrollment', [EnrollmentController::class, 'index'])->name('enrollment.index');
    Route::post('/enrollment/enroll', [EnrollmentController::class, 'enroll'])->name('enrollment.enroll');
    Route::post('/enrollment/subjects', [EnrollmentController::class, 'updateSubjects'])->name('enrollment.subjects');
    Route::get('/api/student/{id}/subjects', [EnrollmentController::class, 'getStudentSubjects']);
});

Route::post('/students', [StudentController::class, 'store'])->name('students.store');

require __DIR__.'/auth.php';
