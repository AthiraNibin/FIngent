$(document).ready(function(){
  var intTotalWithoutTax = 0;
	var dblSubTotalWithTax = 0;
  var intRowCount = 0;
  //to get the current date and display in the date field
  var datCurrentDate = new Date();
  var intCurrentDay = String(datCurrentDate.getDate()).padStart(2, '0');
  var intCurrentMonth = String(datCurrentDate.getMonth() + 1).padStart(2, '0'); //January is 0!
  var intCurrentYear = datCurrentDate.getFullYear();
  datCurrentDate = intCurrentMonth + '/' + intCurrentDay + '/' + intCurrentYear;
  //to assign current date in date field
  $("#datDate").text(datCurrentDate);


  //on clicking on the add button
  $('.addBtn').on('click',function(e){
    	e.preventDefault();
		  $("#invoiceItemSum tr").remove();
    	var txtName=$('#txtName').val();
    	var intUnitPrice = $("#dblUnitPrice").val();
    	var intQuantity = $("#intQuantity").val();
    	var intTax = $("#intTax").val();
    	var dblTotal = intQuantity * intUnitPrice;
    	var dblTotalWithTax = dblTotal + ((dblTotal*intTax)/100);
		   intRowCount = $('#invoiceItems tr').length;
		  intTotalWithoutTax = intTotalWithoutTax + dblTotal;
		  dblSubTotalWithTax = dblSubTotalWithTax + dblTotalWithTax;
		  if(txtName!='' && intUnitPrice!='' && intQuantity!='')	{
		    $('#invoiceItems tbody').append('<tr class="child"><td>'+intRowCount+'</td><td>'+txtName+'</td><td>'+intUnitPrice+'</td><td>'+intQuantity+'</td><td>'+intTax+'</td><td>'+dblTotal+'</td></tr>');
		    $("#invoiceItemSum tbody").append('<tr class="child"><td colspan="5" align="right">Subtotal without Tax</td><td>'+intTotalWithoutTax+'</td></tr>');
				$("#invoiceItemSum tbody").append('<tr class="child"><td colspan="5" align="right">Subtotal with Tax</td><td>'+dblSubTotalWithTax+'</td></tr>');
		    $("#intSubTotalAfterDiscount").val(dblSubTotalWithTax);
	    }
  });


  //blur function after giving the discount value
  $("#intTotalDiscount").blur(function(){
    var intDiscountType = $("#intDiscountType").val();
    var intDiscontValue = $("#intTotalDiscount").val();
    if(intDiscountType == "Rate")	{
    	dblSubTotalWithTax = dblSubTotalWithTax - ((dblSubTotalWithTax*intDiscontValue)/100);
    }	
    else {
			dblSubTotalWithTax = dblSubTotalWithTax - intDiscontValue;
    }	
    $("#intSubTotalAfterDiscount").val(dblSubTotalWithTax);
  });


  //clicking generate invoice button
 	$("#printInvoice").on('click',function(e){
    e.preventDefault();
   if(intRowCount > 0)  {
      var toPrintInvocieMainDetails=document.getElementById('invoiceDetails');
      var toPrintInvoiceItemDetails=document.getElementById('invoiceItemDetails');
      var toPrintinvoiceSumDetails=document.getElementById('invoiceSumDetails');
      var toPrintInvoiceDiscountDetails=document.getElementById('invoiceDiscountDetails');
      var newWindow=window.open('','Print-Window');
      newWindow.document.open();
      newWindow.document.write('<html><body onload="window.print()">'+toPrintInvocieMainDetails.innerHTML+'</body></html>');
      newWindow.document.write('<html><body onload="window.print()">'+toPrintInvoiceItemDetails.innerHTML+'</body></html>');
      newWindow.document.write('<html><body onload="window.print()">'+toPrintinvoiceSumDetails.innerHTML+'</body></html>');
      newWindow.document.write('<html><body onload="window.print()">'+toPrintInvoiceDiscountDetails.innerHTML+'</body></html>');
      newWindow.document.close();
    }
 	});


  //on clicking on reset button
  function resetForm() {
    var intTotalWithoutTax = 0;
    var dblSubTotalWithTax = 0;
    var intRowCount = 0;
    document.getElementById("frmInvoieDetails").reset();
    document.getElementById("invoiceItems").reset();
  }


});

