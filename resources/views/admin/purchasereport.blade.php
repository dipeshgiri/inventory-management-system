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
                <div class="btn-group" style="float:right;">
                    <button type="button" class="btn btn-danger">Reports</button>
                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/reportbysuppliername">By Supplier Name</a>
                        <a class="dropdown-item" href="/reportbypurchasedate">By Purchase Date</a>
                        <a class="dropdown-item" href="#">By Purchase Items</a>
                    </div>
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
                                        <a href="/viewpurchasedetail/{{$row->id}}"
                                            class="btn btn-sm btn-success">View</a>
                                        <a class="btn btn-sm btn-warning"
                                            href="/editpurchasedetail/{{$row->id}}">Edit</a>
                                        <a class="btn btn-sm btn-danger"
                                            href="/deletepurchasedetail/{{$row->id}}">Delete</a>
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