<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Purchase Orders Records</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

    <h2 class="text-center">Purchase Orders Report</h2>
    <h3 class="text-center">From: {{$startdate}} To: {{$enddate}}</h3>
    <table class="table table-bordered table-sm">
        <thead>
        <tr class="text-center">
            <th>Purchase Id Number</th>
            <th>Date</th>
            <th>Supplier Name</th>
            <th>Amount</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $records)
        <tr class="text-center">
            <td>{{$records->id}}</td>
            <td>{{$records->date}}</td>
            <td>{{$records->supplier_name}}</td>
            <td>{{$records->total_amt_with_vat}}</td>
            </tr>
         @endforeach
        </tbody>
        <tr>

            <td></td>
            <td></td>
            <td class="text-center"><b>Total-Amount</b></td>
            <td class="text-center"><b>{{$sum}}</b></td>
</tr>
    </table>


</body>
</html>