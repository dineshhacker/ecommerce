<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkadminctab.php");
	
	//FORM HANDLING
	
	if(isset($_POST['subject']) && !empty($_POST["subject"]) && isset($_POST['faculty']) && !empty($_POST["faculty"]))
	 { 
		$subject = $_POST['subject'];
		$faculty = $_POST['faculty'];
		$fac = 'Not Assigned';
		
		$stmt = mysqli_prepare($link,"UPDATE course SET faculty_id=? WHERE course_id=? AND year=?");
		mysqli_stmt_bind_param($stmt, 'sss', $faculty,$subject,$_SESSION['year']);
		mysqli_stmt_execute($stmt);
		
		mysqli_stmt_close($stmt);
	}
	
	if(isset($_POST['reassign']) && !empty($_POST["reassign"]))
	{
		$del = mysqli_prepare($link,"UPDATE course SET faculty_id = 'Not Assigned' WHERE year=?");
		mysqli_stmt_bind_param($del, 's', $_SESSION['year']);
						
		mysqli_stmt_execute($del);
		
		mysqli_stmt_close($del);
	
	}
	
	if(isset($_POST['id']) && !empty($_POST["id"]))
	{	
	
		echo 'WORKING'; 
		$del = mysqli_prepare($link,"UPDATE course SET faculty_id = 'Not Assigned' WHERE year=? AND course_id=?");
		mysqli_stmt_bind_param($del, 'ss', $_SESSION['year'],$_POST['id']);
						
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
	  
	  	<!-- JAVASCRIPTS-->
		<script>
			function validateForm() {
				var x = document.forms["remove"]["id"].value;
				
				
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
			<h1 style="font-size:16px;">Map Subjects to Faculty <?php  echo $_SESSION['year']; ?></h1>

			</div>			
					
			<div style="background-color:#D3D5E2; border-radius:1px; outline: 2px thick; padding:20px; height:340px;
            	border: 1px solid #aaa;
	 -moz-box-shadow: 1px 1px 3px #fff inset;
    -webkit-box-shadow: 1px 1px 3px #fff inset;
    box-shadow: 1px 1px 3px #fff inset;">
			
			
				<div class="register-form" style=" width:85%;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="coursemap" >
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SUBJECT to FACULTY MAP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
                    <p style="font-weight:700;padding:5px;">
                    <label>SUBJECT : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					
					<select name="subject" style="width:600px;">
						<?php
						
						$ret = mysqli_prepare($link,"SELECT course_id, course_name, semester, degree, year, elective FROM course WHERE faculty_id = 'Not Assigned' AND YEAR=? ");
						mysqli_stmt_bind_param($ret, 's', $_SESSION['year']);
						mysqli_stmt_execute($ret);
						mysqli_stmt_bind_result($ret, $courseid,$coursename,$semester,$degree,$year,$elec);
			
			
						while( mysqli_stmt_fetch($ret)){
						echo
							'<option value="'.$courseid.'">'.$courseid .' ---- '.$coursename.' ---- '.$semester.' ---- '.$degree.' ---- '.$year.' ---- '.$elec.'</option>';
							
						}
		  
						mysqli_stmt_close($ret);
		  
						?>	
						
					</select> 
					</p>
                    
					<p style="font-weight:700;padding:5px;">
                    <label>FACULTY : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					
					<select name="faculty" style="width:600px;">
						
						<?php
						
						$ret1 = mysqli_prepare($link,"SELECT faculty_id,name FROM info WHERE role = 'user'");
	
						mysqli_stmt_execute($ret1);
						mysqli_stmt_bind_result($ret1, $facid,$facname);
			
			
						while( mysqli_stmt_fetch($ret1)){
						echo '<option value="'.$facid.'">'.$facid .' - '.$facname.'</option>';
							
						}
		  
						mysqli_stmt_close($ret);
		  
					?>	
					</select> 
					</p>
 				</fieldset>
                <fieldset class="fieldsetbtn">
					<input class="btn register" type="submit" name="submit" value="MAP" />
				</fieldset>
			</form>
			
			
            </div>
			
			
			<div class="register-form" style=" width:85%;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="remove" onsubmit="return validateForm()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REMOVE FACULTY MAP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
                    <p style="font-weight:700;padding:5px;">
                    <label>COURSE ID : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<input type="text" name="id" placeholder="Course ID" />
					</p>
 				</fieldset>
                <fieldset class="fieldsetbtn">
					<input class="btn register" type="submit" name="submit" value="REMOVE ASSINGN" style="width:140px;" />
					<input class="btn register" type="submit" name="reassignbtn" value="REASSIGN ALL" style="width:140px;" form="myform" />
				</fieldset>
			</form>
			
			<form id="myform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="reassigna">
				<select name="reassign" style="display:none">
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
						<th>FACULTY ID</th>
						<th>FACULTY NAME</th>
					</tr>
				
				
				<?php
		
			
			$disp = mysqli_prepare($link,"SELECT course.course_id, course.course_name, course.faculty_id,course.semester,course.degree,info.name  FROM course LEFT JOIN info 
										  ON course.faculty_id=info.faculty_id  WHERE course.year=?");
			mysqli_stmt_bind_param($disp, 's', $_SESSION['year']);
			mysqli_stmt_execute($disp);
			mysqli_stmt_bind_result($disp, $courseid,$coursename,$facultyid,$s,$d,$facultyname);
			
			
          while( mysqli_stmt_fetch($disp)){
            echo
            '<tr>
              <td>'.$courseid.'</td>
              <td>'.$coursename.'</td>
              <td>'.$s.'</td>
              <td>'.$d.'</td>
              <td>'.$facultyid.'</td>
              <td>'.$facultyname.'</td>
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