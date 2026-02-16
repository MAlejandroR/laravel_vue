<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get("crono", fn()=>Inertia::render('Cronometro'));

Route::get('/',\App\Http\Controllers\MainController::class)->name("main");

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource("projects",ProjectController::class);
Route::resource("users",UserController::class);

Route::get("teachers", [UserController::class, "getTeachers"])->name("teachers.index");
Route::get("students", [UserController::class, "getStudents"])->name("students.index");


require __DIR__.'/auth.php';
