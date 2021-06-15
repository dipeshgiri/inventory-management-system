@extends('layouts.layout_master')

@section('title')
	Add New Products
@endsection

@section('content')
 <div class="content">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Add New Products</h5>
              </div>
              <div class="card-body">
              	<form action="/addproduct" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-md-4 pr-2">
                      <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" placeholder="Product Name" name="productname">
                      </div>
                    </div>
                    <div class="col-md-4 pr-2">
                      <div class="form-group">
                        <label>Product Unit Name</label>
                        <input type="text" class="form-control" placeholder="Unit Name(Kg/Pcs/Cartoon)" name="unitname">
                      </div>
                    </div>
                    <div class="col-md-4 pr-2">
                      <div class="form-group">
                        <label>Product Description</label>
                         <input type="text" class="form-control" placeholder="Product Description" name="product_description">
                    </div>
                  </div>
 			 </div>
       <button class="btn btn-success">Save</button>
			</div>
		</div>
	</div>
</div>
<div class="row">
<div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Product's Details
                </h4>
               <a class="btn btn-info btn-sm float-right" href="/productpdf">PDF</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th class="text-center">
                        Product Name
                      </th>
                      <th class="text-center">
                       Unit Name
                      </th>
                      <th class="text-center">
                        Product Description
                      </th>
                      <th class="text-center">
                        Action
                      </th>
                    </thead>
                    <tbody>
                      @foreach($data as $datas)
                      <tr>
                        <td class="text-center">
                          {{$datas->product_name}}
                        </td>
                        <td class="text-center">
                          {{$datas->unit_name}}
                        </td>
                        <td class="text-center">
                          {{$datas->product_description}}
                        </td>
                        <td class="text-center">
                          <a href="" class="btn btn-warning">Edit</a> <a href="" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                  <div>
    <br>
    <p id="page">Page: {{$data->currentPage()}}, Showing {{$data->count()}} Records On This Page</p>
    <p id="page">Total Records: {{$data->total()}}</p>
    <br>
    <br>
    {{$data->links()}}
  </div>
</div>
@endsection

