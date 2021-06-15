<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\products;
use App\Models\suppliersdetails;


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
}