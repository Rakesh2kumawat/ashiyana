<?php

use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\admin\CategoryConroller;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SubcategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\AllocationsController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\RemainingController;

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

Route::get('admin/customer/index', [CustomerController::class, 'index'])->name('customers.index');
Route::get('admin/customer/add', [CustomerController::class, 'add'])->name('customer.add');
Route::post('admin/customer/add', [CustomerController::class, 'register'])->name('customer.register');
Route::get('/admin/customer/update/{id}', [CustomerController::class, 'update'])->name('customer.editdata');
Route::post('/admin/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
Route::get('/admin/customer/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');
Route::post('/admin/customer/index', [CustomerController::class, 'search'])->name('customer.search');





// Route::get('/', function () {
//     return view('welcome');
// });
// Route::middleware('custom.if.authenticated')->group(function(){
Route::get('/admin/login', [AuthController::class, 'login_view'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login_post'])->name('login');
// });
// Route::middleware('auth')->group(function(){


Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::post('/admin/dashboard', [DashboardController::class, 'allotment'])->name('dashboard.allotment');

Route::get('/admin/dashboard/view_category_application', [DashboardController::class, 'total_application'])->name('dashboard.total_application');


Route::get('/admin/category/add', [CategoryConroller::class, 'add'])->name('category.add');
Route::post('/admin/category/add', [CategoryConroller::class, 'add_submit'])->name('category.add.submit');
Route::get('/admin/category/index', [CategoryConroller::class, 'index'])->name('category.index');
Route::get('/admin/category/delete/{id}', [CategoryConroller::class, 'delete'])->name('category.delete');
Route::get('/admin/category/update/{id}', [CategoryConroller::class, 'update'])->name('category.update');
Route::post('/admin/category/update/{id}', [CategoryConroller::class, 'update_submit'])->name('category.update.submit');
Route::get('/admin/category/change-category/{name}', [DashboardController::class, 'changeCategory'])->name('change.category');

// product

Route::get('/admin/product/add', [ProductController::class, 'add'])->name('product.add');
Route::post('/admin/product/add', [ProductController::class, 'add_submit'])->name('product.add.submit');
Route::get('/admin/product/index', [ProductController::class, 'index'])->name('product.index');
Route::get('/admin/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
Route::get('/admin/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/admin/product/edit/{id}', [productcontroller::class, 'edit_submit'])->name('product.edit.submit');
Route::post('/admin/subcatgory/get', [productcontroller::class, 'subcategory_get'])->name('subcategory.get');

Route::get('/admin/subcategory/add', [SubcategoryController::class, 'add'])->name('subcategory.add');
Route::post('/admin/subcategory/add', [SubcategoryController::class, 'add_submit'])->name('subcategory.add.submit');
Route::get('/admin/subcategory/index', [SubcategoryController::class, 'index'])->name('subcategory.index');
Route::get('/admin/subcategory/delete/{id}', [SubcategoryController::class, 'delete'])->name('subcategory.delete');
Route::get('/admin/subcategory/edit/{id}', [SubcategoryController::class, 'edit'])->name('subcategory.edit');
Route::post('/admin/subcategory/update/{id}', [SubcategoryController::class, 'edit_submit'])->name('subcategory.edit.submit');
Route::get('/admin/logout', [AuthController::class, 'admin_logout'])->name('admin.logout');

// Route::get('admin/customer/add',[CustomerController::class,'add'])->name('customer-add');
Route::get('admin/allocations/index', [AllocationsController::class, 'index'])->name('allocations.index');

Route::get('export-users', [AllocationsController::class, 'export'])->name('allocation.excel.export');

Route::get('admin/reservation', [ReservationController::class, 'index'])->name('reservation-view');
Route::get('admin/reservation/submit', [ReservationController::class, 'submit'])->name('reservation-submit');
Route::get('admin/reservation/delete', [ReservationController::class, 'delete'])->name('reservation-delete');


Route::get('admin/remaining', [RemainingController::class, 'index'])->name('remaining-view');
Route::get('admin/remaining/submit', [RemainingController::class, 'submit'])->name('remaining-submit-get');
Route::get('admin/remaining/delete', [RemainingController::class, 'delete'])->name('remaining-delete');
Route::get('admin/remaining/change', [RemainingController::class, 'changeCategory'])->name('change-category');
Route::post('admin/remaining/submit', [RemainingController::class, 'submit'])->name('remaining-submit');
Route::get('admin/remaining/allocations', [RemainingController::class, 'remaining_Unit_allocation'])->name('remaining-allocations');

// });