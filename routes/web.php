<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Frontendroutes
Route::get('/','FrontendController@index');

// Admin Route
Route::get('/dashboard','AdminController@index');
Route::get('/user','AdminController@Userlist');
Route::get('/user/create','AdminController@Usercreate');
Route::post('/user/store','AdminController@UserStore');
Route::get('/user/edit/{id}','AdminController@UserEdit');
Route::post('/user/update','AdminController@UserUpdate');
Route::get('/user/delete/{id}','AdminController@UserDelete');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Inventory
Route::resource('inventory','InventoryController');
Route::resource('account','AccountController');

Route::resource('customer','CustomerController');
Route::resource('sale','SalesController');
Route::resource('item','ItemsController');
Route::get('status/{id}','ItemsController@ItemPublishedStatus');
Route::get('statusremove/{id}','ItemsController@ItemUnPublishedStatus');

Route::resource('purchase','PurchaseController');
Route::resource('supplier','SupplierController');
Route::get('status/{id}','SupplierController@SupplierPublished');
Route::get('statusremove/{id}','SupplierController@SupplierUnPublished');

 // Route::resource('employee','EmployeeController');

Route::get('employee','EmployeeController@index');
Route::get('employee/create','EmployeeController@create');
Route::post('employee/store','EmployeeController@store');
Route::get('employeed/{did}','EmployeeController@Details');
Route::get('employee/edit/{id}','EmployeeController@employeeGet');
Route::post('employee/update','EmployeeController@update');
Route::delete('employee/{id}','EmployeeController@destroy');

// giftcard
Route::get('giftcard{id?}','GiftcardController@index');
Route::post('giftcard','GiftcardController@store');
Route::get('giftdetails/{did}','GiftcardController@Details');
Route::get('giftcard/{id?}','GiftcardController@edit');
Route::put('giftcard/{id?}','GiftcardController@update');
Route::delete('giftcard/{id?}','GiftcardController@destroy');

Route::resource('report','ReportController');
Route::get('Ajax/purchase_report','ReportController@PurchaseReport');

// Route::get('sale', ['uses'=>'SalesController@datatable']);
// Route::get('sale/index', ['as'=>'sale.index','uses'=>'SalesController@index']);

// Report
Route::view('purchase_report','Admin.Reports.purchase_report');
Route::view('sales_report','Admin.Reports.sales_report');
Route::view('item_report','Admin.Reports.item_report');
Route::view('hr_report','Admin.Reports.hr_report');
Route::view('user_report','Admin.Reports.user_report');
Route::view('supplier_report','Admin.Reports.supplier_report');

// Sittings
// Route::view('general','Admin.Sittings.sitting');
Route::get('general','SittingController@Edit');
Route::post('/sitting/update','SittingController@Update');
