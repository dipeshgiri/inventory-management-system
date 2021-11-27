@extends('layouts.layout_master')

@section('title')
	Sales Detail Report
@endsection

@section('content')

<div class="row">
<div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Family Foods Packaging <!-- company name-->
                </h4>
              </div>
              <div class="card-body">
                <div class="container">
                  <p style="text-align:left;">
                    <b>#Invoice Id:  </b>{{$data[0]->id}}
                      <span style="float:right;">
                        <b>Customer Name: </b>{{$data[0]->customer_name}}
                      </span>
                  </p>
                  <p style="text-align:left;"><b>Date:   </b>{{$data[0]->date}}
                    <span style="float:right;"><b>Customer Address: </b>{{$data[0]->customer_address}}</span>
                  
                  
                  </p>
                  <p style="text-align:right;">
                    <b>Phone Number: </b>{{$data[0]->customer_phone}}
                  </p>
                  <p style="float: right;"><b>Email Address: </b>{{$data[0]->customer_email}}</p>
                  
                 <br><hr>
                 <div class="table">
                    <table class="table">
                    <thead>
                      <th class="text-center" scope="col">
                        <b>Product Name</b>
                      </th>
                      <th class="text-center" scope="col">
                        <b>Quantity</b>
                      </th>
                      <th class="text-center" scope="col">
                        <b>Unit Name</b>
                      </th>
                      <th class="text-center" scope="col">
                        <b>Rate</b>
                      </th>
                      <th class="text-center" scope="col">
                        <b>Amount</b>
                      </th>
                    </thead>

                    <tbody>
                      @foreach($data as $records)
                      <tr class="text-center">
                        <td>{{$records->product_name}}</td>
                        <td>{{$records->quantity}}</td>
                        <td>{{$records->unit_name}}</td>
                        <td>{{$records->unit_price}}</td>
                        <td>{{$records->amount}}</td>    
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <br>
                  <p style="margin-left:700px;"><b>Total Amount : <b><span style="float: right;">{{$data[0]->total_amount}}</span></p>
                    <p style="margin-left:700px;"><b>Discount Percentage : <b><span style="float: right;">{{$data[0]->discount_per}}</span></p>
                  <p style="margin-left:700px;"><b>Discount Amount : <b><span style="float: right;">{{$data[0]->discount_amt}}</span></p>
                     <p style="margin-left:700px;"><b>Vat Amount : <b><span style="float: right;">{{$data[0]->vat_amt}}</span></p>
                      <hr>

                  <p><span style="text-align:left;">Sold By: {{$data[0]->name}}</span><span style="margin-left: 590px;"><b>Net-Total-Amount : <b></b><span style="float: right;">{{$data[0]->total_amt_with_vat}}</span></p>

                  <p style="margin-left:720px;"><b>Due Amount : <b><span style="float: right;">{{$data[0]->due_amt}}</span></p>
                  <p class="text-center text-white"><a class="btn btn-success" href="/sales_record_pdf/{{$data[0]->id}}">Print</a></p>

                </div>
                 </div>
                 


</div>
</div>
</div>
</div>
</div>
@endsection

