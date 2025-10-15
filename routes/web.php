<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCrudController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\QueryDemoController;

Route::resource('products', ProductCrudController::class);
Route::get('/students', [StudentController::class, 'index'])->name('students.index');


Route::get('/queries', [QueryDemoController::class, 'index'])->name('queries.index');
Route::get('/', function () {
    return view('welcome');
});
