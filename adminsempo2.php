<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkadminctab.php");
	
	//FORM HANDLING
	
	if(isset($_POST['coursesel']) && !empty($_POST["coursesel"]) )
	 { 
		$pieces = explode(" ", $_POST['coursesel']);
		echo $pieces[0]; 
		echo $pieces[1];
		$_SESSION["degree"] = $pieces[0]; 
		$_SESSION["semester"] = $pieces[1]; 
		
		header("Location:adminsempoprint.php");
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
			<h1 style="font-size:16px;">SEMESTER PO's - <?php echo $_SESSION['year']; ?></h1>

			</div>			
					
			<div style="background-color:#D3D5E2; border-radius:1px; outline: 2px thick; padding:20px; height:auto;
            	border: 1px solid #aaa;
	 -moz-box-shadow: 1px 1px 3px #fff inset;
    -webkit-box-shadow: 1px 1px 3px #fff inset;
    box-shadow: 1px 1px 3px #fff inset;">
			
			<div class="register-form" style="float:center; width:30%;">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="coursechoose" onsubmit="return validateFormDel()">
            
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Generate Semester POs&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
				<p style="font-weight:700;">
					<label>Course ID : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<select name="coursesel" >
						
						<option value="B.Tech 3">B.Tech - SEM 3</option>
						<option value="B.Tech 4">B.Tech - SEM 4</option>
						<option value="B.Tech 5">B.Tech - SEM 5</option>
						<option value="B.Tech 6">B.Tech - SEM 6</option>
						<option value="B.Tech 7">B.Tech - SEM 7</option>
						<option value="B.Tech 8">B.Tech - SEM 8</option>
						<option value="M.Tech 1">M.Tech - SEM 1</option>
						<option value="M.Tech 2">M.Tech - SEM 2</option>
						
					</select>
				</p>
				</fieldset>
				<fieldset class="fieldsetbtn">
				<input class="btn register" type="submit" name="course" value="GENERATE" />
				</fieldset>
				
			</form>
			<br/>
		
			</div>
			
				<!--   B.Tech SEMESTER 3 -->
				
				<table class="gradienttable" style="margin:0 auto; padding:5px; width:90%;" >
					
					<tr>
						<th colspan=13><b> B.Tech - SEMESTER 3 </b></th>
					</tr>
				
					<tr>
							<th colspan=2>
							</th>
							<th>
							<b>PO1</b>
								
							</th>
							<th >
							<b>PO2</b>
								
							</th>
							<th >
							<b>PO3</b>
								
							</th>
							<th >
							<b>PO4</b>
								
							</th>
							<th >
							<b>PO5</b>
								
							</th>
							<th >
							<b>PO6</b>
								
							</th>
							<th >
							<b>PO7</b>
								
							</th>
							<th >
							<b>PO8</b>
								
							</th>
							<th >
							<b>PO9</b>
								
							</th>
							<th >
							<b>PO10</b>
								
							</th>
							<th >
							<b>PO11</b>
								
							</th>
				
				</tr>
				<?php
				
					
					$subc=''; $subn=''; $po1=0;$po2=0;$po3=0;$po4=0;$po5=0;$po6=0;$po7=0;$po8=0;$po9=0;$po10=0;$po11=0;
					$year = $_SESSION["year"];
					$result = mysqli_query($link, "SELECT DISTINCT course_id,course_name,po1,po2,po3,po4,po5,po6,po7,po8,po9,po10,po11 FROM mastertab WHERE level='j' AND year='$year' 
									AND semester='3' AND degree='B.Tech'");
					//echo mysqli_num_rows($result);
					
					while($row = mysqli_fetch_assoc($result)){
						$subc=$row['course_id'];
						$subn=$row['course_name'];
						$po1=$row['po1'];
						$po2=$row['po2'];
						$po3=$row['po3'];
						$po4=$row['po4'];
						$po5=$row['po5'];
						$po6=$row['po6'];
						$po7=$row['po7'];
						$po8=$row['po8'];
						$po9=$row['po9'];
						$po10=$row['po10'];
						$po11=$row['po11'];
						
						echo 
						'<tr>
							
							<td>'.$subc.'</td>
							<td>'.$subn.'</td>
							<td>'.round($po1,2)	.'</td>
							<td>'.round($po2,2)	.'</td>
							<td>'.round($po3,2)	.'</td>
							<td>'.round($po4,2)	.'</td>
							<td>'.round($po5,2)	.'</td>
							<td>'.round($po6,2)	.'</td>
							<td>'.round($po7,2)	.'</td>
							<td>'.round($po8,2)	.'</td>
							<td>'.round($po9,2)	.'</td>
							<td>'.round($po10,2).'</td>
							<td>'.round($po11,2).'</td>
						
						</tr>
						';
					}
		 
        ?>	
		
    </table>
			
			<br/>
			<!--   B.Tech SEMESTER 3 -->
				
				<table class="gradienttable" style="margin:0 auto; padding:5px; width:90%;" >
					
					<tr>
						<th colspan=13><b> B.Tech - SEMESTER 4 </b></th>
					</tr>
				
					<tr>
							<th colspan=2>
							</th>
							<th>
							<b>PO1</b>
								
							</th>
							<th >
							<b>PO2</b>
								
							</th>
							<th >
							<b>PO3</b>
								
							</th>
							<th >
							<b>PO4</b>
								
							</th>
							<th >
							<b>PO5</b>
								
							</th>
							<th >
							<b>PO6</b>
								
							</th>
							<th >
							<b>PO7</b>
								
							</th>
							<th >
							<b>PO8</b>
								
							</th>
							<th >
							<b>PO9</b>
								
							</th>
							<th >
							<b>PO10</b>
								
							</th>
							<th >
							<b>PO11</b>
								
							</th>
				
				</tr>
				<?php
				
					
					$subc=''; $subn=''; $po1=0;$po2=0;$po3=0;$po4=0;$po5=0;$po6=0;$po7=0;$po8=0;$po9=0;$po10=0;$po11=0;
					$year = $_SESSION["year"];
					$result = mysqli_query($link, "SELECT DISTINCT course_id,course_name,po1,po2,po3,po4,po5,po6,po7,po8,po9,po10,po11 FROM mastertab WHERE level='j' AND year='$year' 
									AND semester='4' AND degree='B.Tech'");
					//echo mysqli_num_rows($result);
					
					while($row = mysqli_fetch_assoc($result)){
						$subc=$row['course_id'];
						$subn=$row['course_name'];
						$po1=$row['po1'];
						$po2=$row['po2'];
						$po3=$row['po3'];
						$po4=$row['po4'];
						$po5=$row['po5'];
						$po6=$row['po6'];
						$po7=$row['po7'];
						$po8=$row['po8'];
						$po9=$row['po9'];
						$po10=$row['po10'];
						$po11=$row['po11'];
						
						echo 
						'<tr>
							
							<td>'.$subc.'</td>
							<td>'.$subn.'</td>
							<td>'.round($po1,2)	.'</td>
							<td>'.round($po2,2)	.'</td>
							<td>'.round($po3,2)	.'</td>
							<td>'.round($po4,2)	.'</td>
							<td>'.round($po5,2)	.'</td>
							<td>'.round($po6,2)	.'</td>
							<td>'.round($po7,2)	.'</td>
							<td>'.round($po8,2)	.'</td>
							<td>'.round($po9,2)	.'</td>
							<td>'.round($po10,2).'</td>
							<td>'.round($po11,2).'</td>
						
						</tr>
						';
					}
		 
        ?>	
		
    </table>
			<br/>
			<!--   B.Tech SEMESTER 5 -->
				
				<table class="gradienttable" style="margin:0 auto; padding:5px; width:90%;" >
					
					<tr>
						<th colspan=13><b> B.Tech - SEMESTER 5 </b></th>
					</tr>
				
					<tr>
							<th colspan=2>
							</th>
							<th>
							<b>PO1</b>
								
							</th>
							<th >
							<b>PO2</b>
								
							</th>
							<th >
							<b>PO3</b>
								
							</th>
							<th >
							<b>PO4</b>
								
							</th>
							<th >
							<b>PO5</b>
								
							</th>
							<th >
							<b>PO6</b>
								
							</th>
							<th >
							<b>PO7</b>
								
							</th>
							<th >
							<b>PO8</b>
								
							</th>
							<th >
							<b>PO9</b>
								
							</th>
							<th >
							<b>PO10</b>
								
							</th>
							<th >
							<b>PO11</b>
								
							</th>
				
				</tr>
				<?php
				
					
					$subc=''; $subn=''; $po1=0;$po2=0;$po3=0;$po4=0;$po5=0;$po6=0;$po7=0;$po8=0;$po9=0;$po10=0;$po11=0;
					$year = $_SESSION["year"];
					$result = mysqli_query($link, "SELECT DISTINCT course_id,course_name,po1,po2,po3,po4,po5,po6,po7,po8,po9,po10,po11 FROM mastertab WHERE level='j' AND year='$year' 
									AND semester='5' AND degree='B.Tech'");
					//echo mysqli_num_rows($result);
					
					while($row = mysqli_fetch_assoc($result)){
						$subc=$row['course_id'];
						$subn=$row['course_name'];
						$po1=$row['po1'];
						$po2=$row['po2'];
						$po3=$row['po3'];
						$po4=$row['po4'];
						$po5=$row['po5'];
						$po6=$row['po6'];
						$po7=$row['po7'];
						$po8=$row['po8'];
						$po9=$row['po9'];
						$po10=$row['po10'];
						$po11=$row['po11'];
						
						echo 
						'<tr>
							
							<td>'.$subc.'</td>
							<td>'.$subn.'</td>
							<td>'.round($po1,2)	.'</td>
							<td>'.round($po2,2)	.'</td>
							<td>'.round($po3,2)	.'</td>
							<td>'.round($po4,2)	.'</td>
							<td>'.round($po5,2)	.'</td>
							<td>'.round($po6,2)	.'</td>
							<td>'.round($po7,2)	.'</td>
							<td>'.round($po8,2)	.'</td>
							<td>'.round($po9,2)	.'</td>
							<td>'.round($po10,2).'</td>
							<td>'.round($po11,2).'</td>
						
						</tr>
						';
					}
		 
        ?>	
		
    </table>
			
			<br/>
			<!--   B.Tech SEMESTER 3 -->
				
				<table class="gradienttable" style="margin:0 auto; padding:5px; width:90%;" >
					
					<tr>
						<th colspan=13><b> B.Tech - SEMESTER 6 </b></th>
					</tr>
				
					<tr>
							<th colspan=2>
							</th>
							<th>
							<b>PO1</b>
								
							</th>
							<th >
							<b>PO2</b>
								
							</th>
							<th >
							<b>PO3</b>
								
							</th>
							<th >
							<b>PO4</b>
								
							</th>
							<th >
							<b>PO5</b>
								
							</th>
							<th >
							<b>PO6</b>
								
							</th>
							<th >
							<b>PO7</b>
								
							</th>
							<th >
							<b>PO8</b>
								
							</th>
							<th >
							<b>PO9</b>
								
							</th>
							<th >
							<b>PO10</b>
								
							</th>
							<th >
							<b>PO11</b>
								
							</th>
				
				</tr>
				<?php
				
					
					$subc=''; $subn=''; $po1=0;$po2=0;$po3=0;$po4=0;$po5=0;$po6=0;$po7=0;$po8=0;$po9=0;$po10=0;$po11=0;
					$year = $_SESSION["year"];
					$result = mysqli_query($link, "SELECT DISTINCT course_id,course_name,po1,po2,po3,po4,po5,po6,po7,po8,po9,po10,po11 FROM mastertab WHERE level='j' AND year='$year' 
									AND semester='6' AND degree='B.Tech'");
					//echo mysqli_num_rows($result);
					
					while($row = mysqli_fetch_assoc($result)){
						$subc=$row['course_id'];
						$subn=$row['course_name'];
						$po1=$row['po1'];
						$po2=$row['po2'];
						$po3=$row['po3'];
						$po4=$row['po4'];
						$po5=$row['po5'];
						$po6=$row['po6'];
						$po7=$row['po7'];
						$po8=$row['po8'];
						$po9=$row['po9'];
						$po10=$row['po10'];
						$po11=$row['po11'];
						
						echo 
						'<tr>
							
							<td>'.$subc.'</td>
							<td>'.$subn.'</td>
							<td>'.round($po1,2)	.'</td>
							<td>'.round($po2,2)	.'</td>
							<td>'.round($po3,2)	.'</td>
							<td>'.round($po4,2)	.'</td>
							<td>'.round($po5,2)	.'</td>
							<td>'.round($po6,2)	.'</td>
							<td>'.round($po7,2)	.'</td>
							<td>'.round($po8,2)	.'</td>
							<td>'.round($po9,2)	.'</td>
							<td>'.round($po10,2).'</td>
							<td>'.round($po11,2).'</td>
						
						</tr>
						';
					}
		 
        ?>	
		
    </table>
	<br/>
	<!--   B.Tech SEMESTER 7 -->
				
				<table class="gradienttable" style="margin:0 auto; padding:5px; width:90%;" >
					
					<tr>
						<th colspan=13><b> B.Tech - SEMESTER 7 </b></th>
					</tr>
				
					<tr>
							<th colspan=2>
							</th>
							<th>
							<b>PO1</b>
								
							</th>
							<th >
							<b>PO2</b>
								
							</th>
							<th >
							<b>PO3</b>
								
							</th>
							<th >
							<b>PO4</b>
								
							</th>
							<th >
							<b>PO5</b>
								
							</th>
							<th >
							<b>PO6</b>
								
							</th>
							<th >
							<b>PO7</b>
								
							</th>
							<th >
							<b>PO8</b>
								
							</th>
							<th >
							<b>PO9</b>
								
							</th>
							<th >
							<b>PO10</b>
								
							</th>
							<th >
							<b>PO11</b>
								
							</th>
				
				</tr>
				<?php
				
					
					$subc=''; $subn=''; $po1=0;$po2=0;$po3=0;$po4=0;$po5=0;$po6=0;$po7=0;$po8=0;$po9=0;$po10=0;$po11=0;
					$year = $_SESSION["year"];
					$result = mysqli_query($link, "SELECT DISTINCT course_id,course_name,po1,po2,po3,po4,po5,po6,po7,po8,po9,po10,po11 FROM mastertab WHERE level='j' AND year='$year' 
									AND semester='7' AND degree='B.Tech'");
					//echo mysqli_num_rows($result);
					
					while($row = mysqli_fetch_assoc($result)){
						$subc=$row['course_id'];
						$subn=$row['course_name'];
						$po1=$row['po1'];
						$po2=$row['po2'];
						$po3=$row['po3'];
						$po4=$row['po4'];
						$po5=$row['po5'];
						$po6=$row['po6'];
						$po7=$row['po7'];
						$po8=$row['po8'];
						$po9=$row['po9'];
						$po10=$row['po10'];
						$po11=$row['po11'];
						
						echo 
						'<tr>
							
							<td>'.$subc.'</td>
							<td>'.$subn.'</td>
							<td>'.round($po1,2)	.'</td>
							<td>'.round($po2,2)	.'</td>
							<td>'.round($po3,2)	.'</td>
							<td>'.round($po4,2)	.'</td>
							<td>'.round($po5,2)	.'</td>
							<td>'.round($po6,2)	.'</td>
							<td>'.round($po7,2)	.'</td>
							<td>'.round($po8,2)	.'</td>
							<td>'.round($po9,2)	.'</td>
							<td>'.round($po10,2).'</td>
							<td>'.round($po11,2).'</td>
						
						</tr>
						';
					}
		 
        ?>	
		
    </table>
	<br/>
	
	<!--   B.Tech SEMESTER 3 -->
				
				<table class="gradienttable" style="margin:0 auto; padding:5px; width:90%;" >
					
					<tr>
						<th colspan=13><b> B.Tech - SEMESTER 8 </b></th>
					</tr>
				
					<tr>
							<th colspan=2>
							</th>
							<th>
							<b>PO1</b>
								
							</th>
							<th >
							<b>PO2</b>
								
							</th>
							<th >
							<b>PO3</b>
								
							</th>
							<th >
							<b>PO4</b>
								
							</th>
							<th >
							<b>PO5</b>
								
							</th>
							<th >
							<b>PO6</b>
								
							</th>
							<th >
							<b>PO7</b>
								
							</th>
							<th >
							<b>PO8</b>
								
							</th>
							<th >
							<b>PO9</b>
								
							</th>
							<th >
							<b>PO10</b>
								
							</th>
							<th >
							<b>PO11</b>
								
							</th>
				
				</tr>
				<?php
				
					
					$subc=''; $subn=''; $po1=0;$po2=0;$po3=0;$po4=0;$po5=0;$po6=0;$po7=0;$po8=0;$po9=0;$po10=0;$po11=0;
					$year = $_SESSION["year"];
					$result = mysqli_query($link, "SELECT DISTINCT course_id,course_name,po1,po2,po3,po4,po5,po6,po7,po8,po9,po10,po11 FROM mastertab WHERE level='j' AND year='$year' 
									AND semester='8' AND degree='B.Tech'");
					//echo mysqli_num_rows($result);
					
					while($row = mysqli_fetch_assoc($result)){
						$subc=$row['course_id'];
						$subn=$row['course_name'];
						$po1=$row['po1'];
						$po2=$row['po2'];
						$po3=$row['po3'];
						$po4=$row['po4'];
						$po5=$row['po5'];
						$po6=$row['po6'];
						$po7=$row['po7'];
						$po8=$row['po8'];
						$po9=$row['po9'];
						$po10=$row['po10'];
						$po11=$row['po11'];
						
						echo 
						'<tr>
							
							<td>'.$subc.'</td>
							<td>'.$subn.'</td>
							<td>'.round($po1,2)	.'</td>
							<td>'.round($po2,2)	.'</td>
							<td>'.round($po3,2)	.'</td>
							<td>'.round($po4,2)	.'</td>
							<td>'.round($po5,2)	.'</td>
							<td>'.round($po6,2)	.'</td>
							<td>'.round($po7,2)	.'</td>
							<td>'.round($po8,2)	.'</td>
							<td>'.round($po9,2)	.'</td>
							<td>'.round($po10,2).'</td>
							<td>'.round($po11,2).'</td>
						
						</tr>
						';
					}
		 
        ?>	
		
    </table>
	<br/>
	<!--   B.Tech SEMESTER 3 -->
				
				<table class="gradienttable" style="margin:0 auto; padding:5px; width:90%;" >
					
					<tr>
						<th colspan=13><b> M.Tech - SEMESTER 1 </b></th>
					</tr>
				
					<tr>
							<th colspan=2>
							</th>
							<th>
							<b>PO1</b>
								
							</th>
							<th >
							<b>PO2</b>
								
							</th>
							<th >
							<b>PO3</b>
								
							</th>
							<th >
							<b>PO4</b>
								
							</th>
							<th >
							<b>PO5</b>
								
							</th>
							<th >
							<b>PO6</b>
								
							</th>
							<th >
							<b>PO7</b>
								
							</th>
							<th >
							<b>PO8</b>
								
							</th>
							<th >
							<b>PO9</b>
								
							</th>
							<th >
							<b>PO10</b>
								
							</th>
							<th >
							<b>PO11</b>
								
							</th>
				
				</tr>
				<?php
				
					
					$subc=''; $subn=''; $po1=0;$po2=0;$po3=0;$po4=0;$po5=0;$po6=0;$po7=0;$po8=0;$po9=0;$po10=0;$po11=0;
					$year = $_SESSION["year"];
					$result = mysqli_query($link, "SELECT DISTINCT course_id,course_name,po1,po2,po3,po4,po5,po6,po7,po8,po9,po10,po11 FROM mastertab WHERE level='j' AND year='$year' 
									AND semester='1' AND degree='M.Tech'");
					//echo mysqli_num_rows($result);
					
					while($row = mysqli_fetch_assoc($result)){
						$subc=$row['course_id'];
						$subn=$row['course_name'];
						$po1=$row['po1'];
						$po2=$row['po2'];
						$po3=$row['po3'];
						$po4=$row['po4'];
						$po5=$row['po5'];
						$po6=$row['po6'];
						$po7=$row['po7'];
						$po8=$row['po8'];
						$po9=$row['po9'];
						$po10=$row['po10'];
						$po11=$row['po11'];
						
						echo 
						'<tr>
							
							<td>'.$subc.'</td>
							<td>'.$subn.'</td>
							<td>'.round($po1,2)	.'</td>
							<td>'.round($po2,2)	.'</td>
							<td>'.round($po3,2)	.'</td>
							<td>'.round($po4,2)	.'</td>
							<td>'.round($po5,2)	.'</td>
							<td>'.round($po6,2)	.'</td>
							<td>'.round($po7,2)	.'</td>
							<td>'.round($po8,2)	.'</td>
							<td>'.round($po9,2)	.'</td>
							<td>'.round($po10,2).'</td>
							<td>'.round($po11,2).'</td>
						
						</tr>
						';
					}
		 
        ?>	
		
    </table>
	<br/>
	
	<!--   B.Tech SEMESTER 3 -->
				
				<table class="gradienttable" style="margin:0 auto; padding:5px; width:90%;" >
					
					<tr>
						<th colspan=13><b> M.Tech - SEMESTER 2 </b></th>
					</tr>
				
					<tr>
							<th colspan=2>
							</th>
							<th>
							<b>PO1</b>
								
							</th>
							<th >
							<b>PO2</b>
								
							</th>
							<th >
							<b>PO3</b>
								
							</th>
							<th >
							<b>PO4</b>
								
							</th>
							<th >
							<b>PO5</b>
								
							</th>
							<th >
							<b>PO6</b>
								
							</th>
							<th >
							<b>PO7</b>
								
							</th>
							<th >
							<b>PO8</b>
								
							</th>
							<th >
							<b>PO9</b>
								
							</th>
							<th >
							<b>PO10</b>
								
							</th>
							<th >
							<b>PO11</b>
								
							</th>
				
				</tr>
				<?php
				
					
					$subc=''; $subn=''; $po1=0;$po2=0;$po3=0;$po4=0;$po5=0;$po6=0;$po7=0;$po8=0;$po9=0;$po10=0;$po11=0;
					$year = $_SESSION["year"];
					$result = mysqli_query($link, "SELECT DISTINCT course_id,course_name,po1,po2,po3,po4,po5,po6,po7,po8,po9,po10,po11 FROM mastertab WHERE level='j' AND year='$year' 
									AND semester='2' AND degree='M.Tech'");
					//echo mysqli_num_rows($result);
					
					while($row = mysqli_fetch_assoc($result)){
						$subc=$row['course_id'];
						$subn=$row['course_name'];
						$po1=$row['po1'];
						$po2=$row['po2'];
						$po3=$row['po3'];
						$po4=$row['po4'];
						$po5=$row['po5'];
						$po6=$row['po6'];
						$po7=$row['po7'];
						$po8=$row['po8'];
						$po9=$row['po9'];
						$po10=$row['po10'];
						$po11=$row['po11'];
						
						echo 
						'<tr>
							
							<td>'.$subc.'</td>
							<td>'.$subn.'</td>
							<td>'.round($po1,2)	.'</td>
							<td>'.round($po2,2)	.'</td>
							<td>'.round($po3,2)	.'</td>
							<td>'.round($po4,2)	.'</td>
							<td>'.round($po5,2)	.'</td>
							<td>'.round($po6,2)	.'</td>
							<td>'.round($po7,2)	.'</td>
							<td>'.round($po8,2)	.'</td>
							<td>'.round($po9,2)	.'</td>
							<td>'.round($po10,2).'</td>
							<td>'.round($po11,2).'</td>
						
						</tr>
						';
					}
		 
        ?>	
		
    </table>
			
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