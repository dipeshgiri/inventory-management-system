@extends('layouts.layout_master')

@section('title')
	Purchase Orders Report
@endsection

@section('content')

<div class="row">
<div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Purchase Orders
                </h4>
               <a class="btn btn-info btn-sm float-right" href="/productpdf">PDF</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="thead-light">
                      <th class="text-center" scope="col">
                        Order Date
                      </th>
                      <th class="text-center" scope="col">
                      	Supplier Name
                      </th>
                      <th class="text-center" scope="col">
                        Total Amount
                      </th>
                      <th class="text-center" scope="col">
                        Ordered By
                      </th>
                      <th class="text-center" scope="col">
                        Action
                      </th>
                    </thead>
                    <tbody>
                    	@foreach($data as $row)
                    	<tr class="text-center">
                    		<td>
                    			{{$row->date}}
                    		</td>
                    		                    		<td>
                    			{{$row->supplier_name}}
                    		</td>
                    		                    		<td>
                    			{{$row->total_amt_with_vat}}
                    		</td>
                    		<td>
                    			{{$row->name}}
                    		</td>
                    		<td>
                    			<a href="/viewpurchasedetail/{{$row->id}}" class="btn btn-sm btn-warning">View Details</a>
                    		</td>

                    	</tr>
                    	@endforeach
                    </tbody>
                  </table>
                </div>
                  <div>
  </div>
</div>
@endsection

