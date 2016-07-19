<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkadmin.php");
	
	//FORM HANDLING
	
	//$_SESSION["batch"] = '2010-2014';
	//$_SESSION["branch"] = 'CSE';
	//$_SESSION["role"] = 'student';
	//$_SESSION["id"] = null;
		
	
	if(isset($_POST['batch']) && !empty($_POST["batch"])&& isset($_POST['branch']) && !empty($_POST["branch"])&& isset($_POST['role']) && !empty($_POST["role"]))
	 { 
 
		$_SESSION["batch"] = $_POST['batch'];
		$_SESSION["branch"] = $_POST['branch'];
		$_SESSION["role"] = $_POST['role'];
		
		//echo $_SESSION["batch"];
		//echo $_SESSION["branch"];
		//echo $_SESSION["role"];
		
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
					<?php include('pcommon/baseadmin.php');?>
				</div>
	
				<div class="content">
				
					<!-- HTML STARTS-->
			<div style="background-color:#D3D5E2;  outline: 2px thick; padding:5px;
            	background: -moz-linear-gradient(#999 50%, #112 140%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(50%, #D3D5E2), color-stop(140%, #112));
  background: -webkit-linear-gradient(#999 50%, #112 140%);
  background: linear-gradient(#003d4d 60%, #00b8e6 120%, #00b8e6 60%, #00b8e6 120%); text-align:center">
			<h1 style="font-size:16px;color:white;font-family:Andika">ACCOUNT VIEW</h1>

			</div>				
					
			<div style="background-color:#D3D5E2; border-radius:1px; outline: 2px thick; padding:20px; height:440px;
            	border: 1px solid #aaa;
	 -moz-box-shadow: 1px 1px 3px #fff inset;
    -webkit-box-shadow: 1px 1px 3px #fff inset;
    box-shadow: 1px 1px 3px #fff inset;">
			
				
				<div class="register-form" style="float:left; width:48%;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="accountedit" onsubmit="return validateForm()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DETAILS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
					<?php
					
						$ret = mysqli_prepare($link,"SELECT name, batch, branch,  contact, email, age FROM info   WHERE faculty_id = ? ");
						mysqli_stmt_bind_param($ret, 's', $_SESSION['id']);
						mysqli_stmt_execute($ret);
						mysqli_stmt_bind_result($ret, $name,$batch,$branch,$contact,$email,$age);
						mysqli_stmt_fetch($ret);
						
						
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>NAME :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$name.'</i>';
						echo '</p>';
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>GENDER :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$batch.'</i>';
						echo '</p>';
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>STATE :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$branch.'</i>';
						echo '</p>';
						/*echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>ROLE :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$role.'</i>';
						echo '</p>';*/
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>CONTACT :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$contact.'</i>';
						echo '</p>';
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>EMAIL :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$email.'</i>';
						echo '</p>';
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>AGE :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$age.'</i>';
						echo '</p>';
						
						
						mysqli_stmt_close($ret);
					
					?>
					
					
 				</fieldset>
			</form>
            </div>
			
			
				<div class="register-form" style="float:left; width:47%; padding-left:40px;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="accountedit" onsubmit="return validateForm()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FILTER VIEW&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
					
					<p style="font-weight:700;padding:5px;">
                    <label>Role : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					
					<select name="role">
						<option value="admin">Admin</option>
						<option value="student">User</option>
						<option value="alumini">Merchant</option>
					</select> 
					</p>
					
					
					
					<p style="font-weight:700;padding:5px;">
                    <label>State : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					
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
                    <label>Gender : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					
					<select name="batch">
						<option value="-">-</option>
						<option value="male">male</option>
						<option value="female">female</option>
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
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DISPLAY DETAILS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
					
					<p style="font-weight:700;padding:5px;">
                    <label>DETAILS : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					
					<select name="disp" style="width:600px;">
						<?php
						
						$ret = mysqli_prepare($link,"SELECT faculty_id, name, branch FROM info WHERE role=? AND batch=? AND branch=? ");
						mysqli_stmt_bind_param($ret, 'sss', $_SESSION['role'],$_SESSION['batch'],$_SESSION['branch']);
						mysqli_stmt_execute($ret);
						mysqli_stmt_bind_result($ret, $faculty_id,$name,$branch);
			
			
						while( mysqli_stmt_fetch($ret)){
						echo
							'<option value="'.$faculty_id.'">'.$faculty_id .' ---- '.$name.' ---- '.$branch.'</option>';
							
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
			
			
					
			
			</div>
			
			
			
			
			

		<div style="background-color:#EEE; border-radius:1px; outline: 2px thick; padding:20px;
        border: 1px solid #aaa;
	 -moz-box-shadow: 1px 1px 3px #fff inset;
    -webkit-box-shadow: 1px 1px 3px #fff inset;
    box-shadow: 1px 1px 3px #fff inset;">
		
			<table class="gradienttable" style="margin:0 auto; padding:5px; width:100%;" >
				
					<tr>
						<th>NAME</th>
						<th>ROLE</th>
						<th>USER ID</th>
						<th>STATE</th>
						<th>GENDER</th>
						<th>EMAIL</th>
						<th>CONTACT</th>
						<th>CITY</th>
					</tr>
				
				
				<?php
		
			//echo $_SESSION['role'];
			$disp = mysqli_prepare($link,"SELECT faculty_id,role,name,branch,batch,email,contact,city FROM info WHERE role=? AND batch=? AND branch=? ");
			mysqli_stmt_bind_param($disp, 'sss', $_SESSION['role'],$_SESSION['batch'],$_SESSION['branch']);
			mysqli_stmt_execute($disp);
			mysqli_stmt_bind_result($disp, $faculty_id,$role,$name,$batch,$branch,$email,$contact,$city);
			
			
          while( mysqli_stmt_fetch($disp)){
            echo
            '<tr>
              <td>'.$name.'</td>
              <td>'.$role.'</td>
              <td>'.$faculty_id.'</td>
			  <td>'.$batch.'</td>			  
              <td>'.$branch.'</td>	
               <td>'.$email.'</td>	
                <td>'.$contact.'</td>
                 <td>'.$city.'</td>							  
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