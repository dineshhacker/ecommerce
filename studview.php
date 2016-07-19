<?php	
	
	session_start();
		$total="";
	include("pscripts/connect.php");
	include("pscripts/checkstud.php");

	//FORM HANDLING
	
	//$_SESSION["category"] = '2010-2014';
	//$_SESSION["availability"] = 'CSE';
	//$_SESSION["role"] = 'student';
	
	
	/*if (isset($_POST['productid']) && !empty($_POST["productid"])  && isset($_POST['quantity']) && !empty($_POST["quantity"])&& isset($_POST['faculty_id']) && !empty($_POST["faculty_id"]))  
	{
		$productid = $_POST['productid'];
		$quantity = $_POST["quantity"];
				$faculty_id = $_SESSION["fkey"];
		$del = mysqli_prepare($link,"INSERT INTO purchase VALUES(?,?,?)");
		mysqli_stmt_bind_param($del, 'sis', $productid, $quantity,$faculty_id );
		mysqli_stmt_execute($del);
		
		mysqli_stmt_close($del);

		
	
	}
	*/

	if (  isset($_POST['qty']) && !empty($_POST["qty"]))  
	{
		
		$qty = $_POST["qty"];
	
				$faculty_id = $_SESSION["fkey"];
				date_default_timezone_set('Asia/Calcutta'); // CDT
//print date('Y-m-d  H:i:s');
$current_date = date('Y-m-d');
			

			
			/*$disp = mysqli_prepare($link,"SELECT quantity FROM product  where productid=? ;");
			mysqli_stmt_bind_param($disp, 's',$_SESSION['id']);
				mysqli_stmt_execute($disp);
			mysqli_stmt_bind_result($disp, $quantity);
			$quantity=$quantity-$qty;
mysqli_stmt_close($del);

			$del = mysqli_prepare($link,"UPDATE product SET quantity=?  WHERE productid=?");
		
		mysqli_stmt_bind_param($del, 'is', $quantity,$_SESSION['id']);
		mysqli_stmt_execute($del);
		
		mysqli_stmt_close($del);*/

		$del = mysqli_prepare($link,"INSERT INTO purchase VALUES(?,?,?,?)");
		mysqli_stmt_bind_param($del, 'siss', $_SESSION['id'], $qty,$faculty_id,$current_date );
		mysqli_stmt_execute($del);
		
		mysqli_stmt_close($del);
	}
	 

//$sql = "Update product SET quantity = quantity - $quantity WHERE faculty_id = $faculty_id ";
		//$result = mysql_query($sql);

			
	//	$add = mysqli_prepare($link,"UPDATE product SET quantity  WHERE productid = $productid ");
		//mysqli_stmt_bind_param($add, 'is',  $qty,$productid);
	//	mysqli_stmt_execute($add);
		
		//mysqli_stmt_close($add);
	
	
