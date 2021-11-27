<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
	<title>Stock Details</title>
</head>
<body>
	<h3 class="text-center">Stock Details</h3>
         <table class="table table-sm table-bordered">
            <br>
         	<thead>
         		<tr>
         			<th class="text-center">Product Name</th>
         			<th class="text-center">Unit</th>
                     <th class="text-center">Quantity</th>
         			<th class="text-center">Product Description</th>
         		</tr>
         		</thead>
         		@foreach($data as $i)
               <tr>
                  <td class="text-center">{{$i->product_name}}</td>
                  <td class="text-center">{{$i->unit_name}}</td>
                  <td class="text-center">{{$i->unit_in_stock}}</td>
                  <td class="text-center">{{$i->product_description}}</td>
            @endforeach  
            <p class="text-center"> Created At: <?php  date_default_timezone_set('Asia/Kathmandu');
         echo date("F j, Y, g:i a"); ?></p>
</body>
</html>