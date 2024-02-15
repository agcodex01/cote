<?php

use App\Http\Controllers\AppControler;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseEnrollment;
use App\Http\Controllers\CourseEnrollmentController;
use App\Http\Controllers\CourseSubjectController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GradeStudentController;
use App\Http\Controllers\GradeTeacherController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SubjectTeacherController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\YearLevelController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('students.grades.print');
})->name('landing.page');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AppControler::class, 'dashboard'])->name('dashboard');
    Route::get('/me', [AppControler::class, 'me'])->name('me');
    Route::put('/me/{user}/update-password', [AppControler::class, 'updatePassword'])->name('user.password.update');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('students/{student}/grades/print', [GradeStudentController::class, 'print'])->name('students.grades.print');
    Route::resources([
        'grades' => GradeController::class,
        'school-years' => SchoolYearController::class,
        'semesters' => SemesterController::class,
        'students' => StudentController::class,
        'rooms' => RoomController::class,
        'subjects' => SubjectController::class,
        'teachers' => TeacherController::class,
        'courses' => CourseController::class,
        'year-levels' => YearLevelController::class,
        'rooms' => RoomController::class,
        'sections' => SectionController::class,
        'courses.subjects' => CourseSubjectController::class,
        'courses.enrollments' => CourseEnrollmentController::class,
        'student-classes' => StudentClassController::class,
        'teachers.subjects' => SubjectTeacherController::class,
        'students.grades' => GradeStudentController::class,
    ]);

    Route::put('grades/batch/update', [SubjectTeacherController::class, 'updateGrades'])->name('grades.batch.update');
});

Route::name('auth.')->prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticate'])->name('login');
});
