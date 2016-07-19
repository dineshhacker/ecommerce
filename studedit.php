<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkstud.php");
	
	if( (isset($_POST['contact']) && !empty($_POST["contact"]) ) || (isset($_POST['email']) && !empty($_POST["email"])) || (isset($_POST['age']) && !empty($_POST["age"])) )
	{
		$contact = $_POST['contact'];
		$email = $_POST["email"];
		$age = $_POST["age"];
		
		
		
		$del = mysqli_prepare($link,"UPDATE student SET contact=?, email=?, age = ?  WHERE faculty_id=?");
		
		mysqli_stmt_bind_param($del, 'ssis', $contact,$email,$age,$_SESSION["fkey"]);
		mysqli_stmt_execute($del);
		
		mysqli_stmt_close($del);
		$del = mysqli_prepare($link,"UPDATE info SET contact=?, email=?, age = ?  WHERE faculty_id=?");
		
		mysqli_stmt_bind_param($del, 'ssis', $contact,$email,$age,$_SESSION["fkey"]);
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
  background: linear-gradient(#003d4d 60%, #00b8e6 120%, #00b8e6 60%, #00b8e6 120%); text-align:center">
			<h1 style="font-size:16px;color:white;font-family:Andika">EDIT DETAILS</h1>

			</div>				
					
			<div style="background-color:#D3D5E2; border-radius:1px; outline: 2px thick; padding:20px; height:300px;
            	border: 1px solid #aaa;
	 -moz-box-shadow: 1px 1px 3px #fff inset;
    -webkit-box-shadow: 1px 1px 3px #fff inset;
    box-shadow: 1px 1px 3px #fff inset;">
			
			
				
			
				<div class="register-form" style="float:left; width:48%;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="accountedit" onsubmit="return validateForm()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DETAILS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
					<?php
					
						$ret = mysqli_prepare($link,"SELECT name, batch, branch,  contact, email, age FROM info natural join student WHERE faculty_id = ? ");
						mysqli_stmt_bind_param($ret, 's', $_SESSION["fkey"]);
						mysqli_stmt_execute($ret);
						mysqli_stmt_bind_result($ret, $name,$batch,$branch,$contact,$email,$age);
						mysqli_stmt_fetch($ret);
						
						
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>NAME :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$name.'</i>';
						echo '</p>';
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>BATCH :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$batch.'</i>';
						echo '</p>';
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>BRANCH :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$branch.'</i>';
						echo '</p>';
						//echo '<p style="font-weight:700;padding:5px;">';
						//echo '<label>ROLE :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$role.'</i>';
						//echo '</p>';
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>contact :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$contact.'</i>';
						echo '</p>';
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>EMAIL :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$email.'</i>';
						echo '</p>';
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>AGE :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$age.'</i>';
						echo '</p>';
						
						mysqli_stmt_close($ret);
					
					?>
					
					
 				</fieldset>
			</form>
            </div>
			
			<div class="register-form" style="float:left; width:47%; padding-left:40px;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="accountedit" onsubmit="return validateForm()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EDIT DETAILS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
					
					<?php
					
						$ret = mysqli_prepare($link,"SELECT contact, email, age FROM student WHERE faculty_id = ? ");
						mysqli_stmt_bind_param($ret, 's', $_SESSION["fkey"]);
						mysqli_stmt_execute($ret);
						mysqli_stmt_bind_result($ret, $contact,$email,$age);
						mysqli_stmt_fetch($ret);
					
					
				echo '<p style="font-weight:700;">';
					echo'<label>Phone No. : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>';
					echo'<input type="text" name="contact" placeholder="'.$contact.'" autofocus /><br/>';
				echo'</p>';
				echo'<br/>';
				echo'<p style="font-weight:700;">';
					echo'<label>Email : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>';
					echo'<input type="text" name="email" placeholder="'.$email.'" autofocus /><br/>';
				echo'</p>';
				echo'<br/>		';		
				echo'<p style="font-weight:700;">';
					echo'<label>Age : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>';
					echo'<input type="text" name="age" placeholder="'.$age.'" autofocus /><br/>';
				echo'</p>';
				echo'<br/>';
					
				echo'<p style="font-weight:700;display: none;">';
					echo'<label>Age : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>';
					echo'<input type="text" name="dummy" placeholder="ss" autofocus /><br/>';
				echo'</p>';
				
					mysqli_stmt_close($ret);
					
					?>
					
					
 				</fieldset>
                <fieldset class="fieldsetbtn">
					<input class="btn register" type="submit" name="submit" value="UPDATE" />
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