<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkalum.php");
	
	//FORM HANDLING
	
	//$_SESSION["batch"] = '2010-2014';
	//$_SESSION["branch"] = 'CSE';
	//$_SESSION["role"] = 'student';
	//$_SESSION["id"] = null;
		
if( isset($_POST['productid']) && !empty($_POST["productid"])  &&  isset($_POST['quantity']) && !empty($_POST["quantity"])&&  isset($_POST['price']) && !empty($_POST["price"])) 
	{
		$productid = $_POST['productid'];
		$quantity = $_POST["quantity"];
	$price = $_POST["price"];
		
		
		
		
		$del = mysqli_prepare($link,"UPDATE product SET quantity=? ,price=? WHERE productid=?");
		
		mysqli_stmt_bind_param($del, 'iis', $quantity,$price,$productid);
		mysqli_stmt_execute($del);
		
		mysqli_stmt_close($del);
		
	
	
	}


	if(isset($_POST['category']) && !empty($_POST["category"])&& isset($_POST['availability']) && !empty($_POST["availability"]))
	 { 
 
		$_SESSION["category"] = $_POST['category'];
		$_SESSION["availability"] = $_POST['availability'];
		
		
		//echo $_SESSION["category"];
		//echo $_SESSION["availability"];

		
	}
	
	if(isset($_POST['disp']) && !empty($_POST["disp"]))
	{
		$_SESSION["id"] = $_POST["disp"];
		//echo $_SESSION["id"];
		
	}

	

	if(isset($_POST['disp']) && !empty($_POST["disp"]))
	{
		$_SESSION["id"] = $_POST["disp"];
		//echo $_SESSION["id"];
		
	}

	

?>

