<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkstud.php");
	
	if (isset($_POST['productid']) && !empty($_POST["productid"])  && isset($_POST['quantity']) && !empty($_POST["quantity"]))  
	{
		$productid = $_POST['productid'];
		$quantity = $_POST["quantity"];
				$faculty_id = $_SESSION["fkey"];
			
		$del = mysqli_prepare($link,"UPDATE cart2 SET  quantity=?  WHERE productid=?");
		mysqli_stmt_bind_param($del, 'is',  $quantity,$productid);
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
	  
	  
  </head>

  <body>
		
		<div class="page-container">
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
  background: linear-gradient(#D5AAAA 60%, #FFF 120%); text-align:center">
			<h1 style="font-size:16px;">Your Cart </h1>

			</div>			
					
			<div style="background-color:#D3D5E2; border-radius:1px; outline: 2px thick; padding:20px; height:auto;
            	border: 1px solid #aaa;
	 -moz-box-shadow: 1px 1px 3px #fff inset;
    -webkit-box-shadow: 1px 1px 3px #fff inset;
    box-shadow: 1px 1px 3px #fff inset;">
			
			
			<!--	<div class="register-form" style="float:left; width:48%;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="accountedit" onsubmit="return validateForm()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DETAILS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
					<?php
					
						$ret = mysqli_prepare($link,"SELECT issuename,issuedesc,date FROM feedback  WHERE faculty_id = ? ");
						mysqli_stmt_bind_param($ret, 's', $_SESSION["fkey"]);
						mysqli_stmt_execute($ret);
						mysqli_stmt_bind_result($ret, $issuename,$issuedesc,$date);
						mysqli_stmt_fetch($ret);
						
						
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>Complaint NAME :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$issuename.'</i>';
						echo '</p>';
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>Complaint Description :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$issuedesc.'</i>';
						echo '</p>';
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>Complaint Given on :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$date.'</i>';
						echo '</p>';
						
						
						mysqli_stmt_close($ret);
					
					?>
					
					
 				</fieldset>
			</form>
            </div>
			
			-->
		
				
				
				
			
			</div>
                    

<table class="gradienttable" style="margin:0 auto; padding:5px; width:100%;" >
				
					<tr>
						<th>PRODUCT NAME</th>
						<th>PRODUCT ID</th>
						
						<th>QUANTITY</th>
						
						
						
						
					</tr>
				
				
				<?php
		
			
			$disp = mysqli_prepare($link,"SELECT productname,productid,quant FROM cart2 natural join product where faculty_id=?;");
			mysqli_stmt_bind_param($disp, 's', $_SESSION["fkey"]);
				mysqli_stmt_execute($disp);
			mysqli_stmt_bind_result($disp, $productname,$productid,$quant);
			
			
          while( mysqli_stmt_fetch($disp)){
            echo
            '<tr>
              <td>'.$productname.'</td>
              <td>'.$productid.'</td>
              <td>'.$quant.'</td>
               
             
              
			 			  
            </tr>';
          }
		  
			mysqli_stmt_close($disp);
		  
        ?>	
		
    </table>



 <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">Product Id</td>
                        <td><input name = "productid" type = "text" 
                           id = "productid"></td>
                     </tr>
                   <tr>
                        <td width = "100">Quantity</td>
                        <td><input name = "quantity" type = "text" 
                           id = "quantity"></td>
                     </tr>
                  
                    
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "add" type = "submit" id = "add" 
                              value = "EDIT">
                        </td>
                     </tr>
                  
                  
                     </tr>
                  </table>
               </form>
			

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