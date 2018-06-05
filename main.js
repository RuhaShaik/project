$(document).ready(function(){
	document.getElementById("date").valueAsDate = new Date();
	var d = new Date();
    var n = d.getDate();
    var n1 = d.getMonth()+1;
    var n2 = d.getFullYear().toString().substring(2);    
    var n3 = d.getHours();
    var n4 = d.getMinutes();        
    document.getElementById("billno").value = n2+n1+n+n3+n4;
	console.log(n2+n1+n+n3+n4);	
	
});


function openCompany(companyName,companyName1,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(companyName).style.display = "block";
    document.getElementById(companyName1).style.display = "block";
    elmnt.style.backgroundColor = color;

}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

//append new rows
$(".add-row").on("click",function(){
    var new_row='<tr>\
	<td class="Item_Description" contenteditable="true"></td>\
	<td class="HSN_code"  contenteditable="true"></td>\
	<td class="Mnf.Date"><input type="date"  id="mnfdate" name="mnfdate" class="bordernone"></td>\
	<td class="Exp.Date"><input type="date"  id="expdate" name="expdate" class="bordernone"></td>\
	<td class="Cases" contenteditable="true"></td>\
	<td class="Units" contenteditable="true"></td>\
	<td class="Rate" contenteditable="true"></td>\
	<td class="Amount" ></td>\
	<td class="Disc_Amt" contenteditable="true" ></td>\
	<td class="CGST_Amt" ></td>\
	<td class="SGST_Amt" ></td>\
	<td class="Total_Amt" ></td>\
	</tr>';            
	$("#product_details").append(new_row);	
});



//key only numbers 
$( "#product_details" ).on( "keydown", ".HSN_code,.Units,.Rate,.TaxbleValue,.Disc_Amt,.Cases,.CGST_Amt,.SGST_Amt", function(e) {	
	if (e.shiftKey || e.ctrlKey || e.altKey ) {
		e.preventDefault(); 				
	}
	else {
		key = e.keyCode;
		//console.log(key);
		if (!((key == 8)||(key == 9)||(key == 116)||(key == 46)||(key == 110)||(key == 190)||(key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
			e.preventDefault();   
		}
	}
});



//mul of units and rates to totals	
function mul(rowIndex,x,temp) { 
	if(temp==1)
		var y=$('tr').find('.Units').eq(rowIndex).text();
	else if(temp==0)
		var y=$('tr').find('.Rate').eq(rowIndex).text();	
	else
		var y=$('tr').find('.Cases').eq(rowIndex).text();	
	if(x!=0 && y!=0)
	{
		var res= (parseFloat(x)*parseFloat(y)).toFixed(2);
		$('tr ').find('.Amount').eq(rowIndex).text(res);
		$('tr ').find('.TaxbleValue').eq(rowIndex).text(res);		
		var cgst=(res*(9/100)).toFixed(2);		
		$('tr ').find('.CGST_Amt').eq(rowIndex).text(cgst);
		$('tr ').find('.SGST_Amt').eq(rowIndex).text(cgst);
		var total= parseFloat($('tr ').find('.TaxbleValue').eq(rowIndex).text())+(2*cgst);
		var disc_amt= $('tr ').find('.Disc_Amt').eq(rowIndex).text();		
		if(disc_amt!=""){
			total=total-parseFloat(disc_amt);
		}		
		if(!(isNaN(total)))
		$('tr ').find('.Total_Amt').eq(rowIndex).text(total.toFixed(2));		
	}
}

//get rate value 
$( "#product_details" ).on( "focusout", ".Rate", function(e) {
	var rowIndex = $(this).parent().index();    
	var x = $( this ).text();
	var temp=1;
	mul(rowIndex,x,temp);
});

//get unit value
$( "#product_details" ).on( "focusout", ".Units", function() {	
	var rowIndex = $(this).parent().index();    	
	var x = $( this ).text();
	var temp=0;
	mul(rowIndex,x,temp);
});

//get Cases value
$( "#product_details" ).on( "focusout", ".Cases", function() {	
	var rowIndex = $(this).parent().index();    	
	var cases = $( this ).text();
	var temp=2;
	mul(rowIndex,x,temp);
});

