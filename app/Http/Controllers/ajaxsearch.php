<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\products;
use App\Models\suppliersdetails;
use App\Models\purchaseorders;
use App\Models\purchaseordersdetails;

class ajaxsearch extends Controller
{
    function productlist(Request $req)
    {
        if($req->get('query'))
        
            $data=DB::table('products')->where('product_name','LIKE','%'.$req->get('query').'%')->get();
            $output='<ul class="dropdown-menu" style="display:block;position:relative;">';
            foreach($data as $row)
            {
                $output .='<li unitname='.$row->unit_name.'><a href="#">'.$row->product_name.'</a></li>';
            }
            $output .='</ul>';
            echo $output;
        
    }
    function purchase_report_by_date(Request $req)
    {
        $startdate=$req->get('startdate');
        $enddate=$req->get('enddate');
        $data=DB::table('suppliers')->select('suppliers.supplier_name','purchase_order_details.date','purchase_order_details.id','purchase_order_details.total_amt_with_vat')->rightJoin('purchase_order_details','purchase_order_details.supplier_id','=','suppliers.id')->whereBetween('purchase_order_details.date',[$startdate,$enddate])->get();
        echo $data;

    }
}