<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AttendenceController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\ExpenseController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PosController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\RoleController;
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

Route::get('/logout', [AdminController::class, 'adminLogoutPage'])->name('admin.logout.page');

Route::middleware('auth')->group(function () {
    Route::get('/admin/logout', [AdminController::class, 'adminDestroy'])->name('admin.logout');

    // profil
    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'adminProfileStore'])->name('admin.profile.store');

    // change password
    Route::get('/change/password', [AdminController::class, 'changePassword'])->name('change.password');
    Route::post('/update/password', [AdminController::class, 'updatePassword'])->name('update.password');


    // employee
    Route::controller(EmployeeController::class)->group(function () {
        Route::get('/all/employee', 'allEmployee')->name('all.employee')->middleware('permission:all.employee');
        Route::get('/add/employee', 'addEmployee')->name('add.employee')->middleware('permission:add.employee');
        Route::post('/store/employee', 'storeEmployee')->name('employee.store');
        Route::get('/edit/employee/{id}', 'editEmployee')->name('edit.employee')->middleware('permission:edit.employee');
        Route::post('/update/employee', 'updateEmployee')->name('employee.update');
        Route::get('/delete/employee/{id}', 'deleteEmployee')->name('delete.employee')->middleware('permission:delete.employee');
    });


    // customer
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/all/customer', 'allCustomer')->name('all.customer')->middleware('permission:all.customer');
        Route::get('/add/customer', 'addCustomer')->name('add.customer')->middleware('permission:add.customer');
        Route::post('/store/customer', 'storeCustomer')->name('customer.store');
        Route::get('/edit/customer/{id}', 'editCustomer')->name('edit.customer')->middleware('permission:edit.customer');
        Route::post('/update/customer', 'updateCustomer')->name('customer.update');
        Route::get('/delete/customer/{id}', 'deleteCustomer')->name('delete.customer')->middleware('permission:delete.customer');
    });


    // supplier
    Route::controller(SupplierController::class)->group(function () {
        Route::get('/all/supplier', 'allSupplier')->name('all.supplier')->middleware('permission:all.supplier');
        Route::get('/add/supplier', 'addSupplier')->name('add.supplier')->middleware('permission:add.supplier');
        Route::post('/store/supplier', 'storeSupplier')->name('supplier.store');
        Route::get('/edit/supplier/{id}', 'editSupplier')->name('edit.supplier')->middleware('permission:edit.supplier');
        Route::post('/update/supplier', 'updateSupplier')->name('supplier.update');
        Route::get('/detail/supplier/{id}', 'detailSupplier')->name('detail.supplier');
        Route::get('/delete/supplier/{id}', 'deleteSupplier')->name('delete.supplier')->middleware('permission:delete.supplier');
    });


    // salary
    Route::controller(SalaryController::class)->group(function () {
        Route::get('/add/advance/salary', 'addAdvanceSalary')->name('add.advance.salary')->middleware('permission:add.advance.salary');
        Route::post('/advance/salary/store', 'storeAdvanceSalary')->name('advance.salary.store');
        Route::get('/all/advance/salary', 'allAdvanceSalary')->name('all.advance.salary')->middleware('permission:all.advance.salary');
        Route::get('/edit/advance/salary/{id}', 'editAdvanceSalary')->name('edit.advance.salary')->middleware('permission:edit.advance.salary');
        Route::post('/advance/salary/update', 'updateAdvanceSalary')->name('advance.salary.update');

        // pay salary
        Route::get('/pay/salary', 'paySalary')->name('pay.salary')->middleware('permission:pay.salary');
        Route::get('/pay/now/salary{id}', 'payNowSalary')->name('pay.now.salary')->middleware('permission:pay.now.salary');
        Route::post('/employee/salary/store', 'employeSalaryStore')->name('employee.salary.store');
        Route::get('/month/salary', 'monthSalary')->name('month.salary');
    });


    // attendance
    Route::controller(AttendenceController::class)->group(function () {
        Route::get('/employee/attend/list', 'employeeAttendList')->name('employee.attend.list');
        Route::get('/add/employee/attend', 'addEmployeeAttend')->name('add.employee.attend');
        Route::post('/employee/attend/store', 'storeEmployeeAttend')->name('employee.attend.store');
        Route::get('/edit/employee/attend/{date}', 'editEmployeeAttend')->name('employee.attend.edit');
        Route::get('/view/employee/attend/{date}', 'viewEmployeeAttend')->name('employee.attend.view');
    });


    // category
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/all/category', 'allCategory')->name('all.category');
        Route::post('/store/category', 'storeCategory')->name('category.store');
        Route::get('/edit/category/{id}', 'editCategory')->name('edit.category');
        Route::post('/update/category', 'updateCategory')->name('category.update');
        Route::get('/delete/category/{id}', 'deleteCategory')->name('delete.category');
    });


    // product
    Route::controller(ProductController::class)->group(function () {
        Route::get('/all/product', 'allProduct')->name('all.product');
        Route::get('/add/product', 'addProduct')->name('add.product');
        Route::post('/store/product', 'storeProduct')->name('product.store');
        Route::get('/edit/product/{id}', 'editProduct')->name('edit.product');
        Route::post('/update/product', 'updateProduct')->name('product.update');
        Route::get('/delete/product/{id}', 'deleteProduct')->name('delete.product');
        Route::get('/barcode/product/{id}', 'barcodeProduct')->name('barcode.product');
        Route::get('/import/product', 'importProduct')->name('import.product');
        Route::get('/export', 'export')->name('export');
        Route::post('/import', 'import')->name('import');
    });


    // expense
    Route::controller(ExpenseController::class)->group(function () {
        Route::get('/add/expense', 'addExpense')->name('add.expense');
        Route::post('/store/expense', 'storeExpense')->name('expense.store');
        Route::get('/today/expense', 'todayExpense')->name('today.expense');
        Route::get('/edit/expense/{id}', 'editExpense')->name('edit.expense');
        Route::post('/update/expense', 'updateExpense')->name('expense.update');


        Route::get('/month/expense', 'monthExpense')->name('month.expense');
        Route::get('/year/expense', 'yearExpense')->name('year.expense');
    });


    // POS
    Route::controller(PosController::class)->group(function () {
        Route::get('/pos', 'pos')->name('pos');
        Route::post('/add-cart', 'addCart');
        Route::get('/all-item', 'allItem');
        Route::post('/cart-update/{rowId}', 'cartUpdate');
        Route::get('/cart-delete/{rowId}', 'cartDelete');
        Route::post('/create-invoice', 'createInvoice');
    });


    // Order
    Route::controller(OrderController::class)->group(function () {
        Route::post('/final-invoice', 'finalInvoice');
        Route::get('/pending/order', 'pendingOrder')->name('pending.order');
        Route::get('/detail/order/{order_id}', 'detailOrder')->name('order.detail');
        Route::post('/order/status/update', 'orderStatusUpdate')->name('order.status.update');

        Route::get('/complete/order', 'completeOrder')->name('complete.order');

        Route::get('/stock', 'stockManage')->name('stock.manage');
        Route::get('/order/invoice-download/{order_id}', 'orderInvoice');


        Route::get('/pending/due', 'pendingDue')->name('pending.due');
        Route::get('/order/due/{id}', 'orderDueAjax');
        Route::post('/update/due', 'updateDue')->name('update.due');
    });


    // Route Permission
    Route::controller(RoleController::class)->group(function () {
        Route::get('/all/permission', 'allPermission')->name('all.permission');
        Route::get('/add/permission', 'addPermission')->name('add.permission');
        Route::post('/store/permission', 'storePermission')->name('permission.store');
        Route::get('/edit/permission/{id}', 'editPermission')->name('edit.permission');
        Route::post('/update/permission', 'updatePermission')->name('permission.update');
        Route::get('/delete/permission/{id}', 'deletePermission')->name('delete.permission');
    });


    // Role
    Route::controller(RoleController::class)->group(function () {
        Route::get('/all/roles', 'allRoles')->name('all.roles');
        Route::get('/add/roles', 'addRoles')->name('add.roles');
        Route::post('/store/roles', 'storeRoles')->name('roles.store');
        Route::get('/edit/roles/{id}', 'editRoles')->name('edit.roles');
        Route::post('/update/roles', 'updateRoles')->name('roles.update');
        Route::get('/delete/roles/{id}', 'deleteRoles')->name('delete.roles');
    });


    // add roles inn permission
    Route::controller(RoleController::class)->group(function () {
        Route::get('/add/roles/permission', 'addRolesPermission')->name('add.roles.permission');
        Route::post('/role/permission/store', 'rolePermissionStore')->name('role.permission.store');
        Route::get('/all/roles/permission', 'allRolesPermission')->name('all.roles.permission');

        Route::get('/admin/edit/roles/{id}', 'adminEditRoles')->name('admin.edit.roles');
        Route::post('/role/permission/update/{id}', 'rolePermissionUpdate')->name('role.permission.update');
        Route::get('/admin/delete/roles/{id}', 'adminDeleteRoles')->name('admin.delete.roles');
    });


    // admin
    Route::controller(AdminController::class)->group(function () {
        Route::get('/all/admin', 'allAdmin')->name('all.admin');
        Route::get('/add/admin', 'addAdmin')->name('add.admin');
        Route::post('/admin/store', 'adminStore')->name('admin.store');
        Route::get('/edit/admin/{id}', 'editAdmin')->name('edit.admin');
        Route::post('/update/admin', 'updateAdmin')->name('admin.update');
        Route::get('/delete/admin/{id}', 'deleteAdmin')->name('delete.admin');


        // database backup
        Route::get('/database/backup', 'databaseBackup')->name('database.backup');
        Route::get('/backup/now', 'backupNow');
        Route::get('download/{getFilename}', 'downloadDatabase');
        Route::get('delete/database/{getFileName}', 'deleteDatabase');
    });
});

require __DIR__ . '/auth.php';
