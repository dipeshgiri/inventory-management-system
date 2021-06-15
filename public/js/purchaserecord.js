function checkdata(data)
{
	    var id=data.id;
		var q=document.getElementById(id);
		
		//check attribute value capture
		

		var ch=q.getAttribute('check');
		
		//inut text value capture
		var query=q.value;

		//Div id capture
		var productlist=`productlist`+ch;
		var unitname=`unitname`+ch;
		//id f div where the data is shown
		var idname=document.getElementById(productlist);
		var showdata=document.getElementById(productlist);
		var unitname=document.getElementById(unitname);

		if(query!='')
		{
			var _token=$('input[name="_token"]').val();
			$.ajax({
				url:'/productsearch',
				method:"POST",
				data:{query:query,_token:_token},
				success:function(data)
				{
					$(idname).fadeIn();
					$(showdata).html(data);
				},
				error:function(data)
				{
					console.log(data);
				}
			});

		}
	
		$(idname).on('click','li',function(){
		$(unitname).val($(this).attr('unitname'));
		$(idname).fadeOut();
		$(q).val($(this).text());
	});
}

function active()
{

  if(document.getElementById('checkbox').checked)
  {
     document.getElementById('vatamt').readonly=false;
     document.getElementById('vatamt').value=parseFloat(document.getElementById('subtotalamt').value)*0.13;
  }

  else
  {
     document.getElementById('vatamt').readonly=true; 
     document.getElementById('vatamt').value=0;
  }
  document.getElementById('nettotalamt').value=parseFloat(document.getElementById('vatamt').value)+parseFloat(document.getElementById('subtotalamt').value);


}



function calculate(data)
{
	var id=data.id;
	var q=document.getElementById(id);
	var ch=q.getAttribute('check');
	var sum=0;
	var quantity=document.getElementById('Quantity'+ch).value;
	var rate=document.getElementById('Rate'+ch).value;
	document.getElementById('Amount'+ch).value=quantity*rate;
	for(var i=1;i<=ch;i++)
	{
		sum+=parseFloat(document.getElementById('Amount'+i).value);
	}
	document.getElementById('TotalAmount').value=sum;

	document.getElementById('discountper').onkeyup=function()
	{
		discountper=parseFloat(document.getElementById('discountper').value);
		var discountamt=document.getElementById('discountamt').value=(discountper/100)*sum;
		var subtotal=document.getElementById('subtotalamt').value=sum-discountamt; 
	}

}

function addrow(idno)
{
	var id=parseInt(idno.name);
	var data=document.getElementById(id);
	id=id+1;

	var html=` <div class="row">
                    <div class="col-md-3 pr-2">
                      <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" placeholder="Product Name" check="`+id+`" name="productname[]" id="productname`+id+`" autocomplete="off" onkeyup="checkdata(this);">
                      </div>
                      

                      <div id="productlist`+id+`">
                      </div>

                    </div>
                        <div class="col-md-1 pr-1">
                      <div class="form-group">
                        <label>Unit Name</label>
                        <input type="text" class="form-control" placeholder="Unit Name" name="unitname`+id+`" id="unitname`+id+`" disabled="true">
                      </div>
                    </div>
                     <div class="col-md-2 pr-2">
                      <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" class="form-control" placeholder="Quantity" name="Quantity[]" id="Quantity`+id+`" autocomplete="off"/>
                      </div> 
                    </div>
                     <div class="col-md-2 pr-2">
                      <div class="form-group">
                        <label>Rate</label>
                        <input type="text" class="form-control" placeholder="Rate" name="Rate[]" check="`+id+`"id="Rate`+id+`" autocomplete="off" onkeyup="calculate(this)"/>
                      </div>
                    </div>
                     <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Amount</label>
                        <input type="text" class="form-control" placeholder="Amount" name="Amount[]" id="Amount`+id+`" autocomplete="off"/>
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="form-group">
                        <a href="#" class="btn btn-success btn-sm" style="margin-top:30px;" name="`+id+`" onclick="addrow(this);">+</a>
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="form-group">
                        <a href="#" class="btn btn-danger btn-sm" style="margin-top:30px;" name="`+id+`" onclick="deleterow(this);">-</a>
                      </div>
                    </div>

                    </div>

                    <div id="`+id+`">
                    </div>                  
                  `
                    data.innerHTML=html;
}

function deleterow(idno)
{
	var id=parseInt(idno.name)-1;
	console.log(id);
	document.getElementById(id).innerHTML="";
}


