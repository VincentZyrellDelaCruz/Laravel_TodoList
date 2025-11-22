<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('todo')->name('todo.')->controller(TodoController::class)->group(function () {
    Route::get('/current', 'current')->name('current');
    Route::get('/completed', 'completed')->name('completed');
    Route::get('/trash', 'trash')->name('trash');
    Route::get('/search', 'search')->name('search');

    Route::put('/{id}/check', 'check')->name('check');
    Route::put('/{id}/restore', 'restore')->name('restore');

    Route::resource('/', TodoController::class)->parameters(['' => 'todo']);
});


Route::fallback(fn() => view('not_found'));
