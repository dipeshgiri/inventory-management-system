<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\suppliersdetails;
use App\Models\purchaseorders;
use App\Models\purchaseordersdetails;
use App\Models\products;




class purchase_entry extends Controller
{
	//Open the purchaserecords view file and passes the supplier's list data
    function purchaseform()
    {
    	$data=DB::table('suppliers')->orderBy('supplier_name')->get();
    	return view('admin.purchaserecord',['results'=>$data]);
    }

    //Purchase Order Data save to Database through the purchase order form submit action
    function purchasedatasave(Request $req)
    {
    	$var=$req->all();
    	$purchasedetails=new purchaseordersdetails();
    	$purchasedetails->total_amt=$var['totalAmount'];
    	$purchasedetails->discount_percent=$var['discountper'];
    	$purchasedetails->discount_amount=$var['discountamt'];
    	$purchasedetails->vat_amt=$var['vatamt'];
    	$purchasedetails->total_amt_with_vat=$var['nettotalamt'];
    	$purchasedetails->date=$var['date'];
    	$purchasedetails->supplier_id=$var['suppliername'];
    	$purchasedetails->user_id=Auth::id();
    	$check1=$purchasedetails->save();
    	

    	//getting the purchase order details id
    	$purchase_order_detail_id=$purchasedetails->id;
    	 
    	//calculating the total no of entered products    
    	      
    	$totalproduct=count($var['productname']);

    	for($i=0; $i<$totalproduct; $i++)
    	{
    		$purchaseorder=new purchaseorders();
    		$productid=DB::table('products')->where('product_name',$var['productname'][$i])->get(['id']);
    		$purchaseorder->purchase_order_detail_id=$purchase_order_detail_id;
    		$purchaseorder->product_id=$productid[0]->id;
    		$purchaseorder->unit_price=$var['Rate'][$i];
    		$purchaseorder->product_quantity=$var['Quantity'][$i];
    		$purchaseorder->amount=$var['Amount'][$i];
    		$check2=$purchaseorder->save();
    	}
    	if($check1 && $check2)
    	{
    		$req->session()->flash('status',"New Purchase Records Added Successfully");
  		   return redirect('/purchaseentry');
  		}
  		else{
  			$req->session()->flash('error',"server error occured");
  		   return redirect('/purchaseentry');
  		}
    
    
}

function purchasereport()
{

        $result=DB::table('purchase_order_details')->select('purchase_order_details.date','purchase_order_details.id','purchase_order_details.total_amt_with_vat','suppliers.supplier_name','users.name')->join('suppliers','suppliers.id','=','purchase_order_details.supplier_id')->join('users','users.id','=','purchase_order_details.user_id')->orderBy('purchase_order_details.date')->get();
        return view('admin.purchasereport',['data'=>$result]);
}

function viewdetailpurchasereport(Request $req)
{
    $result=DB::table('suppliers')->select('suppliers.supplier_name','purchase_order_details.date','purchase_order_details.id')->rightJoin('purchase_order_details','purchase_order_details.supplier_id','=','suppliers.id')->get();
    echo $result;
    //return view('admin.purchase_record_detail');
}

}