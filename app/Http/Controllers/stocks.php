<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\products;
use App\Models\stock;

use PDF;

class stocks extends Controller
{
     function stock_detail()
     {
         $data=DB::table('stock_details')->join('products','products.id','=','stock_details.product_id')->paginate(10);
         return view('admin.stock',['data'=>$data]);
     } 
     public function stockpdf()
     {
        $data=DB::table('stock_details')->join('products','products.id','=','stock_details.product_id')->get();
         $pdf=PDF::loadView('admin.stockpdf',['data'=>$data]);
         return $pdf->stream();
     }
    
}
