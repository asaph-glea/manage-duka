<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\SupplierController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');

Route::get('/logout', [AdminController::class, 'AdminLogoutPage'])->name('admin.logout.page');


Route::middleware(['auth'])->group(function(){ 

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    
    
    Route::get('/change/password', [AdminController::class, 'ChangePassword'])->name('change.password');
    
    Route::post('/update/password', [AdminController::class, 'UpdatePassword'])->name('update.password');

    //employee route 

Route::controller(EmployeeController::class)->group(function(){

    Route::get('/all/employee','AllEmployee')->name('all.employee');
    Route::get('/add/employee','AddEmployee')->name('add.employee');
    Route::post('/store/employee','StoreEmployee')->name('employee.store');
    Route::get('/edit/employee/{id}','EditEmployee')->name('edit.employee');
    Route::post('/update/employee','UpdateEmployee')->name('employee.update');
    Route::get('/delete/employee/{id}','DeleteEmployee')->name('delete.employee');

});

//customer route

Route::controller(CustomerController::class)->group(function(){

    Route::get('/all/customer','AllCustomer')->name('all.customer');
    Route::get('/add/customer','AddCustomer')->name('add.customer');
    Route::post('/store/customer','StoreCustomer')->name('customer.store');
    Route::get('/edit/customer/{id}','EditCustomer')->name('edit.customer');
    Route::post('/update/customer','UpdateCustomer')->name('customer.update');
    Route::get('/delete/customer/{id}','DeleteCustomer')->name('delete.customer');
});

//Supplier route

Route::controller(SupplierController::class)->group(function(){

    Route::get('/all/supplier','AllSupplier')->name('all.supplier');
    Route::get('/add/supplier','AddSupplier')->name('add.supplier');
    Route::post('/store/supplier','StoreSupplier')->name('supplier.store');
    Route::get('/edit/supplier/{id}','EditSupplier')->name('edit.supplier');
    Route::post('/update/supplier','UpdateSupplier')->name('supplier.update');
    Route::get('/delete/supplier/{id}','DeleteSupplier')->name('delete.supplier');
    Route::get('/details/supplier/{id}','DetailsSupplier')->name('details.supplier');

    
});

}); // End User Middleware 


