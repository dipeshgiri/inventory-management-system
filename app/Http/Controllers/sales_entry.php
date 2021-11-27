<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\customersdetails;
use App\Models\invoices;
use App\Models\salesorderdetails;
use App\Models\products;

use PDF;

class sales_entry extends Controller
{
    //Open the salesrecords view file and passes the customer's list data
    function salesform()
    {
    	$data=DB::table('customers')->orderBy('customer_name')->get();
    	return view('admin.salesrecord',['results'=>$data]);
    }

    //Sales Order Data save to Database through the Sales order form submit action
    function salesdatasave(Request $req)
    {
    	$var=$req->all();
    	$invoice=new invoices();
        $invoice->customer_id=$var['customername'];
    	$invoice->total_amount=$var['totalAmount'];
    	$invoice->discount_per=$var['discountper'];
    	$invoice->discount_amt=$var['discountamt'];
    	$invoice->vat_amt=$var['vatamt'];
    	$invoice->total_amt_with_vat=$var['nettotalamt'];
    	$invoice->date=$var['date'];
        $invoice->payment_status=$var['modeofpayment'];
        $invoice->due_amt=$var['dueamt'];
    	$invoice->user_id=Auth::id();
    	$check1=$invoice->save();
    	

    	//getting the sales order details id
    	$invoice_id=$invoice->id;
    	 
    	//calculating the total no of entered products    
    	      
    	$totalproduct=count($var['productname']);

    	for($i=0; $i<$totalproduct; $i++)
    	{
    		$salesorderdetails=new salesorderdetails();
    		$productid=DB::table('products')->where('product_name',$var['productname'][$i])->get(['id']);
    		$salesorderdetails->invoice_id=$invoice_id;
    		$salesorderdetails->product_id=$productid[0]->id;
    		$salesorderdetails->quantity=$var['Quantity'][$i];
            $salesorderdetails->unit_price=$var['Rate'][$i];
    		$salesorderdetails->amount=$var['Amount'][$i];
    		$check2=$salesorderdetails->save();
    	}
    	if($check1 && $check2)
    	{
    		$req->session()->flash('status',"New Sales Records Added Successfully");
  		   return redirect('/salesentry');
  		}
  		else{
  			$req->session()->flash('error',"server error occured");
  		   return redirect('/salesentry');
  		}
    
    
}
function salesreport()
{

        $result=DB::table('invoices')->select('invoices.date','invoices.id','invoices.total_amt_with_vat','invoices.due_amt','customers.customer_name','users.name')->join('customers','customers.id','=','invoices.customer_id')->join('users','users.id','=','invoices.user_id')->orderBy('invoices.date')->get();
        return view('admin.salesreport',['data'=>$result]);
}
function viewdetailsalesreport(Request $req)
{
    $result=DB::table('customers')->select('customers.customer_name','customers.customer_address','customers.customer_phone','customers.customer_email','invoices.date','invoices.id','invoices.total_amount','invoices.discount_per','invoices.discount_amt','invoices.vat_amt','invoices.total_amt_with_vat','invoices.due_amt','sales_order_details.unit_price','sales_order_details.quantity','sales_order_details.amount','products.product_name','products.unit_name','users.name')->rightJoin('invoices','invoices.customer_id','=','customers.id')->rightJoin('sales_order_details','sales_order_details.invoice_id','=','invoices.id')->rightJoin('users','users.id','=','invoices.user_id')->rightJoin('products','sales_order_details.product_id','=','products.id')->where('invoices.id','=',$req->id)->get();
     return view('admin.sales_record_detail',['data'=>$result]);
}

//print the sales records

function printsalesrecord(Request $req)
{
     $data=DB::table('customers')->select('customers.customer_name','customers.customer_address','customers.customer_phone','customers.customer_email','customers.customer_pan_no','invoices.date','invoices.id','invoices.total_amount','invoices.discount_per','invoices.discount_amt','invoices.vat_amt','invoices.total_amt_with_vat','invoices.due_amt','sales_order_details.unit_price','sales_order_details.quantity','sales_order_details.amount','products.product_name','products.unit_name','users.name')->rightJoin('invoices','invoices.customer_id','=','customers.id')->rightJoin('users','users.id','=','invoices.user_id')->rightJoin('sales_order_details','sales_order_details.invoice_id','=','invoices.id')->rightJoin('products','sales_order_details.product_id','=','products.id')->where('invoices.id','=',$req->id)->get();
     
    $pdf=PDF::loadView('admin.sales_record_pdf',['data'=>$data]);
    return $pdf->stream();
}
}