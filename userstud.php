<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkuser.php");
	
	//FORM HANDLING
	if(isset($_POST['cid']) && !empty($_POST["cid"]))
	{
		$cid = $_POST['cid'];
		
		$stmt = mysqli_prepare($link,"SELECT course_name, semester, degree, year FROM course WHERE course_id=?");
		mysqli_stmt_bind_param($stmt, 's', $cid);
		
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $cname,$sem,$deg,$year);
		mysqli_stmt_fetch($stmt);
		
				$_SESSION["cikey"] = $cid;
				$_SESSION["ckey"] = $cname;
				$_SESSION["skey"] = $sem;
				$_SESSION["dkey"] = $deg;
				$_SESSION["ykey"] = $year;
				
				header("Location:userstudb.php");
		mysqli_stmt_close($stmt);
	
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
		
	  
  </head>

  <body>
 
		
		<div class="page-container" >
			<?php include('pcommon/header.php'); ?>
				
				<div  style="float:left;position:relative;width:15%;  ">
					<?php include('pcommon/baseuser.php');?>
				</div>
	
				<div class="content">
				
					<!-- HTML STARTS-->
			<div style="background-color:#D3D5E2;  outline: 2px thick; padding:5px;
            	background: -moz-linear-gradient(#999 50%, #112 140%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(50%, #D3D5E2), color-stop(140%, #112));
  background: -webkit-linear-gradient(#999 50%, #112 140%);
  background: linear-gradient(#D5AAAA 60%, #FFF 120%); text-align:center">
			<h1 style="font-size:16px;">Student Registration - Course Selection</h1>

			</div>			
					
			<div style="background-color:#D3D5E2; border-radius:1px; outline: 2px thick; padding:20px; height:auto;
            	border: 1px solid #aaa;
	 -moz-box-shadow: 1px 1px 3px #fff inset;
    -webkit-box-shadow: 1px 1px 3px #fff inset;
    box-shadow: 1px 1px 3px #fff inset;">
			
			
				<div class="register-form" style="width:76%;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="courseenter" onsubmit="return validateForm()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Choose Course&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
					 <p style="font-weight:700;padding:5px;">
                    <label>CID : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					
					<select name="cid" style="width:400px">
					<?php
						
						$fkey = $_SESSION["fkey"];
						$ret = mysqli_prepare($link,"SELECT course_id, course_name, degree, year FROM course WHERE faculty_id = ?");
						mysqli_stmt_bind_param($ret, 's', $fkey);
						mysqli_stmt_execute($ret);
						mysqli_stmt_bind_result($ret, $courseid,$coursename,$d,$y);
			
			
						while( mysqli_stmt_fetch($ret)){
						echo
							'<option value="'.$courseid.'">'.$courseid .' - '.$coursename.' - '.$d. ' - '.$y .'</option>';
							
						}
						
						mysqli_stmt_close($ret);
		  
					?>	
						
					</select> 
					</p>
 				</fieldset>
                <fieldset class="fieldsetbtn">
					<input class="btn register" type="submit" name="submit" value="CONTINUE" />
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