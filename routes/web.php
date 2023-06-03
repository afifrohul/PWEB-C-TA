<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\DrugInController;
use App\Http\Controllers\DrugOutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DrugTypeController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return redirect('/login');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/type', [DrugTypeController::class, 'index']);
Route::get('/type/create', [DrugTypeController::class, 'create']);
Route::post('/type/new', [DrugTypeController::class, 'store']);
Route::post('/type/edit/{id}', [DrugTypeController::class, 'edit']);
Route::put('/type/update/{id}', [DrugTypeController::class, 'update']);
Route::delete('/type/destroy/{id}', [DrugTypeController::class, 'destroy']);

Route::get('/drug', [DrugController::class, 'index']);
Route::get('/drug/create', [DrugController::class, 'create']);
Route::post('/drug/new', [DrugController::class, 'store']);
Route::post('/drug/edit/{id}', [DrugController::class, 'edit']);
Route::put('/drug/update/{id}', [DrugController::class, 'update']);
Route::delete('/drug/destroy/{id}', [DrugController::class, 'destroy']);

Route::get('/drugIn', [DrugInController::class, 'index']);
Route::get('/drugIn/create', [DrugInController::class, 'create']);
Route::post('/drugIn/new', [DrugInController::class, 'store']);
Route::post('/drugIn/edit/{id}', [DrugInController::class, 'edit']);
Route::put('/drugIn/update/{id}', [DrugInController::class, 'update']);
Route::delete('/drugIn/destroy/{id}', [DrugInController::class, 'destroy']);

Route::get('/drugOut', [DrugOutController::class, 'index']);
Route::get('/drugOut/create', [DrugOutController::class, 'create']);
Route::post('/drugOut/new', [DrugOutController::class, 'store']);
Route::post('/drugOut/edit/{id}', [DrugOutController::class, 'edit']);
Route::put('/drugOut/update/{id}', [DrugOutController::class, 'update']);
Route::delete('/drugOut/destroy/{id}', [DrugOutController::class, 'destroy']);

require __DIR__.'/auth.php';
