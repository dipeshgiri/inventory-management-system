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

//CUSTOMER CONTENT
//show all customers
Route::get('/customer','customers@showallcustomer');

//Add New customer
Route::post('/addnewcustomer','customers@addcustomer');

//PURCHASE RECORDS CONTENTS

//Add New Purchase Records
Route::get('/purchaseentry','purchase_entry@purchaseform');
//Search Products Using AJAX in Purchase/sales Records

Route::post('/productsearch','ajaxsearch@productlist');

//Purchase order data pushed to database
Route::post('/purchasedatasubmit','purchase_entry@purchasedatasave');

//purchase order reports
Route::get('/purchasereport','purchase_entry@purchasereport');

//purchase report view details
Route::get('/viewpurchasedetail/{id}','purchase_entry@viewdetailpurchasereport');

//purchase records print
Route::get('/purchaseorderpdf/{id}','purchase_entry@printpurchaserecord');

//purchase records search by date
Route::get('/reportbypurchasedate',function()
{
    return view('/admin.purchase_records_by_date');
});


//purchase records by date search the request form ajax
Route::post('/purchasereportbydate','ajaxsearch@purchase_report_by_date');
//purchase records by date pdf
Route::post('/purchasereportbydatepdf','purchase_entry@print_purchase_record_by_Date');

//purchase report by supplier name and date
Route::get('/reportbysuppliername',function(){
    return view('/admin.purchase_report_by_supplier_name');
});

//Purchase records by supplier name search the request from ajax
Route::post('/purchasereportbysupplier','ajaxsearch@purchase_report_by_supplier');

//Purchase records by supplier name pdf
Route::post('/purchasereportbysupplierpdf','purchase_entry@print_purchase_record_by_suppliername');

//SALES CONTENT

////Add New Sales Records
Route::get('/salesentry','sales_entry@salesform');

//Sales order data pushed to database
Route::post('/salesdatasubmit','sales_entry@salesdatasave');

//Sales Report 

Route::get('/salesreport','sales_entry@salesreport');

//sales report view details
Route::get('/viewsalesdetail/{id}','sales_entry@viewdetailsalesreport');

//sales records print
Route::get('/sales_record_pdf/{id}','sales_entry@printsalesrecord');

//PRODUCTS CONTENTS

//SHOW ALL PRODUCTS
Route::get('/addnewproduct','products_details@showallproduct');
//Add New Products
Route::post('/addproduct','products_details@addnewproducts');
//Products PDF REPORTS
Route::get('/productpdf','products_details@productpdf');

//STOCK CONTENT
Route::get('/stock','stocks@stock_detail');
Route::get('/stockpdf','stocks@stockpdf');

});
