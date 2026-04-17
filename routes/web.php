<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//Crud de prueba hecho con el profesor
//Route::resource('posts', App\Http\Controllers\PostController::class);
Route::resource('tasks', App\Http\Controllers\TaskController::class);
Route::get('/', function () {
    return redirect()->route('tasks.index');
});

#Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
