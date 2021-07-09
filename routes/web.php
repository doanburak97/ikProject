<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware('auth')->group(function () {

    Route::resource('companies', CompanyController::class);
    Route::resource('employees', EmployeeController::class);

});

Route::get('/search_company', [CompanyController::class, 'search_company']);
Route::get('/search_employee', [EmployeeController::class, 'search_employee']);

require __DIR__.'/auth.php';
