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

Route::get('/search_employee', [EmployeeController::class, 'search_employee']);

Route::get('/company_export_excel', [CompanyController::class, 'companyExportIntoExcel']);
Route::get('/company_export_csv', [CompanyController::class, 'companyExportIntoCSV']);

//Route::get('/employee_export_excel', [EmployeeController::class, 'employeeExportIntoExcel']);
//Route::get('/employee_export_csv', [EmployeeController::class, 'employeeExportIntoCSV']);

require __DIR__.'/auth.php';
