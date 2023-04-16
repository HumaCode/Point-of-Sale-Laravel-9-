<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\SalaryController;
use App\Http\Controllers\Backend\SupplierController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    $title = "Dashboard";

    return view('index', compact('title'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/admin/logout', [AdminController::class, 'adminDestroy'])->name('admin.logout');
    Route::get('/logout', [AdminController::class, 'adminLogoutPage'])->name('admin.logout.page');

    // profil
    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'adminProfileStore'])->name('admin.profile.store');

    // change password
    Route::get('/change/password', [AdminController::class, 'changePassword'])->name('change.password');
    Route::post('/update/password', [AdminController::class, 'updatePassword'])->name('update.password');


    // employee
    Route::controller(EmployeeController::class)->group(function () {
        Route::get('/all/employee', 'allEmployee')->name('all.employee');
        Route::get('/add/employee', 'addEmployee')->name('add.employee');
        Route::post('/store/employee', 'storeEmployee')->name('employee.store');
        Route::get('/edit/employee/{id}', 'editEmployee')->name('edit.employee');
        Route::post('/update/employee', 'updateEmployee')->name('employee.update');
        Route::get('/delete/employee/{id}', 'deleteEmployee')->name('delete.employee');
    });


    // customer
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/all/customer', 'allCustomer')->name('all.customer');
        Route::get('/add/customer', 'addCustomer')->name('add.customer');
        Route::post('/store/customer', 'storeCustomer')->name('customer.store');
        Route::get('/edit/customer/{id}', 'editCustomer')->name('edit.customer');
        Route::post('/update/customer', 'updateCustomer')->name('customer.update');
        Route::get('/delete/customer/{id}', 'deleteCustomer')->name('delete.customer');
    });


    // supplier
    Route::controller(SupplierController::class)->group(function () {
        Route::get('/all/supplier', 'allSupplier')->name('all.supplier');
        Route::get('/add/supplier', 'addSupplier')->name('add.supplier');
        Route::post('/store/supplier', 'storeSupplier')->name('supplier.store');
        Route::get('/edit/supplier/{id}', 'editSupplier')->name('edit.supplier');
        Route::post('/update/supplier', 'updateSupplier')->name('supplier.update');
        Route::get('/detail/supplier/{id}', 'detailSupplier')->name('detail.supplier');
        Route::get('/delete/supplier/{id}', 'deleteSupplier')->name('delete.supplier');
    });


    // salary
    Route::controller(SalaryController::class)->group(function () {
        Route::get('/add/advance/salary', 'addAdvanceSalary')->name('add.advance.salary');
        Route::post('/advance/salary/store', 'storeAdvanceSalary')->name('advance.salary.store');
        Route::get('/all/advance/salary', 'allAdvanceSalary')->name('all.advance.salary');
    });
});

require __DIR__ . '/auth.php';
