<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\suppliersdetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class suppliers extends Controller
{
    public function addsupplier(Request $req)
    {
    	$addsupplier=new suppliersdetails();
        $addsupplier->supplier_name=$req->suppliername;
        $addsupplier->supplier_address=$req->supplieraddress;
        $addsupplier->supplier_phone=$req->phonenumber;
        $addsupplier->supplier_email=$req->email;
        $addsupplier->supplier_credit_time_days=$req->time;
        $addsupplier->supplier_pan_no=$req->pan;
        $addsupplier->user_id=Auth::id();
        $check=$addsupplier->save();
        if($check)
        {
            $req->session()->flash('status',"New Supplier's Added Successfully");
            return redirect('/supplier');
        }
    }
    public function showallsupplier()
    {
        $result=DB::table('suppliers')->orderBy('supplier_name')->paginate(10);
        return view('admin.supplier',['data'=>$result]);
    }
    
}
