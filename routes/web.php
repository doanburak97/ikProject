<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('companies', CompanyController::class);
Route::resource('employees', EmployeeController::class);

require __DIR__.'/auth.php';
