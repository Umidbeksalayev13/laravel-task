<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/',[MainController::class,'main'])->name('main');
    Route::get('/dashboard', [\App\Http\Controllers\MainController::class,'dashboard'])->name('dashboard');
    Route::get('applications/{application}/answer', [\App\Http\Controllers\AnswerController::class, 'create'])->name('answers.create');
    Route::post('applications/{application}/answer', [\App\Http\Controllers\AnswerController::class, 'store'])->name('answers.store');
    Route::resource('applications', ApplicationController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
