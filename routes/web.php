<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();
//Crud de prueba hecho con el profesor
//Route::resource('posts', App\Http\Controllers\PostController::class);
Route::middleware(['auth'])->group(function () {
    Route::get('users', [UserController::class, 'index'])
        ->name('users.index')
        ->middleware('role:administrador');

    Route::get('tasks', [TaskController::class, 'index'])
        ->name('tasks.index')
        ->middleware('role:administrador|editor|usuario');

    Route::get('tasks/create', [TaskController::class, 'create'])
        ->name('tasks.create')
        ->middleware('role:administrador|editor');

    Route::post('tasks', [TaskController::class, 'store'])
        ->name('tasks.store')
        ->middleware('role:administrador|editor');

    Route::get('tasks/{task}', [TaskController::class, 'show'])
        ->name('tasks.show')
        ->middleware('role:administrador');

    Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])
        ->name('tasks.edit')
        ->middleware('role:administrador|editor');

    Route::put('tasks/{task}', [TaskController::class, 'update'])
        ->name('tasks.update')
        ->middleware('role:administrador|editor');

    Route::patch('tasks/{task}', [TaskController::class, 'update'])
        ->middleware('role:administrador|editor');

    Route::delete('tasks/{task}', [TaskController::class, 'destroy'])
        ->name('tasks.destroy')
        ->middleware('role:administrador');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
