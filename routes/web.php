<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

Route::fallback(function () {
    throw new NotFoundHttpException('Page not found.');
});

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::post('/contact', ContactController::class)->name('contact');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth' , 'admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/projects' , [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create' , [ProjectController::class, 'create'])->name('projects.create');
    Route::get('/projects/edit/{project}' , [ProjectController::class, 'edit'])->name('projects.edit');
    Route::post('/projects/create' , [ProjectController::class, 'store'])->name('projects.store');
    Route::put('/projects/edit/{project}' , [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}' , [ProjectController::class, 'destroy'])->name('projects.destroy');

    Route::get('/skills' , [SkillController::class, 'index'])->name('skills.index');
    Route::get('/skills/create' , [SkillController::class, 'create'])->name('skills.create');
    Route::get('/skills/edit/{skill}' , [SkillController::class, 'edit'])->name('skills.edit');
    Route::post('/skills/create' , [SkillController::class, 'store'])->name('skills.store');
    Route::put('/skills/edit/{skill}' , [SkillController::class, 'update'])->name('skills.update');
    Route::delete('/skills/{skill}' , [SkillController::class, 'destroy'])->name('skills.destroy');
});
require __DIR__.'/auth.php';
