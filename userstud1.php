<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkusertab.php");
	
	//FORM HANDLING
	
	
	if(isset($_POST['delall']) && !empty($_POST["delall"]))
	{
		$rut = mysqli_prepare($link,"DELETE FROM studcoursemap WHERE course_id=? AND semester=? AND degree=? AND 
									year=? AND faculty_id=? AND batch=?");
		mysqli_stmt_bind_param($rut,'ssssss', $_SESSION['cikey'], $_SESSION['skey'], $_SESSION['dkey'], $_SESSION['ykey'],$_SESSION['fkey'],$_SESSION['batch']);
		mysqli_stmt_execute($rut);
		mysqli_stmt_store_result($rut);
		mysqli_stmt_close($rut);
		
	}
	
	if(isset($_POST['rollno']) && !empty($_POST["rollno"]))
	{
		$rut = mysqli_prepare($link,"DELETE FROM studcoursemap WHERE student=? AND course_id=? AND semester=? AND degree=? AND 
									year=? AND faculty_id=? AND batch=?");
		mysqli_stmt_bind_param($rut,'sssssss',$_POST['rollno'], $_SESSION['cikey'], $_SESSION['skey'], $_SESSION['dkey'], $_SESSION['ykey'],$_SESSION['fkey'],$_SESSION['batch']);
		mysqli_stmt_execute($rut);
		mysqli_stmt_store_result($rut);
		mysqli_stmt_close($rut);
	
	}
		
	if(isset($_POST['init']) && !empty($_POST["init"]))
	{
		
		$rut = mysqli_prepare($link,"SELECT * FROM studentab WHERE degree=? AND batch=? ORDER BY student ASC");
		mysqli_stmt_bind_param($rut,'ss',$_SESSION['dkey'],$_SESSION['batch']);
		mysqli_stmt_execute($rut);
		mysqli_stmt_bind_result($rut, $roll,$name,$sex,$batch,$deg);
		mysqli_stmt_store_result($rut);
		
		while(mysqli_stmt_fetch($rut)){
				
			
				if(isset($_POST[$roll])){
					$ins = mysqli_prepare($link,"INSERT INTO studcoursemap VALUES(?,?,?,?,?,?,?,?,?,?)");
					mysqli_stmt_bind_param($ins, 'ssssssssss', $_POST[$roll],$name,$sex,$batch,$_SESSION["cikey"],$_SESSION["ckey"],$_SESSION["skey"],$_SESSION["dkey"],$_SESSION["ykey"],$_SESSION["fkey"]);
					mysqli_stmt_execute($ins);
					mysqli_stmt_close($ins);
					//echo $roll;
				
				}
		
		}
		
		mysqli_stmt_close($rut);
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
				var x = document.forms["courseenter"]["rollno"].value;
				
				
				if((x==null || x=="")){
					alert("Fields are Empty!");
				}
				
			}
		</script>
	  
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
			<h1 style="font-size:16px;">Student Registration -- <?php echo $_SESSION["cikey"]; ?> - <?php echo $_SESSION["ckey"]; ?> -
			<?php echo $_SESSION["dkey"]; ?> - <?php echo $_SESSION["ykey"]; ?> </h1>

			</div>			
					
			<div style="background-color:#D3D5E2; border-radius:1px; outline: 2px thick; padding:20px; height:200px;
            	border: 1px solid #aaa;
	 -moz-box-shadow: 1px 1px 3px #fff inset;
    -webkit-box-shadow: 1px 1px 3px #fff inset;
    box-shadow: 1px 1px 3px #fff inset;">
			
			
			
			
			<div class="register-form" style="width:50%;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="courseenter" onsubmit="return validateForm()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Unassign Students&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
					 <p style="font-weight:700;padding:5px;">
					<label>ROLL NO : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					
					<input type="text" name="rollno"/>
					
					
					</p>
 				</fieldset>
                <fieldset class="fieldsetbtn">
					<input class="btn register" type="submit" name="deleteall" value="UNASSIGN ALL" form="myform" style="width:140px;" />
					<input class="btn register" type="submit" name="submit" value="UNASSIGN" />
				</fieldset>
			</form>
			<form id="myform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="coursedeleteall">
				<select name="delall" style="display:none">
						<option value="1">1</option>
				</select>		
			</form>
            </div>
			
			
			
			</div>
			
			
				<div class="register-form" style="width:48%;float:left;padding-left:10px;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="couasdfrseenter" >
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assign Students&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
					 <p style="font-weight:700;padding:5px;">
                  
					<table class="gradienttable" style="margin:0 auto; width:100%;">
					<tr>
						<th></th>
						<th>ROLL NO</th>
						<th>NAME</th>
						<th>SEX</th>
						<th>BATCH</th>
						
					</tr>
				
					<?php
					
						$ret = mysqli_prepare($link,"SELECT * FROM studentab WHERE degree=? AND batch=? ORDER BY student ASC");
						mysqli_stmt_bind_param($ret,'ss',$_SESSION['dkey'],$_SESSION['batch']);
						mysqli_stmt_execute($ret);
						mysqli_stmt_bind_result($ret, $roll,$name,$sex,$year,$deg);
						
						while( mysqli_stmt_fetch($ret)){
							echo '<tr>';
								echo '<td>';
								echo '<input type="checkbox" name="'.$roll.'" value="'.$roll.'">';
								echo '</td>';
								
								echo '<td>';
								echo $roll;
								echo '</td>';

								echo '<td>';
								echo $name;
								echo '</td>';

								echo '<td>';
								echo $sex;
								echo '</td>';

								echo '<td>';
								echo $year;
								echo '</td>';
								
							echo '</tr>';
						}
						
						
						mysqli_stmt_close($ret);
					?>
					</table>
					<select name="init" style="display:none">
						<option value="1">1</option>
					</select>	
					</p>
 				</fieldset>
                <fieldset class="fieldsetbtn">
				
					<input class="btn register" type="submit" name="submit" value="ASSSIGN" />
					
				</fieldset>
			</form>
			
            </div>
			
			<div class="register-form" style="width:50%;float:left;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="courseensadfter" >
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assigned Students&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
					 <p style="font-weight:700;padding:5px;">
                    
					<table class="gradienttable" style="margin:0 auto; width:100%;">
					<tr>
						<th></th>
						<th>ROLL NO</th>
						<th>NAME</th>
						<th>SEX</th>
						<th>BATCH</th>
						
					</tr>
				
					<?php
					
						$ret = mysqli_prepare($link,"SELECT student,stud_name,sex,batch FROM studcoursemap WHERE degree=? AND course_id=? AND batch=? ORDER BY student ASC");
						mysqli_stmt_bind_param($ret,'sss',$_SESSION['dkey'],$_SESSION['cikey'],$_SESSION['batch']);
						mysqli_stmt_execute($ret);
						mysqli_stmt_bind_result($ret, $roll,$name,$sex,$year);
						$no=0;
						while( mysqli_stmt_fetch($ret)){
							global $no;
							$no= $no+1;
							echo '<tr>';
								echo '<td>';
								echo '<b>'.$no.'</b>';
								echo '</td>';
								
								echo '<td>';
								echo $roll;
								echo '</td>';

								echo '<td>';
								echo $name;
								echo '</td>';

								echo '<td>';
								echo $sex;
								echo '</td>';

								echo '<td>';
								echo $year;
								echo '</td>';
								
							echo '</tr>';
						}
						
						
						mysqli_stmt_close($ret);
					?>
					</table>
					
					</p>
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