<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkadmin.php");
	
	//FORM HANDLING
	if(isset($_POST['productname']) && !empty($_POST["productname"]) && isset($_POST['productid']) && !empty($_POST["productid"])
		&& isset($_POST['quantity']) && !empty($_POST["quantity"]) && isset($_POST['price']) && !empty($_POST["price"]) && isset($_POST['category']) && !empty($_POST["category"]))
	
	 { 
		$productname = $_POST['productname'];
		$productid = $_POST['productid'];
		$quantity = $_POST['quantity'];
		$availability = $_POST['availability'];
		$price = $_POST['price'];
		$category = $_POST['category'];
		$faculty_id= $_SESSION['fkey'];
		$null = null;
		
		$stmt = mysqli_prepare($link,"INSERT INTO product VALUES(?,?,?,?,?,?)");
		mysqli_stmt_bind_param($stmt, 'ssssss', $productname, $productid, $quantity, $availability, $price, $category);
		mysqli_stmt_execute($stmt);
		
		mysqli_stmt_close($stmt);
		

		date_default_timezone_set('Asia/Calcutta'); // CDT
//print date('Y-m-d  H:i:s');
$current_date = date('Y-m-d');

	
		$null = null;
		$rating=$null;
		$prodesc=$null;

		
		$stmt = mysqli_prepare($link,"INSERT INTO  profeed VALUES(?,?,?,?,?)");
		mysqli_stmt_bind_param($stmt, 'sssis', $productname, $prodesc, $current_date, $rating,$faculty_id);
		mysqli_stmt_execute($stmt);
		
		mysqli_stmt_close($stmt);




$stmt = mysqli_prepare($link,"INSERT INTO pro VALUES(?,?,?)");
		mysqli_stmt_bind_param($stmt, 'sss',  $productid, $quantity,  $price);
		mysqli_stmt_execute($stmt);
		
		mysqli_stmt_close($stmt);




		/*
		$stmt = mysqli_prepare($link,"INSERT INTO student VALUES(?,?,?,?)");
		mysqli_stmt_bind_param($stmt, 'ssss', $facultyid,$null,$null,$null);
		mysqli_stmt_execute($stmt);
		
		mysqli_stmt_close($stmt);
	
	
		$stmt = mysqli_prepare($link,"INSERT INTO alumini VALUES(?,?)");
		mysqli_stmt_bind_param($stmt, 'ss', $facultyid,$null);
		mysqli_stmt_execute($stmt);
		
		mysqli_stmt_close($stmt);
		*/
	
	}


if(isset($_POST['faciddel2']) && !empty($_POST["faciddel2"]))
	{
		$courseiddel = $_POST['faciddel2'];
		
		$del = mysqli_prepare($link,"DELETE FROM product WHERE productid=? ");
		mysqli_stmt_bind_param($del, 's', $courseiddel);
		mysqli_stmt_execute($del);
		
		mysqli_stmt_close($del);
	
	}
	

?>

<!-- HTML STARTS-->
<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      include('pcommon/meta.php');
      ?>
	  
	  	<!-- JAVASCRIPTS-->
		<script>
			function validateForm() {
				var x = document.forms["accountedit"]["username"].value;
				var y = document.forms["accountedit"]["password"].value;
				var z = document.forms["accountedit"]["name"].value;
				var a = document.forms["accountedit"]["faculty_id"].value;
				
				if((y==null || y=="") || (a==null || a=="") || (x==null || x=="") || (z==null || z=="")){
					alert("Fields are Empty!");
				}
				
			}
		</script>
		<script>
			function validateFormDel() {
				var x = document.forms["accountdel"]["faciddel"].value;
				
				
				if((x==null || x=="")){
					alert("Fields are Empty!");
				}
				
			}
		</script>
		<script>
			function validateFormDel2() {
				var x = document.forms["accountdel"]["faciddel2"].value;
				
				
				if((x==null || x=="")){
					alert("Fields are Empty!");
				}
				
			}
		</script>
		<script>
			function validateFormChange() {
				var x = document.forms["changepass"]["newpass"].value;
				
				
				if((x==null || x=="")){
					alert("Fields are Empty!");
				}
				
			}
		</script>
	  
  </head>

  <body>
 
		
		<div class="page-container" s>
			<?php include('pcommon/header.php'); ?>
				
				<div  style="float:left;position:relative;width:15%;  ">
					<?php include('pcommon/baseadmin.php');?>
				</div>
	
				<div class="content">

									<!-- HTML STARTS-->
			<div style="background-color:#D3D5E2;  outline: 2px thick; padding:5px;
            	background: -moz-linear-gradient(#999 50%, #112 140%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(50%, #D3D5E2), color-stop(140%, #112));
  background: -webkit-linear-gradient(#999 50%, #112 140%);
  background: linear-gradient(#003d4d 60%, #00b8e6 120%, #00b8e6 60%, #00b8e6 120%); text-align:center">
			<h1 style="font-size:16px;color:white;font-family:Andika">ADD NEW PRODUCT</h1>

			</div>		
					
			<div style="background-color:#00b8e6; border-radius:1px; outline: 2px thick; padding:20px; height:auto;
            	border: 1px solid #003d4d;
	 -moz-box-shadow: 1px 1px 3px #003d4d inset;
    -webkit-box-shadow: 1px 1px 3px #003d4d inset;
    box-shadow: 1px 1px 3px #003d4d inset;">
		
			

<div class="register-form" style="float:left; width:46%;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="accountedit" onsubmit="return validateForm()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add a new Product&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					<p style="font-weight:700;padding:5px;">
					<label>Product name :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="productname" placeholder="Productname" autofocus /><br/>
					</p>
                    <p style="font-weight:700;padding:5px;">
                    <label>Product Id :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="productid" placeholder="Product Id" autofocus /><br />
					</p>
					<p style="font-weight:700;padding:5px;">
                    <label>Quantity in Stock :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="quantity" placeholder="no. of stocks available" autofocus /><br />
					</p>
					
					<p style="font-weight:700;padding:5px;">
                    <label>Availability : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					
					<select name="availability">
						<option value="instock">InStock</option>
						<option value="outofstock">OutofStock</option>
					</select> 
					</p>
					
					<p style="font-weight:700;padding:5px;">
                    <label>Price :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="price" placeholder="Price" autofocus /><br />
					</p>

					<p style="font-weight:700;padding:5px;">
                    <label>Category :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="category" placeholder="Product category" autofocus /><br />
					</p>
					
					
					
					
 				</fieldset>
                <fieldset class="fieldsetbtn">
					<input class="btn register" type="submit" name="submit" value="INSERT" />
				</fieldset>
			</form>
            </div>
			<div class="register-form" style="float:left; width:48%; padding-left:40px;">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="accountdel" onsubmit="return validateFormDel2()">
            
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Delete Details&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
				<p style="font-weight:700;">
					<label>Product Id : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="faciddel2" placeholder="Product ID" autofocus /><br/>
				</p>
				</fieldset>
				<fieldset class="fieldsetbtn">
				<input class="btn register" type="submit" name="faciddelbtn" value="DELETE" />
				</fieldset>
				
			</form>
			
			
			</div>
			                

		
                    
					
					<!-- HTML ENDS-->
	
		
				</div>
			



	
		</div>
	
		<div style="float:left;width:100%;">
		<?php
			include('pcommon/footer.php');
		?>
		</div>

  </body>
</html>
