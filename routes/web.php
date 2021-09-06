<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [App\Http\Controllers\NoteController::class, 'index'])->name('index');
Route::get('detail={id}',[App\Http\Controllers\NoteController::class, 'detail'])->name('detail');
Route::post('/', [App\Http\Controllers\NoteController::class, 'addNote'])->name('add');
Route::put('detail={id}', [App\Http\Controllers\NoteController::class, 'editNote'])->name('edit');
Route::delete('destroy={id}', [App\Http\Controllers\NoteController::class, 'destroy'])->name('destroy');

