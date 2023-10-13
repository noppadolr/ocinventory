<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManagerController;
Use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\Pos\CustomerController;


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
    return view('admin.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php'

;
//AdminController All Route
Route::middleware(['auth','role:admin'])->group(function () {
    Route::controller(AdminController::class)->group(function (){
        Route::get('admin/dashboard','AdminDashboard')->name('admin.dashboard');
        Route::get('admin/profile','AdminProfile')->name('admin.profile');
        Route::post('update/profile','UpdateProfile')->name('update.profile');
        Route::get('change/password','ChangePassword')->name('change.password');
        Route::post('update/password','UpdatePassword')->name('update.password');
    });


});
//End AdminController All Route
//SupplierController All Route
Route::middleware(['auth','role:admin'])->group(function () {
    Route::controller(SupplierController::class)->group(function (){
        Route::get('supplier/all','SupplierAll')->name('supplier.all');
        Route::post('supplier/add','AddSupplier')->name('supplier.add');
        Route::get('supplier/edit/{id}','SupplierEdit')->name('supplier.edit');
        Route::post('supplier/update/{id}','UpdateSupplier')->name('supplier.update');
        Route::delete('supplier/delete/{id}','SupplierDelete')->name('supplier.delete');


    });
});
//End SupplierController All Route

//Customer All Route
Route::middleware(['auth','role:admin'])->group(function () {
    Route::controller(CustomerController::class)->group(function (){
        Route::get('/customer/all','index')->name('customer.all');
        Route::post('/customer/add','CustomerAdd')->name('customer.add');


    });
});
//End SupplierController All Route

Route::controller(AdminController::class)->group(function (){
    Route::get('admin/login','AdminLogin')->name('admin.login');
});
Route::controller(AuthController::class)->group(function (){
    Route::post('auth','authenticate')->name('auth');
    Route::get('admin/logout','AdminLogout')->name('admin.logout');
});


Route::middleware(['auth','role:manager'])->group(function () {
    Route::controller(ManagerController::class)->group(function (){
        Route::get('manager/dashboard','ManagerDashboard')->name('manager.dashboard');
    });


});
