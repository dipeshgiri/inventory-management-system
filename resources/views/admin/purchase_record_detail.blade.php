@extends('layouts.layout_master')

@section('title')
	Purchase Order Detail Report
@endsection

@section('content')

<div class="row">
<div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Purchase Orders
                </h4>
              </div>
              <div class="card-body">
                <div class="container">
                  <p style="text-align:left;">
                    <b>#Order Id:  </b>5
                      <span style="float:right;">
                        <b>Supplier Name: </b>New Rajan Stores
                      </span>
                  </p>
                  <p style="text-align:left;"><b>Order Date:   </b>2078-01-25
                    <span style="float:right;"><b>Supplier Address: </b>Kalanki</span>
                  </p>
                  <p style="text-align:left;"><b>Due Date:  </b>2078-02-25
                    <span style="float:right;"><b>Phone Number: </b>9810415498</span>
                  </p>
                  <p style="float: right;"><b>Email Address: </b>rajan123@gmail.com</p>
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
                      <tr class="text-center">
                        <td>Roza Sardina 140gm</td>
                        <td>40</td>
                        <td>Pcs</td>
                        <td>148.90</td>
                        <td>25590</td>
                        
                      </tr>
                       <tr class="text-center">
                        <td>Roza Sardina 140gm</td>
                        <td>40</td>
                        <td>Pcs</td>
                        <td>148.90</td>
                        <td>25590</td>
                        
                      </tr>
                       <tr class="text-center">
                        <td>Roza Sardina 140gm</td>
                        <td>40</td>
                        <td>Pcs</td>
                        <td>148.90</td>
                        <td>25590</td>
                        
                      </tr>
                       <tr class="text-center">
                        <td>Roza Sardina 140gm</td>
                        <td>40</td>
                        <td>Pcs</td>
                        <td>148.90</td>
                        <td>25590</td>
                        
                      </tr>

                    </tbody>
                  </table>
                  <br>
                  <p style="margin-left:700px;"><b>Total Amount : <b><span style="float: right;">120097</span></p>
                  <p style="margin-left:700px;"><b>Discount Amount : <b><span style="float: right;">120097</span></p>
                     <p style="margin-left:700px;"><b>Vat Amount : <b><span style="float: right;">120097</span></p>
                      <hr>

                  <p><span style="text-align:left;">Order By: Jiwan</span><span style="margin-left: 590px;"><b>Net-Total-Amount : <b></b><span style="float: right;">120097</span></p>
                  <p class="text-center text-white"><a class="btn btn-success">Print</a></p>

                </div>
                 </div>


</div>
</div>
</div>
</div>
</div>
@endsection

