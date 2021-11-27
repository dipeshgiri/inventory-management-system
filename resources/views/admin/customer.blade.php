@extends('layouts.layout_master')

@section('title')
	Customers
@endsection

@section('session')
  @if(Session::get('status'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Customer Added Successfully
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@endsection

@section('content')
   <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Add New Customer</h5>
              </div>
              <div class="card-body">
                <form action="/addnewcustomer" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Customer Name</label>
                        <input type="text" class="form-control" placeholder="Customer Name" name="customername">
                      </div>
                    </div>
                    <div class="col-md-6 pr-2">
                      <div class="form-group">
                        <label>Customer Address</label>
                        <input type="text" class="form-control" placeholder="Address" name="customeraddress">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Email Address</label>
                        <input type="Email" class="form-control" placeholder="Email Address" name="email">
                      </div>
                    </div>
                    <div class="col-md-6 pr-2">
                      <div class="form-group">
                        <label>Customer Phone Number</label>
                        <input type="text" class="form-control" placeholder="Customer Phone Number" name="phonenumber">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Credit Time in Days</label>
                        <input type="number" class="form-control" placeholder="Customer Credit Time" name="time">
                      </div>
                    </div>
                    <div class="col-md-6 pr-2">
                      <div class="form-group">
                        <label>Customer Pan Number </label>
                        <input type="text" class="form-control" placeholder="Customer Pan Number" name="pan">
                      </div>
                    </div>
                  </div>
                  <button class="btn btn-success" type="submit">Submit</button>
                </form>
              </div>
            </div>
          </div>
          
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Customer's Details
                </h4>
                <label style="float: right;"><input type="text" class="no-border" placeholder="Search..." id="suppliersearch" onkeyup="searchdata()"></label>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="suppliertable">
                    <thead class=" text-primary">
                      <th class="text-center">
                        Name
                      </th>
                      <th class="text-center">
                       Address
                      </th>
                      <th class="text-center">
                        Email Address
                      </th>
                      <th class="text-center">
                        Phone Number
                      </th>
                      <th class="text-center">
                        Pan Number
                      </th>
                      <th class="text-center">
                        Credit Time 
                      </th>
                      <th class="text-center">
                        Action
                      </th>
                    </thead>
                    <tbody class="text-center">
                      @foreach($data as $datas)
                      <tr>
                        <td>
                          {{$datas->customer_name}}
                        </td>
                        <td>
                          {{$datas->customer_address}}
                        </td>
                        <td>
                          {{$datas->customer_email}}
                        </td>
                        <td>
                          {{$datas->customer_phone}}
                        </td>
                        <td>
                          {{$datas->customer_pan_no}}
                        </td>
                        <td>
                          {{$datas->customer_credit_time_days}}
                        </td>
                        <td>
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
                  </table>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

      <script type="text/javascript" src="../js/supplier.js"></script>   
@endsection
