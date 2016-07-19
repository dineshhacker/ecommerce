<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkadminctab.php");
	
	//FORM HANDLING
	
	if(isset($_POST['courseid']) && !empty($_POST["courseid"]) && isset($_POST['coursename']) && !empty($_POST["coursename"]))
	 { 
		$courseid = $_POST['courseid'];
		$coursename = $_POST['coursename'];
		$semester = $_POST['semester'];
		$degree = $_POST['degree'];
		$year = $_SESSION['year'];
		$elec = $_POST['elec'];
		$fac = 'Not Assigned';
		
		
		 
		
		$stmt = mysqli_prepare($link,"INSERT INTO course VALUES(?,?,?,?,?,?,?)");
		mysqli_stmt_bind_param($stmt, 'sssssss', $courseid, $coursename, $semester, $degree, $year, $fac,$elec);
		mysqli_stmt_execute($stmt);
		
		mysqli_stmt_close($stmt);
	}
	
	if(isset($_POST['courseiddel']) && !empty($_POST["courseiddel"]))
	{
		$courseiddel = $_POST['courseiddel'];
		
		$del = mysqli_prepare($link,"DELETE FROM course WHERE course_id=? AND year=?");
		mysqli_stmt_bind_param($del, 'ss', $courseiddel,$_SESSION['year']);
		mysqli_stmt_execute($del);
		
		mysqli_stmt_close($del);
	
	}
	
	if(isset($_POST['delall']) && !empty($_POST["delall"]))
	{
		$del = mysqli_prepare($link,"DELETE FROM course WHERE year=?");
		mysqli_stmt_bind_param($del, 's', $_SESSION['year']);
		mysqli_stmt_execute($del);
		mysqli_stmt_close($del);
	
	}

	
	//mysqli_close($link);
		/*
		$query = "INSERT INTO info VALUES ('". $user ."','". $pass ."')";
		echo "<pre>Debug: $query</pre>\m";
		$result = mysqli_query($link,$query);
		if ( false===$result ) {
			printf("error: %s\n", mysqli_error($link));
		}
		else {
			echo 'done.';
		}
		*/
		
		//$stmt = mysqli_prepare($link, "INSERT INTO info VALUES ('?','?')");
		//mysqli_stmt_bind_param($stmt, 'ss', $user, $pass);
		
		//mysqli_stmt_execute($stmt);
		//mysqli_stmt_close($stmt);
		
		//header("Location:pscripts/init.php");
		


	

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
				var x = document.forms["courseenter"]["courseid"].value;
				var y = document.forms["courseenter"]["coursename"].value;
				var z = document.forms["courseenter"]["year"].value;
				
				
				if((y==null || y=="") || (x==null || x=="") || (z==null || z=="")){
					alert("Fields are Empty!");
				}
				
			}
		</script>
		<script>
			function validateFormDel() {
				var x = document.forms["coursedelete"]["courseiddel"].value;
				
				
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
			<h1 style="font-size:16px;">Course Table Edit <?php  echo $_SESSION['year']; ?></h1>

			</div>			
					
			<div style="background-color:#D3D5E2; border-radius:1px; outline: 2px thick; padding:20px; height:280px;
            	border: 1px solid #aaa;
	 -moz-box-shadow: 1px 1px 3px #fff inset;
    -webkit-box-shadow: 1px 1px 3px #fff inset;
    box-shadow: 1px 1px 3px #fff inset;">
			
			
				<div class="register-form" style="float:left; width:46%;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="courseenter" onsubmit="return validateForm()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter Details&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					<p style="font-weight:700;padding:5px;">
					<label>Course ID :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="courseid" placeholder="Course ID" autofocus /><br/>
					</p>
                    <p style="font-weight:700;padding:5px;">
                    <label>Course Name :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="coursename" placeholder="Course Name" autofocus /><br />
					</p>
                    <p style="font-weight:700;padding:5px;">
                    <label>Semester : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					
					<select name="semester">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						
					</select> 
					</p>
                    <p style="font-weight:700;padding:5px;">
					<label>Degree :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </label>
                    <select name="degree">
						<option value="B.Tech">B.Tech</option>
						<option value="M.Tech">M.Tech</option>
							
					</select> 
					</p>
                    <p style="font-weight:700;padding:5px;">
                    
					<label>Elective : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<select name="elec">
							<option value="NO">NO</option>
							<option value="YES">YES</option>
						</select>
					</p>
 				</fieldset>
                <fieldset class="fieldsetbtn">
					<input class="btn register" type="submit" name="submit" value="INSERT" />
				</fieldset>
			</form>
            </div>
			<div class="register-form" style="float:left; width:48%; padding-left:40px;">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="coursedelete" onsubmit="return validateFormDel()">
            
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Delete Details&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
				<p style="font-weight:700;">
					<label>Course ID : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="courseiddel" placeholder="Course ID" autofocus /><br/>
				</p>
				</fieldset>
				<fieldset class="fieldsetbtn">
				<input class="btn register" type="submit" name="delete" value="DELETE" />
				<input class="btn register" type="submit" name="deleteall" value="DELETE ALL" form="myform" />
				</fieldset>
				
			</form>
			
			<form id="myform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="coursedeleteall">
				<select name="delall" style="display:none">
						<option value="1">1</option>
				</select>		
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
						<th>COURSE ID</th>
						<th>COURSE NAME</th>
						<th>SEMESTER</th>
						<th>DEGREE</th>
						<th>ELECTIVE</th>
					</tr>
				
				
				<?php
		
			
			$disp = mysqli_prepare($link,"SELECT course_id, course_name, semester, degree, elective FROM course WHERE year=?;");
			mysqli_stmt_bind_param($disp, 's', $_SESSION['year']);
			mysqli_stmt_execute($disp);
			mysqli_stmt_bind_result($disp, $courseid,$coursename,$semester,$degree,$elec);
			
			
          while( mysqli_stmt_fetch($disp)){
            echo
            '<tr>
              <td>'.$courseid.'</td>
              <td>'.$coursename.'</td>
              <td>'.$semester.'</td>
              <td>'.$degree.'</td>
              <td>'.$elec.'</td>
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