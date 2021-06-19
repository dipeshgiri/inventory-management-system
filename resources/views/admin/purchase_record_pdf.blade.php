<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Purchase Order Bill</title>

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
        .information {
            background-color: #60A7A6;
            color: #FFF;
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
    <h2>Purchase Order</h2>
    <p><b>#Order ID: </b>{{$data[0]->id}}<span style="float:right"><b>Supplier Name: </b>{{$data[0]->supplier_name}}</span></p>

    <p><b>Order Date:   </b>{{$data[0]->date}}
    <span style="float:right"><b>Supplier Address: </b>{{$data[0]->supplier_address}}</span>
    </p>
        <p style="float:right;"><b>Phone Number: </b>{{$data[0]->supplier_phone}}</p>
                  <p><b>Email Address: </b>{{$data[0]->supplier_email}}</p>
                  
                 <br>
   </div>


<br/>

<div class="invoice">
    <h3>Purchase Details</h3>
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
            <td>{{$records->product_quantity}}</td>
            <td>{{$records->unit_name}}</td>
            <td>{{$records->unit_price}}</td>
            <td>{{$records->amount}}</td>    
            </tr>
         @endforeach
        </tbody>
    </table>
    <br>
    <p class="total"><b>Total-Amount: </b><span>{{$data[0]->total_amt}}</span></p>
    <p class="total"><b>Discount-Percent: </b><span>{{$data[0]->discount_percent}}</span></p>
    <p class="total"><b>Discount Amount: </b><span>{{$data[0]->discount_amount}}</span></p>
    <p class="total"><b>Vat Amount: </b><span>{{$data[0]->vat_amt}}</span></p>
    <p class="total"><b>Net-Total-Amount: </b><span>{{$data[0]->total_amt_with_vat}}</span></p>
</div>
<hr>
<p class="user"><b>Ordered By:</b><span>{{$data[0]->name}}</span></p>

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