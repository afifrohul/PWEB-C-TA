<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DrugInController;
use App\Http\Controllers\DrugOutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DrugTypeController;
use App\Http\Controllers\InspectionController;
use App\Http\Controllers\StaffDashboardController;
use App\Http\Controllers\DoctorDashboardController;

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


Route::get('/back-dashboard', [HomeController::class, 'index'])->name('back-dashboard');


Route::group(['middleware' => ['role:doctor']], function () {

    Route::get('/back-doctor/dashboard', [DoctorDashboardController::class, 'index']);

    Route::get('/back-doctor/inspection', [InspectionController::class, 'index']);
    Route::get('/back-doctor/inspection/create', [InspectionController::class, 'create']);
    Route::post('/back-doctor/inspection/new', [InspectionController::class, 'store']);

});

Route::group(['middleware' => ['role:staff']], function () {

    Route::get('/back-staff/dashboard', [StaffDashboardController::class, 'index']);

    Route::get('/back-staff/type', [DrugTypeController::class, 'index']);
    Route::get('/back-staff/type/create', [DrugTypeController::class, 'create']);
    Route::post('/back-staff/type/new', [DrugTypeController::class, 'store']);
    Route::post('/back-staff/type/edit/{id}', [DrugTypeController::class, 'edit']);
    Route::put('/back-staff/type/update/{id}', [DrugTypeController::class, 'update']);
    Route::delete('/back-staff/type/destroy/{id}', [DrugTypeController::class, 'destroy']);

    Route::get('/back-staff/drug', [DrugController::class, 'index']);
    Route::get('/back-staff/drug/create', [DrugController::class, 'create']);
    Route::post('/back-staff/drug/new', [DrugController::class, 'store']);
    Route::post('/back-staff/drug/edit/{id}', [DrugController::class, 'edit']);
    Route::put('/back-staff/drug/update/{id}', [DrugController::class, 'update']);
    Route::delete('/back-staff/drug/destroy/{id}', [DrugController::class, 'destroy']);

    Route::get('/back-staff/drugIn', [DrugInController::class, 'index']);
    Route::get('/back-staff/drugIn/create', [DrugInController::class, 'create']);
    Route::post('/back-staff/drugIn/new', [DrugInController::class, 'store']);
    Route::post('/back-staff/drugIn/edit/{id}', [DrugInController::class, 'edit']);
    Route::put('/back-staff/drugIn/update/{id}', [DrugInController::class, 'update']);
    Route::delete('/back-staff/drugIn/destroy/{id}', [DrugInController::class, 'destroy']);

    Route::get('/back-staff/drugOut', [DrugOutController::class, 'index']);
    Route::get('/back-staff/drugOut/create', [DrugOutController::class, 'create']);
    Route::post('/back-staff/drugOut/new', [DrugOutController::class, 'store']);
    Route::post('/back-staff/drugOut/edit/{id}', [DrugOutController::class, 'edit']);
    Route::put('/back-staff/drugOut/update/{id}', [DrugOutController::class, 'update']);
    Route::delete('/back-staff/drugOut/destroy/{id}', [DrugOutController::class, 'destroy']);

});

require __DIR__.'/auth.php';