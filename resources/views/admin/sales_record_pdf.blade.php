<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
       
        .invoice h3 {
            margin-left: 15px;
        }
        
        .information h2
        {
            text-align: center;
        }
        .information p
        {
            margin:10px;
        }
        .total
        {
            margin-left:600px;
            font-size:x-small;
        }
        .user
        {
            margin-left:15px;
            font-size:x-small;
        }
    </style>

</head>
<body>

<div class="information">
    <br>
    <h2 class="text-center">Invoice</h2>
    <h2 class="text-center">Family Foods Packaging</h2><!--company name-->
    <h2 class="text-center">Pan No:601052134</h2>
    <p><b>#Order ID: </b>{{$data[0]->id}}<span style="float:right"><b>Customer Name: </b>{{$data[0]->customer_name}}</span></p>

    <p><b>Date:   </b>{{$data[0]->date}}
    <span style="float:right"><b>Customer Address: </b>{{$data[0]->customer_address}}</span>
    </p>
        <p style="float:right;"><b>Phone Number: </b>{{$data[0]->customer_phone}}</p>
                  <p><b>Email Address: </b>{{$data[0]->customer_email}}</p>
                  
        <p style="float:right;"><b>Customer Pan No: </b>{{$data[0]->customer_pan_no}}</p>
                  <p>

   </div>


<br/>

<div class="invoice">
    <h3>Invoice Details</h3>
    <table width="100%">
        <thead>
        <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Unit Name</th>
            <th>Rate</th>
            <th>Amount</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $records)
        <tr style="text-align: center;">
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
    <p class="total"><b>Total-Amount: </b><span>{{$data[0]->total_amount}}</span></p>
    <p class="total"><b>Discount-Percent: </b><span>{{$data[0]->discount_per}}</span></p>
    <p class="total"><b>Discount Amount: </b><span>{{$data[0]->discount_amt}}</span></p>
    <p class="total"><b>Vat Amount: </b><span>{{$data[0]->vat_amt}}</span></p>
    <p class="total"><b>Net-Total-Amount: </b><span>{{$data[0]->total_amt_with_vat}}</span></p>
    <p class="total"><b>Due-Amount: </b><span>{{$data[0]->due_amt}}</span></p>
</div>
<hr>
<p class="user"><b>Sold By:</b><span>{{$data[0]->name}}</span></p>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
            </td>
        </tr>

    </table>
</div>
</body>
</html>