/*	if (isset($_POST['productid']) && !empty($_POST["productid"])  )  
	{
		$productid = $_POST['productid'];
	$quant = 1;
				$faculty_id = $_SESSION["fkey"];
				
		$del = mysqli_prepare($link,"INSERT INTO cart2 VALUES(?,?,?)");
		mysqli_stmt_bind_param($del, 'sis', $productid,$quant, $faculty_id );
		mysqli_stmt_execute($del);
		
		mysqli_stmt_close($del);

		
	
	}
	*/
	
	
	
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
					<?php include('pcommon/basestud.php');?>
				</div>
	
				<div class="content">
				
					<!-- HTML STARTS-->
			<div style="background-color:#D3D5E2;  outline: 2px thick; padding:5px;
            	background: -moz-linear-gradient(#999 50%, #112 140%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(50%, #D3D5E2), color-stop(140%, #112));
  background: -webkit-linear-gradient(#999 50%, #112 140%);
  background: linear-gradient(#003d4d 60%, #00b8e6 120%, #00b8e6 60%, #00b8e6 120%); text-align:center">
			<h1 style="font-size:16px;color:white;font-family:Andika">PRODUCTS VIEW</h1>

			</div>			
					
			<div style="background-color:#D3D5E2; border-radius:1px; outline: 2px thick; padding:20px; height:460px;
            	border: 1px solid #aaa;
	 -moz-box-shadow: 1px 1px 3px #fff inset;
    -webkit-box-shadow: 1px 1px 3px #fff inset;
    box-shadow: 1px 1px 3px #fff inset;">
			
				
				<div class="register-form" style="float:left; width:48%;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="accountedit" onsubmit="return validateForm()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DETAILS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
					<?php
					
						$ret = mysqli_prepare($link,"SELECT productname,price,quantity,availability,category,avg(rating) FROM product natural join profeed   WHERE productid = ? ");
						mysqli_stmt_bind_param($ret, 's', $_SESSION['id']);
						mysqli_stmt_execute($ret);
						mysqli_stmt_bind_result($ret, $productname,$price,$quantity,$availability,$category,$rating);
						mysqli_stmt_fetch($ret);
						
						
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>productname :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$productname.'</i>';
						echo '</p>';
						/*echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>productid :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$productid.'</i>';
						echo '</p>';*/
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>price :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</label><i>'.$price.'</i>';
						echo '</p>';
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>quantity :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$quantity.'</i>';
						echo '</p>';
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>availability :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$availability.'</i>';
						echo '</p>';
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>category :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$category.'</i>';
						echo '</p>';
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>rating :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</label><i>'.$rating.'</i>';
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
			



		<!--	<div style="background-color:#D3D5E2; border-radius:1px; outline: 2px thick; padding:20px; height:440px;
            	border: 1px solid #aaa;
	 -moz-box-shadow: 1px 1px 3px #fff inset;
    -webkit-box-shadow: 1px 1px 3px #fff inset;
    box-shadow: 1px 1px 3px #fff inset;">
			
				
				<div class="register-form" style="float:left; width:48%;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="accountedit" onsubmit="return validateForm()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DETAILS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
					<?php
					
						//$ret = mysqli_prepare($link,"INSERT INTO cart2 (productid,quantity) SELECT productid,quantity FROM product WHERE productid = ? ");
						//mysqli_stmt_bind_param($ret, 's', $_SESSION['id']);
						//mysqli_stmt_execute($ret);
						//mysqli_stmt_bind_result($ret, $productid,$quantity);
					//	mysqli_stmt_fetch($ret);
						
						
						

					
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
        -->
			
				<div class="register-form" style="float:left; width:47%; padding-left:40px;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="accountedit" onsubmit="return validateForm()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FILTER PRODUCTS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
						
					
					
					<p style="font-weight:700;padding:5px;">
                    <label>Category : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					
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
						
						$ret = mysqli_prepare($link,"SELECT productid, productname,category  FROM product    WHERE  category=? AND availability=? ");
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

            </br>
            </br>
            <br>
            <br>
            <br>
			
	<!--		
<div class="register-form" style="float:left; width:47%; padding-left:40px;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="accountedit" onsubmit="return validateForm()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BUY PRODUCTS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
						<?php
						echo '<p style="font-weight:700;">';
					echo'<label>PRODUCT ID : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>';
					echo'<input type="text" name="productid" placeholder="'.$productid.'" autofocus /><br/>';
				echo'</p>';
				echo'<br/>';
				echo'<p style="font-weight:700;">';
					echo'<label>QUANTITY : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>';
					echo'<input type="text" name="quantity" placeholder="'.$quantity.'" autofocus /><br/>';
				echo'</p>';
				//echo'<p style="font-weight:700;">';
					//echo'<label>USER ID : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>';
					//echo'<input type="text" name="facultyid" placeholder="'.$faculty_id.'" autofocus /><br/>';
				//echo'</p>';
				?>	
					
					
					
					
					
					
					
 				</fieldset>
                <fieldset class="fieldsetbtn">
					<input class="btn register" type="submit" name="submit" value="BUY" />
				</fieldset>

			</form>
            </div> -->
</br>
</br>
</br>

            <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                  
                    
                  
                     <tr>
                        <td width = "100">Quantity</td>
                        <td><input name = "qty" type = "text" 
                           id = "qty"></td>
                     </tr>
                      <!--<tr>
                        <td width = "100">DATE</td>
                        <td><input name = "date" type = "date" 
                           id = "date"></td>
                     </tr>
                  <!-- <tr>
                        <td width = "100">User Id</td>
                        <td><input name = "faculty_id" type = "text" 
                           id = "faculty_id"></td>
                     </tr>
                     
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>-->
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "add" type = "submit" id = "add" 
                              value = "BUY">
                        </td>
                     </tr>
                  
                  
                     </tr>
                  </table>
               </form>
            
        <!--   <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">Product Id</td>
                        <td><input name = "productid" type = "text" 
                           id = "productid"></td>
                     </tr>
                  
                    
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "add" type = "submit" id = "add" 
                              value = "ADD TO CART">
                        </td>
                     </tr>
                  
                  
                     </tr>
                  </table>
               </form>
				-->
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