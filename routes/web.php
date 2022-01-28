<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Sku\SkuController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Payroll\PayrollController;
use App\Http\Controllers\Calculator\CalculatorController;
use App\Http\Controllers\SalesHistory\SalesHistoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
   
    Route::get('/admin/home',[AdminController::class, 'home'])->name('admin-home');
    Route::get('logout',[AdminController::class, 'logout'])->name('logout');
    //Category Routes
    Route::get('/admin/add-category',[AdminController::class, 'category'])->name('admin-add-category');
    Route::post('addcategory',[AdminController::class, 'addcategory']);
    Route::get('/admin/all-categories',[AdminController::class, 'allcategories'])->name('admin-all-categories');
    Route::get('/admin-edit-category/{id}',[AdminController::class, 'update']);
    Route::get('/admin-delete-category/{id}',[AdminController::class, 'delete']);
    Route::post('update-category/{id}',[AdminController::class, 'updatecategory']);

    //Employee Routes 
    Route::get('/admin/add-employee',[EmployeeController::class, 'employee'])->name('admin-add-employee');
    Route::get('admin/all-employees',[EmployeeController::class, 'allemployees'])->name('admin-all-employees');
    Route::post('addemployee',[EmployeeController::class, 'addemployee']);
    Route::get('admin-edit-category/{id}',[EmployeeController::class, 'update']);
    Route::get('admin-delete-category/{id}',[EmployeeController::class, 'delete']);
    Route::post('updateemployee/{id}',[EmployeeController::class, 'updateemployee']);

    //Amazon upload from csv 
    Route::get('/admin/add-amazon-csv',[CalculatorController::class, 'addAmazonCSV'])->name('admin-add-amazon-csv');
    Route::post('/admin/storeamazon-csv',[CalculatorController::class, 'storeAmazonCSV'])->name('admin-store-amazon-csv');
    Route::get('/admin/amazon-all', [CalculatorController::class, 'allamazonsales'])->name('admin-amazon-all');

//Arafat Part

    //Product Routes
    Route::get('/admin/add-product',[ProductController::class, 'product'])->name('admin-add-product');
    Route::post('add-product',[ProductController::class, 'addProduct']);
    Route::get('/admin/product-all', [ProductController::class, 'allproducts'])->name('admin-product-all');
    Route::get('/admin/edit-product/{id}',[ProductController::class, 'getUpdatedProduct']);
    Route::post('update-product/{id}',[ProductController::class, 'updateProduct']);
    Route::get('/admin/delete-product/{id}',[ProductController::class, 'deleteProduct']);
    //Product upload from csv
    Route::get('/admin/add-product-csv',[ProductController::class, 'addProductCSV'])->name('admin-add-product-csv');
    Route::post('/admin/store-csv',[ProductController::class, 'storeProductCSV'])->name('admin-store-product-csv');

    //Sales History routes
    Route::get('/admin/add-sales-info',[SalesHistoryController::class, 'salesHistory'])->name('admin-sales-info');
    Route::post('/admin/store-sales-info',[SalesHistoryController::class, 'storeSalesHistory'])->name('store-sales-info');
    Route::get('/admin/sale-history-by-month/{year}',[SalesHistoryController::class, 'salesHistoryByMonth'])->name('sales-month');
    Route::post('/admin/post-sale-history-by-month',[SalesHistoryController::class, 'postSalesHistoryByMonth'])->name('post-sales-month');
    Route::get('/admin/sale-history-by-year/{year}',[SalesHistoryController::class, 'salesHistoryByYear'])->name('sales-year');
    Route::post('/admin/post-sale-history-by-year',[SalesHistoryController::class, 'postSalesHistoryByYear'])->name('post-sales-year');
    Route::get('/admin/edit-sales-info/{id}/{year}/{month}',[SalesHistoryController::class, 'editSalesHistory'])->name('edit-sales-info');
    Route::post('/admin/update-sale-history',[SalesHistoryController::class, 'updateSalesHistory']);
    Route::get('/admin/delete-sale-history/{id}/{year}/{month}',[SalesHistoryController::class, 'deleteSalesHistory']);

    //Payroll Routes 
    Route::get('/admin-employee-payroll',[PayrollController::class, 'payroll'])->name('admin-employee-payroll');
    Route::post('add-payroll',[PayrollController::class, 'addPayroll']);
    Route::get('/admin-payroll-all',[PayrollController::class, 'allPayrolls'])->name('admin-payroll-all');
    Route::get('/admin-payroll-edit-payroll/{id}',[PayrollController::class, 'update']);
    Route::get('/admin-payroll-delete-payroll/{id}',[PayrollController::class, 'delete']);
    Route::post('update-payroll/{id}',[PayrollController::class, 'updatePayroll']);

});











// //SKU Routes
// Route::get('/Admin/Add/Sku', function () {
//     return view('Admin.pages.SKU.AddSku');
// })->middleware(['auth'])->name('Admin-Sku-AddSku');
// Route::post('addsku',[SkuController::class, 'addsku']);
// Route::get('/Admin/Sku/All',[SkuController::class, 'allskus'])->name('Admin-Sku-All');
// Route::get('/Admin/Sku/EditSku/{id}',[SkuController::class, 'update']);
// Route::get('/Admin/Sku/DeleteSku/{id}',[SkuController::class, 'delete']);
// Route::post('updatesku/{id}',[SkuController::class, 'updatesku']);
// //Insert Routes
// Route::get('/Admin/Debit-Credit',[ProductController::class, 'insert'])->name('Admin-Debit-Credit');
// Route::post('adddebitcredit',[ProductController::class, 'adddebitcredit']);
// Route::get('/Admin/Debit', function () {
//     return view('Admin.pages.Debit');
// })->middleware(['auth'])->name('Admin-Debit');
// Route::get('/Admin/Credit', function () {
//     return view('Admin.pages.Credit');
// })->middleware(['auth'])->name('Admin-Credit');
// Route::get('/Admin/Insert/All', [ProductController::class, 'allinsert'])->name('Admin-Insert-All');
