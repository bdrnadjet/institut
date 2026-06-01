<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Students
    Route::get('/students', [AdminController::class, 'students'])->name('students.index');
    Route::post('/students/{id}/approve', [AdminController::class, 'approveStudent'])->name('students.approve');
    Route::post('/students/{id}/reject', [AdminController::class, 'rejectStudent'])->name('students.reject');
    Route::get('/students/{id}/assign', [AdminController::class, 'assignStudentForm'])->name('students.assign');
    Route::post('/students/{id}/assign', [AdminController::class, 'assignStudent'])->name('students.assign.store');

    // Teachers
    Route::get('/teachers', [AdminController::class, 'teachers'])->name('teachers.index');
    Route::get('/teachers/create', [AdminController::class, 'createTeacher'])->name('teachers.create');
    Route::post('/teachers', [AdminController::class, 'storeTeacher'])->name('teachers.store');
    Route::get('/teachers/{id}/edit', [AdminController::class, 'editTeacher'])->name('teachers.edit');
    Route::put('/teachers/{id}', [AdminController::class, 'updateTeacher'])->name('teachers.update');
    Route::delete('/teachers/{id}', [AdminController::class, 'destroyTeacher'])->name('teachers.destroy');

    // Subjects
    Route::get('/subjects', [AdminController::class, 'subjects'])->name('subjects.index');
    Route::get('/subjects/create', [AdminController::class, 'createSubject'])->name('subjects.create');
    Route::post('/subjects', [AdminController::class, 'storeSubject'])->name('subjects.store');
    Route::get('/subjects/{id}/edit', [AdminController::class, 'editSubject'])->name('subjects.edit');
    Route::put('/subjects/{id}', [AdminController::class, 'updateSubject'])->name('subjects.update');
    Route::delete('/subjects/{id}', [AdminController::class, 'destroySubject'])->name('subjects.destroy');

    // Groups
    Route::get('/groups', [AdminController::class, 'groups'])->name('groups.index');
    Route::get('/groups/create', [AdminController::class, 'createGroup'])->name('groups.create');
    Route::post('/groups', [AdminController::class, 'storeGroup'])->name('groups.store');
    Route::get('/groups/{id}/edit', [AdminController::class, 'editGroup'])->name('groups.edit');
    Route::put('/groups/{id}', [AdminController::class, 'updateGroup'])->name('groups.update');
    Route::delete('/groups/{id}', [AdminController::class, 'destroyGroup'])->name('groups.destroy');

    // Schedules
    Route::get('/schedules', [AdminController::class, 'schedules'])->name('schedules.index');
    Route::get('/schedules/create', [AdminController::class, 'createSchedule'])->name('schedules.create');
    Route::post('/schedules', [AdminController::class, 'storeSchedule'])->name('schedules.store');
    Route::get('/schedules/{id}/edit', [AdminController::class, 'editSchedule'])->name('schedules.edit');
    Route::put('/schedules/{id}', [AdminController::class, 'updateSchedule'])->name('schedules.update');
    Route::delete('/schedules/{id}', [AdminController::class, 'destroySchedule'])->name('schedules.destroy');
});

// Student Routes
Route::middleware(['auth', 'student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
});

// Teacher Routes
Route::middleware(['auth', 'teacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/dashboard', [TeacherController::class, 'dashboard'])->name('dashboard');
});
