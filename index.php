<!DOCTYPE html>
<html>
<head>
	<title>Fingent</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!--     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 -->    <script type="text/javascript" src="fingentscript.js"></script>

	<style type="text/css">
		.form-group{
			width:280px;
		}
	</style>
</head>
<body>
	<div id="invoiceGenerator">
	    <h2 align="center">Invoice Generator</h2>
	  	<div class="container" id="invoiceDetails">
	  		<div align="left" style="width: 300px;display: inline-block;">
				<label for="varInvoiceNumber">Invoice Number:</label>
				<input type="number" class="form-inline" name="varInvoiceNumber" id="varInvoiceNumber" style="margin-left: 10px">
			</div>
			<div align="right" style="display: inline-block;margin-left: 662px;">
				<label align="right">
	  			Fingent Global Solutions</br>
	  			Infopark</br>
	  			Kochi</label>
	  		</div>
	  		<div>
	  			<label for="datCurrentDate">Date:</label>
	  			<p id="datDate" style="display: inline-block;padding-left: 5px;"></p>
			</div>
	</div>


	  
	<form id="frmInvoieDetails" target="_parent" method="post" class="form-inline" style="padding-top: 18px;">
		<div class="container">	
			<div class="form-group col-xs-2">
				<label for="txtName">Name:</label>
				<input type="text" class="form-control" name="txtName" id="txtName">
			</div>
			<div class="form-group col-xs-2">
				<label for="intQuantity">Quantity:</label>
				<input type="number" class="form-control" name="intQuantity" id="intQuantity">
			</div>
			<div class="form-group col-xs-2">
				<label for="dblUnitPrice">Unit Price:</label>
				<input type="text" placeholder="0.0" class="form-control" name="dblUnitPrice" id="dblUnitPrice">
			</div>
    		<div class="form-group col-xs-2" style="width:146px;">
    			<label for="intTax">Tax:</label>
    			<select id="intTax" class="form-control">
				  <option value="0">0%</option>
				  <option value="1">1%</option>
				  <option value="5">5%</option>
				  <option value="10">10%</option>
				</select>
			</div>
			<div class="form-group" style="width: auto;">
				<button class="btn addBtn">Add</button>
			</div>
			<button class="btn" onclick="resetForm()">Reset</button>
		</div>
	</form>
	<div class="container" style="padding-top: 18px;" id="invoiceItemDetails">
		<table class="table" id="invoiceItems">
			<thead>
				<tr>
					<th>Sl No</th>      
					<th>Name</th>      
					<th>Unit</th>      
					<th>Quantity</th>
					<th>Tax</th>      
					<th>Total</th>      
				</tr>
			</thead>
			<tbody >
			</tbody>
		</table>
	</div>

	<div class="container" id="invoiceSumDetails">
		<table class="table" id="invoiceItemSum">
			<tbody >
			</tbody>
		</table>
	</div>
	<div style="width:100px;" class="container" id="invoiceDiscountDetails">
		<form class="form-inline">
    		<div class="form-group col-xs-5" style="width: 380px;margin-left: 241px;">
				<label for="intTotalDiscount">Discount:</label><span>
					<select id="intDiscountType" class="form-control">
						<option value="Rate">Rate(%)</option>
						<option value="Value">Value</option>					 
					</select>
				<input type="number" class="form-control" name="intTotalDiscount" id="intTotalDiscount"></span>
			</div>

			<div class="form-group col-xs-5" style="width: 357px;margin-left: 241px; padding-top: 18px;">
				<label for="intTotalDiscount">Sub Total:</label><span>
				<input type="number" class="form-control" name="intTotalDiscount" id="intSubTotalAfterDiscount" readonly></span>
			</div>

			<div class="form-group" style="width: auto;">
				<button class="btn" id="printInvoice">Generate Invoice</button></div>
			</div>
  		</form>
</div>
</body>
</html>
