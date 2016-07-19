<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkadmin.php");
	
	//FORM HANDLING
	
	if(isset($_POST['username']) && !empty($_POST["username"]) && isset($_POST['password']) && !empty($_POST["password"])
		&& isset($_POST['name']) && !empty($_POST["name"]) && isset($_POST['facultyid']) && !empty($_POST["facultyid"])
	&& isset($_POST['batch']) && !empty($_POST["batch"])&& isset($_POST['branch']) && !empty($_POST["branch"]))
	 { 
		$password = $_POST['username'];
		$username = $_POST['password'];
		$name = $_POST['name'];
		$role = $_POST['role'];
		$facultyid = $_POST['facultyid'];
		$batch = $_POST['batch'];
		$branch = $_POST['branch'];
		$age = $_POST['age'];
		$city = $_POST['city'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$address1 = $_POST['address1'];
		$addresss2 = $_POST['address2'];
		$null = null;
		
		$stmt = mysqli_prepare($link,"INSERT INTO info VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
		mysqli_stmt_bind_param($stmt, 'sssssssssssss', $password, $username, $facultyid, $role, $name, $batch, $branch,$age,$city,$email,$contact,$address1,$address2);
		mysqli_stmt_execute($stmt);
		
		mysqli_stmt_close($stmt);


$stmt = mysqli_prepare($link,"INSERT INTO student VALUES(?,?,?,?)");
		mysqli_stmt_bind_param($stmt, 'ssss', $facultyid, $age,$email,$contact);
		mysqli_stmt_execute($stmt);
		
		mysqli_stmt_close($stmt);


		
		/*$stmt = mysqli_prepare($link,"INSERT INTO student VALUES(?,?,?,?)");
		mysqli_stmt_bind_param($stmt, 'ssss', $facultyid,$null,$null,$null);
		mysqli_stmt_execute($stmt);
		
		mysqli_stmt_close($stmt);
	
	
		$stmt = mysqli_prepare($link,"INSERT INTO alumini VALUES(?,?)");
		mysqli_stmt_bind_param($stmt, 'ss', $facultyid,$null);
		mysqli_stmt_execute($stmt);
		
		mysqli_stmt_close($stmt);
		*/
	
	}

	if(isset($_POST['productname']) && !empty($_POST["productname"]) && isset($_POST['productid']) && !empty($_POST["productid"])
		&& isset($_POST['quantity']) && !empty($_POST["quantity"]) && isset($_POST['price']) && !empty($_POST["price"]) && isset($_POST['category']) && !empty($_POST["category"]))
	
	 { 
		$productname = $_POST['productname'];
		$productid = $_POST['productid'];
		$quantity = $_POST['quantity'];
		$availability = $_POST['availability'];
		$price = $_POST['price'];
		$category = $_POST['category'];
		//$null = null;
		
		$stmt = mysqli_prepare($link,"INSERT INTO product VALUES(?,?,?,?,?,?)");
		mysqli_stmt_bind_param($stmt, 'ssssss', $productname, $productid, $quantity, $availability, $price, $category);
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



	
	if(isset($_POST['faciddel']) && !empty($_POST["faciddel"]))
	{
		$courseiddel = $_POST['faciddel'];
		
		$del = mysqli_prepare($link,"DELETE FROM info WHERE faculty_id=? AND role!='admin' ");
		mysqli_stmt_bind_param($del, 's', $courseiddel);
		mysqli_stmt_execute($del);
		
		mysqli_stmt_close($del);
	
	}

	if(isset($_POST['faciddel2']) && !empty($_POST["faciddel2"]))
	{
		$courseiddel = $_POST['faciddel2'];
		
		$del = mysqli_prepare($link,"DELETE FROM product WHERE productid=? ");
		mysqli_stmt_bind_param($del, 's', $courseiddel);
		mysqli_stmt_execute($del);
		
		mysqli_stmt_close($del);
	
	}
	
	
	if(isset($_POST['newpass']) && !empty($_POST["newpass"]))
	{
		$newpass = $_POST['newpass'];
		$facid = $_SESSION["ukey"];
		
		$del = mysqli_prepare($link,"UPDATE info SET password=? WHERE username=?");
		mysqli_stmt_bind_param($del, 'ss', $newpass,$facid);
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
			<h1 style="font-size:16px;color:white;font-family:Andika">Manage Accounts</h1>

			</div>			
					
			<div style="background-color:#00b8e6; border-radius:1px; outline: 2px thick; padding:20px; height:auto;
            	border: 1px solid #003d4d;
	 -moz-box-shadow: 1px 1px 3px #003d4d inset;
    -webkit-box-shadow: 1px 1px 3px #003d4d inset;
    box-shadow: 1px 1px 3px #003d4d inset;">
		
			
				<div class="register-form" style="float:left; width:46%;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="accountedit" onsubmit="return validateForm()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add a new Customer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					<p style="font-weight:700;padding:5px;">
					<label>Customer Username :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="username" placeholder="Username" autofocus /><br/>
					</p>
                    <p style="font-weight:700;padding:5px;">
                    <label>Password :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="password" placeholder="Password" autofocus /><br />
					</p>
					<p style="font-weight:700;padding:5px;">
                    <label>Name :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="name" placeholder="Name" autofocus /><br />
					</p>
					
					<p style="font-weight:700;padding:5px;">
                    <label>Role : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					
					<select name="role">
						<option value="admin">Admin</option>
						<option value="student">User</option>
						<option value="alumini">Merchant</option>
					</select> 
					</p>
					
					<p style="font-weight:700;padding:5px;">
                    <label>User Id :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="facultyid" placeholder="User ID" autofocus /><br />
					</p>
					
					<p style="font-weight:700;padding:5px;">
                    <label>Gender : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					
					<select name="batch">
						<option value="-">-</option>
						<option value="male">male</option>
						<option value="female">female</option>

						</select> 
					</p>

					<p style="font-weight:700;padding:5px;">
                    <label>state : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					
					<select name="branch" width="200px">
						<option value="goa">Goa</option>
						<option value="kerala">Kerala</option>
						<option value="delhi">Delhi</option>
						<option value="rajasthan">Rajasthan</option>
						<option value="maharashtra">Maharashtra</option>
						<option value="uttarpradesh">Uttar Pradesh</option>
						<option value="bihar">Bihar</option>
						<option value="karnataka">Karnataka</option>
						<option value="telangana">Telangana</option>
						<option value="madhyapradesh">Madhya Pradesh</option>
						<option value="assam">Assam</option>
						<option value="westbengal">West Bengal</option>
						<option value="andhrapradesh">Andhra Pradesh</option>
						<option value="haryana">Haryana</option>
						<option value="uttarkhand">Uttarkhand</option>
						<option value="himachalpradesh">Himachal Pradesh</option>
						<option value="jharkand">Jharkand</option>
						<option value="sikkim">Sikkim</option>
						<option value="arunachalpradesh">Arunachal Pradesh</option>
						<option value="chattisgarh">Chattisgarh</option>
						<option value="meghalaya">Meghalaya</option>
						<option value="tamilnadu">Tamil Nadu</option>
						<option value="gujarat">Gujarat</option>
						<option value="jammuandkashmir">Jammu and Kashmir</option>
						<option value="orissa">Odisha</option>
						<option value="manipur">Manipur</option>
						<option value="nagaland">Nagaland</option>
						<option value="tripura">Tripura</option>
						<option value="mizoram">Mizoram</option>
						<option value="pondicherry">Pondicherry</option>
						<option value="punjab">Punjab</option>
						<option value="andamanandnicobarislands">Andaman and Nicobar Islands</option>
						<option value="damananddiu">Daman and Diu</option>
						<option value="dadraandnagarhaveli">Dadra and Nagarhaveli</option>
						<option value="lakshadweep">Lakshadweep</option>

					</select> 
					</p>
					
					<p style="font-weight:700;padding:5px;">
                    <label>City :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="city" placeholder="City" autofocus /><br />
					</p>
					
					<p style="font-weight:700;padding:5px;">
                    <label>Age :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="age" placeholder="Age" augeofocus /><br />
					</p>
					
					<p style="font-weight:700;padding:5px;">
                    <label>Email :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="email" placeholder="Email" autofocus /><br />
					</p>

					<p style="font-weight:700;padding:5px;">
                    <label>Contact No.:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="contact" placeholder="Contact No." autofocus /><br />
					</p>
					

					<p style="font-weight:700;padding:5px;">
                    <label>Address Line 1 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="address1" placeholder="Address Line 1" autofocus /><br />
					</p>

					<p style="font-weight:700;padding:5px;">
                    <label>Address Line 2:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="address2" placeholder="Address Line 2" autofocus /><br />
					</p>



					
 				</fieldset>
                <fieldset class="fieldsetbtn">
					<input class="btn register" type="submit" name="submit" value="INSERT" />
				</fieldset>
			</form>
            </div>
			<div class="register-form" style="float:left; width:48%; padding-left:40px;">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="accountdel" onsubmit="return validateFormDel()">
            
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Delete Details&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
				<p style="font-weight:700;">
					<label>User Id : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="faciddel" placeholder="User ID" autofocus /><br/>
				</p>
				</fieldset>
				<fieldset class="fieldsetbtn">
				<input class="btn register" type="submit" name="faciddelbtn" value="DELETE" />
				</fieldset>
				
			</form>
			
			
			</div>

			
			<div class="register-form" style="float:left; width:48%; padding-left:40px;">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="changepass" onsubmit="return validateFormChange()">
            
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Change Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
				<p style="font-weight:700;">
					<label>New Password : &nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="newpass" placeholder="New Password" autofocus /><br/>
				</p>
				</fieldset>
				<fieldset class="fieldsetbtn">
				<input class="btn register" type="submit" name="faciddelbtn" value="CHANGE" />
				</fieldset>
				
			</form>
			
			
			</div>
			
			
			</div>
			
			




		<div style="background-color:#00b8e6; border-radius:1px; outline: 2px thick; padding:20px; height:auto;
            	border: 1px solid #003d4d;
	 -moz-box-shadow: 1px 1px 3px #003d4d inset;
    -webkit-box-shadow: 1px 1px 3px #003d4d inset;
    box-shadow: 1px 1px 3px #003d4d inset;">
		
			<table class="gradienttable" style="margin:0 auto; padding:5px; width:100%;" >
				
					<tr>
						<th>CUSTOMER USERNAME</th>
						<th>PASSWORD</th>
						<th>NAME</th>
						<th>ROLE</th>
						<th>USER ID</th>
						<th>GENDER</th>
						<th>STATE</th>
						<th>AGE</th>
						<th>CITY</th>
						<th>EMAIL</th>
						<th>CONTACT NO.</th>
						<th>ADDRESS LINE 1</th>
						<th>ADDRESS LINE 2</th>
						
					</tr>
				
				
				<?php
		
			
			$disp = mysqli_prepare($link,"SELECT * FROM info;");
	
			mysqli_stmt_execute($disp);
			mysqli_stmt_bind_result($disp, $username,$password,$faculty_id,$role,$name,$batch,$branch,$age,$city,$email,$contact,$address1,$address2);
			
			
          while( mysqli_stmt_fetch($disp)){
            echo
            '<tr>
              <td>'.$username.'</td>
              <td>'.$password.'</td>
              <td>'.$faculty_id.'</td>
               <td>'.$role.'</td>
              <td>'.$name.'</td>
			  <td>'.$batch.'</td>			  
              <td>'.$branch.'</td>	
              <td>'.$age.'</td>	
              <td>'.$city.'</td>	
              <td>'.$email.'</td>			  
              <td>'.$contact.'</td>	
              <td>'.$address1.'</td>	
              <td>'.$address2.'</td>	

            </tr>';
          }
		  
			mysqli_stmt_close($disp);
		  
        ?>	
		
    </table>
</div>					
		



<div class="register-form" style="float:left; width:46%;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="accountedit" onsubmit="return validateForm()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add a new Product&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					<p style="font-weight:700;padding:5px;">
					<label>Product name :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="productname" placeholder="Productname" autofocus /><br/>
					</p>
                    <p style="font-weight:700;padding:5px;">
                    <label>Product Id :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="productid" placeholder="Product Id" autofocus /><br />
					</p>
					<p style="font-weight:700;padding:5px;">
                    <label>Quantity in Stock :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="quantity" placeholder="no. of stocks available" autofocus /><br />
					</p>
					
					<p style="font-weight:700;padding:5px;">
                    <label>Availability : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					
					<select name="availability">
						<option value="instock">InStock</option>
						<option value="outofstock">OutofStock</option>
					</select> 
					</p>
					
					<p style="font-weight:700;padding:5px;">
                    <label>Price :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="price" placeholder="Price" autofocus /><br />
					</p>

					<p style="font-weight:700;padding:5px;">
                    <label>Category :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
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




                   

		<div style="background-color:#00b8e6; border-radius:1px; outline: 2px thick; padding:20px; height:auto;
            	border: 1px solid #003d4d;
	 -moz-box-shadow: 1px 1px 3px #003d4d inset;
    -webkit-box-shadow: 1px 1px 3px #003d4d inset;
    box-shadow: 1px 1px 3px #003d4d inset;">
		
			<table class="gradienttable" style="margin:0 auto; padding:5px; width:100%;" >
				
					<tr>
						<th>PRODUCT NAME</th>
						<th>PRODUCT ID</th>
						<th>QUANTITY</th>
						<th>AVAILABILITY</th>
						<th>PRICE</th>
						<th>CATEGORY</th>
						
					</tr>
				
				
				<?php
		
			
			$disp = mysqli_prepare($link,"SELECT * FROM product;");
	
			mysqli_stmt_execute($disp);
			mysqli_stmt_bind_result($disp, $productname,$productid,$quantity,$availability,$price,$category);
			
			
          while( mysqli_stmt_fetch($disp)){
            echo
            '<tr>
              <td>'.$productname.'</td>
              <td>'.$productid.'</td>
              <td>'.$quantity.'</td>
              <td>'.$availability.'</td>
              <td>'.$price.'</td>
              <td>'.$category.'</td>

			 			  
            </tr>';
          }
		  
			mysqli_stmt_close($disp);
		  
        ?>	
		
    </table>
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