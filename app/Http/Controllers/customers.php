<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customersdetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class customers extends Controller
{
    public function addcustomer(Request $req)
    {
    	$addcustomer=new customersdetails();
        $addcustomer->customer_name=$req->customername;
        $addcustomer->customer_address=$req->customeraddress;
        $addcustomer->customer_phone=$req->phonenumber;
        $addcustomer->customer_email=$req->email;
        $addcustomer->customer_credit_time_days=$req->time;
        $addcustomer->customer_pan_no=$req->pan;
        $addcustomer->user_id=Auth::id();
        $check=$addcustomer->save();
        if($check)
        {
            $req->session()->flash('status',"New customer's Added Successfully");
            return redirect('/customer');
        }
    }
    public function showallcustomer()
    {
        $result=DB::table('customers')->orderBy('customer_name')->paginate(10);
        return view('admin.customer',['data'=>$result]);
    }
}
