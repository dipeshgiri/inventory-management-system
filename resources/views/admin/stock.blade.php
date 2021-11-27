@extends('layouts.layout_master')

@section('title')
Stock Report
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Stock Report 
                </h4>
                <a class="btn btn-info btn-sm float-right" href="./stockpdf">PDF</a>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <th class="text-center" scope="col">
                                   Product Name
                                </th>
                                <th class="text-center" scope="col">
                                   Quantity
                                </th>
                                <th class="text-center" scope="col">
                                   Unit Name
                                </th>
                                <th class="text-center" scope="col">
                                   Description
                                </th>
                                
                                <th class="text-center" scope="col">
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                @foreach($data as $row)
                                <tr class="text-center">
                                    <td>
                                        {{$row->product_name}}
                                    </td>
                                    <td>
                                        {{$row->unit_in_stock}}
                                    </td>
                                    <td>
                                        {{$row->unit_name}}
                                    </td>
                                    <td>
                                        {{$row->product_description}}
                                    </td>
                                    <td>
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