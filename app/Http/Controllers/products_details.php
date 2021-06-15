<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\products;
use PDF;
class products_details extends Controller
{
    public function showallproduct()
    {
    	$result=DB::table('products')->orderBy('product_name')->paginate(10);
        return view('admin.addnewproduct',['data'=>$result]);
    }
    public function addnewproducts(Request $req)
    {
    	$addproducts=new products();
        $addproducts->product_name=$req->productname;
        $addproducts->unit_name=$req->unitname;
        $addproducts->product_description=$req->product_description;
        $check=$addproducts->save();
        if($check)
        {
            $req->session()->flash('status',"New Product's Added Successfully");
            return redirect('/addnewproduct');
        }

    }
    public function productpdf()
    {
    	$data=DB::table('products')->orderBy('product_name')->get();
    	$pdf=PDF::loadView('admin.productpdf',['data'=>$data]);
        return $pdf->stream();
    }
}
