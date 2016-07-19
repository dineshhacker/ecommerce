<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkalum.php");
	
	
	

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
					<?php include('pcommon/basealumini.php');?>
				</div>
	
				<div class="content">
							<!-- HTML STARTS-->
			<div style="background-color:#D3D5E2;  outline: 2px thick; padding:5px;
            	background: -moz-linear-gradient(#999 50%, #112 140%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(50%, #D3D5E2), color-stop(140%, #112));
  background: -webkit-linear-gradient(#999 50%, #112 140%);
  background: linear-gradient(#003d4d 60%, #00b8e6 120%, #00b8e6 60%, #00b8e6 120%); text-align:center">
			<h1 style="font-size:16px;color:white;font-family:Andika">MERCHANT VIEW</h1>

			</div>				
					
			<div style="background-color:#00b8e6; border-radius:1px; outline: 2px thick; padding:20px; height:auto;
            	border: 1px solid #003d4d;
	 -moz-box-shadow: 1px 1px 3px #003d4d inset;
    -webkit-box-shadow: 1px 1px 3px #003d4d inset;
    box-shadow: 1px 1px 3px #003d4d inset;">
			
			
				<div class="register-form" style=" width:85%;">
				<form  method="post" name="coursemap" >
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Terms and Conditions&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
                    <p style="font-weight:700;padding:5px;">
						 The Merchant must take care of the Out of Stock Error!<br />
						 We will not be able to bill the products but the buyer will be able to see the products he has bought<br />
						 Merchant is supposed to update the quantity of the product<br />
						 You can change the password of your account by logging into it or requesting administrator to do so<br />
						 Not more than one administrator account is supposed to be there but on certain exceptions with the permission of Admin it can be done<br />
						 
					</p>
                    
					
 				</fieldset>
				</form>
				</div>
				
				<div class="register-form" style=" width:85%;">
				<form  method="post" name="coursemap" >
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Credits&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
                    <p style="font-weight:700;padding:5px;">
						 We'd like to give credits to Mrs.G.Aghila<br />
						 Our faculty members<br />
						 Mr.Surinderan for helping us with this project<br />
						 Ms.Preethi for assisting us with this project<br />
						 Our friends for helping us in little patch up works<br />
						 
					</p>
				</form>
				</div>
		
				<div class="register-form" style=" width:85%;">
				<form  method="post" name="coursemap" >
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copyrights&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
                    <p style="font-weight:700;padding:5px;">
						 No one is supposed to use the code without a prior permission obtained from the makers of this project <br />
						 It must me noted that no reproducing of our project is allowed within the college<br />
						 Unless and Until extension or changes of the contents to the project must be taken care of<br />
						 <br />
						 <br />
						 
					</p>
				</form>
				</div>
				<div class="register-form" style=" width:85%;">
				<form  method="post" name="coursemap" >
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Terms and Conditions&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
                    <p style="font-weight:700;padding:5px;">
						 The Merchant must take care of the Out of Stock Error!<br />
						 We will not be able to bill the products but the buyer will be able to see the products he has bought<br />
						 Merchant is supposed to update the quantity of the product<br />
						 You can change the password of your account by logging into it or requesting administrator to do so<br />
						 Not more than one administrator account is supposed to be there but on certain exceptions with the permission of Admin it can be done<br />
						 
					</p>
				</form>
				</div>
				
				
				<div class="register-form" style=" width:85%;">
				<form  method="post" name="coursemap" >
            
				
				
				</form>
				</div>
				
			
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