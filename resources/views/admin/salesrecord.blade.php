@extends('layouts.layout_master')

@section('title')
	Sales Entry
@endsection

@section('session')
  @if(Session::get('status'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> New Sales Record Successfully
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@elseif(Session::get('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong>Internal Server Error Occured Records Not Saved Please Try Again....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@endsection

@section('content')
 <div class="content">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Add New Sales Records</h5>
              </div>
              <div class="card-body">
              	<form action="/salesdatasubmit" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-md-6 pr-2">
                      <div class="form-group">
                        <label>Customer Name</label>
                         <select class="form-control" id="customerlist" name="customername">
                          <option value="NULL">.....Please Select Supplier.....</option>
                          
                          @foreach($results as $data)
                          <option value="{{$data->id}}">{{$data->customer_name}}</option>
                          @endforeach
                         
                          </select> 
                        </div>          
                    </div>
                    <div class="col-md-6 pr-2">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Date</label>
                        <input type="text" class="form-control" placeholder="Date" name="date">
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-3 pr-2">
                      <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" placeholder="Product Name" name="productname[]" id="productname1" check="1" autocomplete="off" onkeyup="checkdata(this);">
                      </div>
                      

                      <div id="productlist1">
                      </div>

                    </div>
                        <div class="col-md-1 pr-1">
                      <div class="form-group">
                        <label>Unit Name</label>
                        <input type="text" class="form-control" placeholder="Unit Name" name="unitname1" id="unitname1" disabled="true">
                      </div>
                    </div>
                     <div class="col-md-2 pr-2">
                      <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" class="form-control" placeholder="Quantity" name="Quantity[]" id="Quantity1" autocomplete="off"/>
                      </div>
                    </div>
                     <div class="col-md-2 pr-2">
                      <div class="form-group">
                        <label>Rate</label>
                        <input type="text" class="form-control" placeholder="Rate" name="Rate[]" id="Rate1" autocomplete="off" check="1" onkeyup="calculate(this)">
                      </div>
                    </div>
                     <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Amount</label>
                        <input type="text" class="form-control" placeholder="Amount" name="Amount[]" id="Amount1" autocomplete="off"/>
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="form-group">
                        <a href="#" class="btn btn-success btn-sm" style="margin-top:30px;" name="1" onclick="addrow(this);">+</a>
                      </div>
                    </div>

                    </div>

                    <div id="1">
                    </div>

                    <hr>

                    <div class="row">
                      <div class="col-md-6 pr-2" style="margin:auto;">
                        <label>Total Amount</label>
                      <input type="text" class="form-control" placeholder="Total-Amount" id="TotalAmount" name="totalAmount" readonly>
                    </div>
                    </div>
                    <br>       
                      <div class="row">
                      <div class="col-md-6 pr-2" style="margin:auto;">
                        <label>Discount %</label>
                      <input type="text" class="form-control" placeholder="Discount %" name="discountper" id="discountper">
                    </div>       
                  </div>
                  <br>
                  <div class="row">
                      <div class="col-md-6 pr-2" style="margin:auto;">
                        <label>Discount Amount</label>
                      <input type="text" class="form-control" placeholder="Discount Amount" name="discountamt" id="discountamt" readonly>
                    </div>       
                  </div>
                  <br>
                    <div class="row">
                      <div class="col-md-6 pr-2" style="margin:auto;">
                        <label>Sub-Total-Amount</label>
                      <input type="text" class="form-control" placeholder="Sub-Total-Amount" id="subtotalamt" name="subtotalamt" readonly>
                    </div>       
                  </div>
                  <br>
                      <div class="row">
                      <div class="col-md-6 pr-2" style="margin:auto;">
                        <input type="checkbox" id="checkbox" onclick="active()">
                        <label style="margin-left:10px;">Vat-Amount</label>
                      <input type="text" class="form-control" placeholder="Vat-Amount" id="vatamt" name="vatamt" readonly>
                    </div>
                  </div>
                    
                    <br>
                    <div class="row">
                      <div class="col-md-6 pr-2" style="margin:auto;">
                        <label>Net-Total-Amount</label>
                      <input type="text" class="form-control" placeholder="Net-Total-Amount" id="nettotalamt" name="nettotalamt" readonly>
                    </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-2" style="margin:auto;">
                        <label>Mode-Of-Payment</label>
                        <select class="form-control" id="modeofpayment" name="modeofpayment">
                          <option value="NULL">.....Please Select Payment Mode.....</option>
                          <option value="1">PAID</option>
                          <option value="0">DUE</option>
                         
                          </select> 
                       
                    </div>
                    <div class="col-md-2 " style="margin:auto;">
                        <label>Paid-Amount</label>
                      <input type="text" class="form-control" placeholder="Paid-Amount" id="paidamt" name="paidamt">
                    </div>
                    <div class="col-md-2 " style="margin:auto;">
                        <label>Due-Amount</label>
                      <input type="text" class="form-control" placeholder="Due-Amount" id="dueamt" name="dueamt" readonly>
                    </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-6 pr-2" style="margin:auto;">
                      <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                    </div>       
                  </div>
                  </div>
                </form>
                  <script type="text/javascript" src="../js/salesrecord.js"></script>
                
 			 </div>
			</div>
		</div>
	</div>
</div>
@endsection

