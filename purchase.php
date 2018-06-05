<!DOCTYPE html>
<html>
<head>

<title>Bootstrap Example</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="row" style="margin:0; " id="topbar" >        
        <div class="col-lg-8 ">
            <ul>
                <li><a>Abdul Kaleem, Ponnur, Guntur </a></li>
                <li><a>abdulkaleem@gmail.com</a></li>
                <li><a>+91 7732021542</a></li>
            </ul>			
        </div> 
		<div class="col-lg-4 ">
			<div class="navback offset-md-5">
				<ul style="margin:0">
					<li ><a href="index.html">Home</a></li>
					<li><a>Customers</a></li>
				</ul>
			</div>			
        </div> 
    </div>   


<div id="ExistingCompany" class="tabcontent tab">
  <h3>Existing Company</h3>
  <p>You have already bought goods from this company</p>
</div>

<div id="NewCompany" class="tabcontent tab">
  <h3>New Company</h3>
  <p>This is the first time you are buying goods from this company</p> 
</div>

<button class="tablink" onclick="openCompany('ExistingCompany','ExistingCmp', this, 'orange')" >Existing Company</button>
<button class="tablink" onclick="openCompany('NewCompany','NewCmp', this, 'green')" id="defaultOpen">New Company</button>

<?php
	$conn=mysqli_connect("localhost","root","","kaleem");
	if(!$conn){
	die("connection faild: ". mysqli_connect_error);
	}		
?>	

<div class="bodystyle">
<div id="ExistingCmp" class="tabcontent" >	
<form id="form-valid " method="POST" class="borderline container "  action="post.php">	
<h5 style = "padding-top:10px;"></h5>
	<div class="row justify-content-center">
		<div class="form-group col-md-6">
			<label for="billno">Select Company Name:</label>
			<select name = "cust_name" id="cust_name" class="form-control" style="display:inline; width:250px;">
				<option disabled selected>Company Name</option>
				<?php								
					$result = mysqli_query($conn, 'SELECT DISTINCT Company_name FROM Company_info');
					if (mysqli_num_rows($result) > 0) {						
					while($row = mysqli_fetch_assoc($result)) {	
						echo '<option value="'.$row["Company_name"].'">'.$row["Company_name"].'</option>';										
						}								
					}
				?> 
			</select>	
			
		</div>						
	</div>


	</form>
</div>

<div id="NewCmp" class="tabcontent" style="color:black">
	<h5 style="padding-top:20px;">Company details</h4>
	<form id="form-valid " method="POST" class="  borderline container"  action="post.php">	
		<div class="row justify-content-center">
			<div class="form-group col-md-6">
				<div class="form-group col-md-12" style="margin:8px">
					<label for="name">Customer Name:</label>
					<input type="text" class="form-control" style="display:inline;" id="name" placeholder="Enter customer name" name="name" required>				
				</div>						
				<div class="form-group col-md-12" style="margin:8px">
					<label for="phone">Phone Number:&nbsp;&nbsp;</label>
					<input type="number" class="form-control" style="display:inline;" id="phone" placeholder="Enter phone number" name="phone" required>
				</div>
			</div>
			<div class="form-group col-md-6">
				<label for="addr">Address:</label>
				<textarea class="form-control form-rounded" rows="3" id="addr" placeholder="Enter customer address" name="addr" ></textarea>
				
			</div>			
		</div>
		
	</form>
</div>


	<h5 >Add Product details <i class="fa fa-plus-circle btn add-row" style="font-size:28px;color:blue"></i></h5>

	<div class="row">
		<div class="form-group col-md-6">
			<label for="billno">Bill Number:</label>
			<input type="text" style ="width:200px;display:inline;" class="form-control" id="billno" placeholder="Enter Bill No" name="billno">
		</div>
		<div class="form-group col-md-6 ">	
		<div class="float-right">
			<label for="date" >Date:</label>
			<input type="date" value="" style ="width:200px;display:inline;" class="form-control " id="date" name="date">
		</div>
		</div>
	</div>
	<div style="overflow-x:auto;">
			<table id="product_details" >
				<thead>
					<tr class="table-info">
						<th>Item Description</th>
						<th>HSN code</th>							
						<th>Mnf.Date</th>
						<th>Exp.Date</th>
						<th>Cases</th>
						<th>Units</th>
						<th>Rate</th>
						<th>Amount</th>
						<th>Disc. Amt</th>
						<th>CGST Amt</th>            
						<th>SGST Amt</th>            
						<th>Total Amt</th>            
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="Item_Description" contenteditable="true" required></td>
						<td class="HSN_code"  contenteditable="true"></td>
						<td class="Mnf.Date"><input type="date"  id="mnfdate" name="mnfdate" class="bordernone"></td>
						<td class="Exp.Date"><input type="date"  id="expdate" name="expdate" class="bordernone"></td>
						<td class="Cases"  contenteditable="true"></td>
						<td class="Units" contenteditable="true"></td>
						<td class="Rate" contenteditable="true"></td>
						<td class="Amount" ></td>
						<td class="Disc_Amt" contenteditable="true"></td>																							
						<td class="CGST_Amt" contenteditable="true"></td>
						<td class="SGST_Amt" contenteditable="true"></td>
						<td class="Total_Amt" ></td>
					</tr>
					<tr>
						<td class="Item_Description" contenteditable="true" required></td>
						<td class="HSN_code"  contenteditable="true"></td>
						<td class="Mnf.Date"><input type="date"  id="mnfdate" name="mnfdate" class="bordernone"></td>
						<td class="Exp.Date"><input type="date"  id="expdate" name="expdate" class="bordernone"></td>
						<td class="Cases"  contenteditable="true"></td>
						<td class="Units" contenteditable="true"></td>
						<td class="Rate" contenteditable="true"></td>
						<td class="Amount" ></td>
						<td class="Disc_Amt" contenteditable="true"></td>																							
						<td class="CGST_Amt" contenteditable="true"></td>
						<td class="SGST_Amt" contenteditable="true"></td>
						<td class="Total_Amt" ></td>
					</tr>
					<tr>
						<td class="Item_Description" contenteditable="true" required></td>
						<td class="HSN_code"  contenteditable="true"></td>
						<td class="Mnf.Date"><input type="date"  id="mnfdate" name="mnfdate" class="bordernone" ></td>
						<td class="Exp.Date"><input type="date"  id="expdate" name="expdate" class="bordernone"></td>
						<td class="Cases"  contenteditable="true"></td>
						<td class="Units" contenteditable="true"></td>
						<td class="Rate" contenteditable="true"></td>
						<td class="Amount" ></td>
						<td class="Disc_Amt" contenteditable="true"></td>																							
						<td class="CGST_Amt" contenteditable="true"></td>
						<td class="SGST_Amt" contenteditable="true"></td>
						<td class="Total_Amt" ></td>
					</tr>
				</tbody>
			</table>				
			<div class="d-flex justify-content-end  mb-3" style="font-size:18px;border: 1px solid #0f004c; border-top: none">
				<div class="p-2 " style="background-color:#bee5eb">Total : </div>
				<div class="p-2 " style="background-color:#ffeb00a8 ;width: 120px;" id="totalsum">0</div>
			</div>
			
		</div>
		<div class="row " >
			<div class="col-*-*" style="margin:0 auto; padding-top:30px;" >
				<button type="button" class="btn btn-outline-success update_details" >Submit</button>
				<button type="button" class="btn btn-outline-info cancel">Cancel</button>	
			</div>	
		</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
<script src="js/main.js"></script>
</body>
</html> 
