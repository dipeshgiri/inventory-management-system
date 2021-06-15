<?php

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
    return view('welcome');
});
//Route::post('/logincheck',"App\Http\Controllers\loginsession@logincheck");
Route::get('/home','HomeController@index')->name('home');
Route::auth();

Route::group(['middleware'=>['admin']],function()
{
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

//SUPPLIERS CONTENT
//Show all Suppliers
Route::get('/supplier','suppliers@showallsupplier');
	
//Add New Suppliers
Route::post('/addnewsupplier','suppliers@addsupplier');



//PURCHASE RECORDS CONTENTS

//Add New Purchase Records
Route::get('/purchaseentry','purchase_entry@purchaseform');
//Search Products Using AJAX in Purchase Records

Route::post('/productsearch','ajaxsearch@productlist');

//Purchase order data pushed to database
Route::post('/purchasedatasubmit','purchase_entry@purchasedatasave');

//purchase order reports
Route::get('/purchasereport','purchase_entry@purchasereport');

//purchase report view details
Route::get('/viewpurchasedetail/{id}','purchase_entry@viewdetailpurchasereport');

//PRODUCTS CONTENTS

//SHOW ALL PRODICTS
Route::get('/addnewproduct','products_details@showallproduct');
//Add New Products
Route::post('/addproduct','products_details@addnewproducts');
//Products PDF REPORTS
Route::get('/productpdf','products_details@productpdf');


});
