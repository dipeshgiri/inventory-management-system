@extends('layouts.layout_master')

@section('title')
Sales Orders Report
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Sales Orders
                </h4>
                <div class="btn-group" style="float:right;">
                    <button type="button" class="btn btn-danger">Reports</button>
                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/reportbysuppliername">By Customer Name</a>
                        <a class="dropdown-item" href="/reportbypurchasedate">By Sales Date</a>
                        <a class="dropdown-item" href="#">By Sales Items</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <th class="text-center" scope="col">
                                     Bill Date
                                </th>
                                <th class="text-center" scope="col">
                                    Customer Name
                                </th>
                                <th class="text-center" scope="col">
                                    Total Amount
                                </th>
                                <th class="text-center" scope="col">
                                    Due Amount
                                </th>
                                <th class="text-center" scope="col">
                                    Sold By
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
                                        {{$row->customer_name}}
                                    </td>
                                    <td>
                                        {{$row->total_amt_with_vat}}
                                    </td>
                                    <td>
                                        {{$row->due_amt}}
                                    </td>
                                    <td>
                                        {{$row->name}}
                                    </td>
                                    <td>
                                        <a href="/viewsalesdetail/{{$row->id}}"
                                            class="btn btn-sm btn-success">View</a>
                                        <a class="btn btn-sm btn-warning"
                                            href="/editsalesdetail/{{$row->id}}">Edit</a>
                                        <a class="btn btn-sm btn-danger"
                                            href="/deletesalesdetail/{{$row->id}}">Delete</a>
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