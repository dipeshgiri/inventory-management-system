@extends('layouts.layout_master')

@section('title')
Purchase Records Report
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Show Records By Date</h5>
                </div>
                <div class="card-body">
                    <form action="/purchasereportbydatepdf" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 pr-2">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="text" class="form-control" placeholder="YYYY-MM-DD" name="startdate"
                                        id="startdate">
                                </div>
                            </div>
                            <div class="col-md-6 pr-2">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input type="text" class="form-control" placeholder="YYYY-MM-DD" name="enddate"
                                        id="enddate">
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-success" href="##" onclick="show_purchase_records_by_date();">Search</a>
                </div>
            </div>
            <script type="text/javascript" src="../js/purchaserecord.js"></script>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Purchase Record's
                            </h4>
                            <button class="btn btn-info btn-sm float-right" type="submit">PDF</a>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th class="text-center">
                                                Purchase Id
                                            </th>
                                            <th class="text-center">
                                                Date
                                            </th>
                                            <th class="text-center">
                                                Supplier Name
                                            </th>
                                            <th class="text-center">
                                                Amount
                                            </th>
                                    </thead>
                                    </tr>

                                    <tbody id="tbody">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endsection