<!-- HTML STARTS-->
<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      include('pcommon/meta.php');
      ?>
	  
	  
		
		
	  
  </head>

  <body>
 
		
		<div class="page-container" s>
			<?php include('pcommon/header.php'); ?>
				
				<div  style="float:left;position:relative;width:15%;  ">
					<?php include('pcommon/basealumini.php');?>
				</div>
	
				<div class="content">
				
					<!-- HTML STARTS-->
			<div style="background-color:#D3D5E2;  outline: 2px thick; padding:5px;
            	background: -moz-linear-gradient(#999 50%, #112 140%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(50%, #D3D5E2), color-stop(140%, #112));
  background: -webkit-linear-gradient(#999 50%, #112 140%);
  background: linear-gradient(#003d4d 60%, #00b8e6 120%, #00b8e6 60%, #00b8e6 120%); text-align:center">
			<h1 style="font-size:16px;color:white;font-family:Andika">EDIT PRODUCT INFO</h1>

			</div>		
					
			<div style="background-color:#D3D5E2; border-radius:1px; outline: 2px thick; padding:20px; height:590px;
            	border: 1px solid #aaa;
	 -moz-box-shadow: 1px 1px 3px #fff inset;
    -webkit-box-shadow: 1px 1px 3px #fff inset;
    box-shadow: 1px 1px 3px #fff inset;">
			
				
					<div class="register-form" style="float:left; width:48%;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="accountedit" onsubmit="return validateForm()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DETAILS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
					<?php
					
						$ret = mysqli_prepare($link,"SELECT productname,productid,price,quantity,availability,category FROM product   WHERE productid = ? ");
						mysqli_stmt_bind_param($ret, 's', $_SESSION['id']);
						mysqli_stmt_execute($ret);
						mysqli_stmt_bind_result($ret, $productname,$productid,$price,$quantity,$availability,$category);
						mysqli_stmt_fetch($ret);
						
						
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>productname :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$productname.'</i>';
						echo '</p>';
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>productid :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$productid.'</i>';
						echo '</p>';
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>price :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$price.'</i>';
						echo '</p>';
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>quantity :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$quantity.'</i>';
						echo '</p>';
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>availability :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$availability.'</i>';
						echo '</p>';
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>category :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$category.'</i>';
						echo '</p>';


					
					/*	$ret = mysqli_prepare($link,"INSERT productname,productid,price,quantity,availability,category FROM product where productid = ? ");
						mysqli_stmt_bind_param($ret, 's', $_SESSION['id']);
						mysqli_stmt_execute($ret);
						mysqli_stmt_bind_result($ret, $productname,$productid,$price,$quantity,$availability,$category);
						mysqli_stmt_fetch($ret);
						
						
						mysqli_stmt_close($ret);
						*/
					
					
						
						mysqli_stmt_close($ret);
					
					?>
					
					
 				</fieldset>
			</form>
            </div>
			
			
			
				<div class="register-form" style="float:left; width:47%; padding-left:40px;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="accountedit" onsubmit="return validateForm()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FILTER PRODUCTS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
						
					
					
					<p style="font-weight:700;padding:5px;">
                    <label>Category : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					
					<select name="category" width="200px">
						
						<option value="grocery">grocery</option>
						<option value="fragrance">fragrance</option>
						<option value="cleaning">cleaning</option>
						<option value="eatables">eatables</option>
						<option value="softdrinks">softdrinks</option>
						<option value="vegetables">vegetables</option>
						<option value="fruits">fruits</option>
						
						
					</select> 
					</p>
					
					<p style="font-weight:700;padding:5px;">
                    <label>availability : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					
					<select name="availability" width="200px">
						<option value="instock">In Stock</option>
					<option value="outofstock">Out of Stock</option>
					</select> 
					</p>
					
					
					
					
					
 				</fieldset>
                <fieldset class="fieldsetbtn">
					<input class="btn register" type="submit" name="submit" value="FILTER" />
				</fieldset>

			</form>
            </div>
			
			<div class="register-form" style="float:left; width:100%;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="accountedit" onsubmit="return validateForm()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CHOOSE PRODUCTS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
					
					<p style="font-weight:700;padding:5px;">
                    <label>DETAILS : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					
					<select name="disp" style="width:600px;">
						<?php
						
						$ret = mysqli_prepare($link,"SELECT productid, productname,category  FROM product WHERE  category=? AND availability=? ");
						mysqli_stmt_bind_param($ret, 'ss', $_SESSION['category'],$_SESSION['availability']);
						mysqli_stmt_execute($ret);
						mysqli_stmt_bind_result($ret, $productid,$productname,$category);
			
			
						while( mysqli_stmt_fetch($ret)){
						echo
							'<option value="'.$productid.'">'.$productid .' ---- '.$productname.' ---- '.$category.'</option>';
							
						}
		  
						mysqli_stmt_close($ret);
		  
						?>	
						
					</select> 
					</p>
					
					
					
					
					
 				</fieldset>
                <fieldset class="fieldsetbtn">
					<input class="btn register" type="submit" name="submit" value="DISPLAY" />
				</fieldset>

				
			</form>
            </div>
			
			
			
			
<!--
		<div style="background-color:#EEE; border-radius:1px; outline: 2px thick; padding:20px;
        border: 1px solid #aaa;
	 -moz-box-shadow: 1px 1px 3px #fff inset;
    -webkit-box-shadow: 1px 1px 3px #fff inset;
    box-shadow: 1px 1px 3px #fff inset;">
		
			<table class="gradienttable" style="margin:0 auto; padding:5px; width:100%;" >
				
					<tr>
						<th>NAME</th>
						<th>BATCH</th>
						<th>BRANCH</th>
					</tr>
				
				
				<?php
		
			//echo $_SESSION['role'];
			$disp = mysqli_prepare($link,"SELECT * FROM info WHERE role=? AND batch=? AND branch=? ");
			mysqli_stmt_bind_param($disp, 'sss', $_SESSION['role'],$_SESSION['batch'],$_SESSION['branch']);
			mysqli_stmt_execute($disp);
			mysqli_stmt_bind_result($disp, $username,$password,$faculty_id,$role,$name,$batch,$branch);
			
			
          while( mysqli_stmt_fetch($disp)){
            echo
            '<tr>
              <td>'.$name.'</td>
              <td>'.$batch.'</td>			  
              <td>'.$branch.'</td>			  
            </tr>';
          }
		  
			mysqli_stmt_close($disp);
		  
        ?>	
		
    </table>
</div>					
					-->
                    
                    
					<div class="register-form" style="float:left; width:47%; padding-left:40px;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="accountedit" onsubmit="return validateForm()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EDIT DETAILS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
					
					<?php
					
					//	$ret = mysqli_prepare($link,"SELECT productid, quantity FROM student WHERE faculty_id = ? ");
					//	mysqli_stmt_bind_param($ret, 's', $_SESSION["fkey"]);
					//	mysqli_stmt_execute($ret);
					//	mysqli_stmt_bind_result($ret, $productid,$quantity);
					//	mysqli_stmt_fetch($ret);
					
					
				echo '<p style="font-weight:700;">';
					echo'<label>Product Id. : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>';
					echo'<input type="text" name="productid" placeholder="'.$productid.'" autofocus /><br/>';
				echo'</p>';
				echo'<br/>';
				echo'<p style="font-weight:700;">';
					echo'<label>Quantity : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>';
					echo'<input type="text" name="quantity" placeholder="'.$quantity.'" autofocus /><br/>';
				echo'</p>';
				echo'<br/>';	
					echo '<p style="font-weight:700;">';
					echo'<label>Price : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>';
					echo'<input type="text" name="price" placeholder="'.$price.'" autofocus /><br/>';
				echo'</p>';
				echo'<br/>';	
				
			
					
				
				
				
					//mysqli_stmt_close($ret);
					
					/*$ret = mysqli_prepare($link,"SELECT status FROM alumini WHERE faculty_id = ? ");
						mysqli_stmt_bind_param($ret, 's', $_SESSION["fkey"]);
						mysqli_stmt_execute($ret);
						mysqli_stmt_bind_result($ret, $status);
						mysqli_stmt_fetch($ret);
					
					echo'<p style="font-weight:700;">';
					echo'<label>Status : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>';
					echo'<input type="text" name="status" placeholder="'.$status.'" autofocus /><br/>';
					echo'</p>';
				
					mysqli_stmt_close($ret);
					*/
					
					?>
					
					
 				</fieldset>
                <fieldset class="fieldsetbtn">
					<input class="btn register" type="submit" name="submit" value="UPDATE" />
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