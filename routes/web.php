<?php

use App\Http\Controllers\TodoController;
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

Route::get('/', function () {
    return view('home');
});


Route::get('/todo',[TodoController::class,'index'])->name('todolist');
Route::post('/todo',[TodoController::class,'saveTask'])->name('todolist.save');

Route::get('/status/{id}/{status}/change',[TodoController::class,'changeStatus'])->name('todo.changeStatus');

Route::get('/todo/{id}/edit',[TodoController::class,'editShow'])->name('edit.show');
Route::post('/todo/{id}/edit',[TodoController::class,'editSave'])->name('edit.save');

Route::get('/todo/{id}/delete',[TodoController::class,'delete'])->name('task.delete');

