<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkadmin.php");
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



<div style="background-color:#00b8e6; border-radius:1px; outline: 2px thick; padding:20px; height:auto;
            	border: 1px solid #003d4d;
	 -moz-box-shadow: 1px 1px 3px #003d4d inset;
    -webkit-box-shadow: 1px 1px 3px #003d4d inset;
    box-shadow: 1px 1px 3px #003d4d inset;">

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


	
		</div>
	
		<div style="float:left;width:100%;">
		<?php
			include('pcommon/footer.php');
		?>
		</div>

  </body>
</html>