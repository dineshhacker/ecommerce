<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkadmin.php");
	
	//FORM HANDLING
	
	if(isset($_POST['batchyear']) && !empty($_POST["batchyear"]) )
	 { 
		$_SESSION["degree"] = $_POST['batchyear'];
		header("Location:adminstud1.php");
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
				var x = document.forms["batchenter"]["batchyear"].value;
				
				
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
  background: linear-gradient(#D5AAAA 60%, #FFF 120%); text-align:center">
			<h1 style="font-size:16px;">Enter Degree</h1>

			</div>			
					
			<div style="background-color:#D3D5E2; border-radius:1px; outline: 2px thick; padding:20px; height:auto;
            	border: 1px solid #aaa;
	 -moz-box-shadow: 1px 1px 3px #fff inset;
    -webkit-box-shadow: 1px 1px 3px #fff inset;
    box-shadow: 1px 1px 3px #fff inset;">
			
			
				<div class="register-form" style=" width:25%;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="batchenter" onsubmit="return validateForm()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SELECT DEGREE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
					<p style="font-weight:700;padding:5px;">
                    
                    <label>Degree : </label>
					<select name="batchyear">
						
						<option value="B.Tech">B.Tech</option>
						<option value="M.Tech">M.Tech</option>
						
					
					</select>
					</p>
				</fieldset>
                <fieldset class="fieldsetbtn">
					<input class="btn register" type="submit" name="submit" value="NEXT" />
				</fieldset>
				
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