<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkusertab.php");
	
	//FORM HANDLING
	
	if(isset($_POST['co01po01']) && !empty($_POST["co01po01"]))
	{
		
		$f_id= $_SESSION['fkey'];
		$f_name= $_SESSION['nkey'];
		$c_id= $_SESSION['cikey'];
		$c_name= $_SESSION['ckey'];
		$semester= $_SESSION['skey'];
		$degree= $_SESSION['dkey'];
		$year= $_SESSION['ykey'];
		
		$level='m';
		$co='co1';
		$mpo1=$_POST['co01po01'];$mpo2=$_POST['co01po02'];$mpo3=$_POST['co01po03'];
		$mpo4=$_POST['co01po04'];$mpo5=$_POST['co01po05'];$mpo6=$_POST['co01po06'];
		$mpo7=$_POST['co01po07'];$mpo8=$_POST['co01po08'];$mpo9=$_POST['co01po09'];
		$mpo10=$_POST['co01po10'];$mpo11=$_POST['co01po11'];
		
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,co,mpo1,mpo2,mpo3,mpo4,mpo5,mpo6,mpo7,mpo8,mpo9,mpo10,mpo11) 
		VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssddddddddddd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$co,$mpo1,$mpo2
																				,$mpo3,$mpo4,$mpo5,$mpo6,$mpo7,$mpo8,$mpo9,$mpo10,$mpo11);
		mysqli_stmt_execute($stmt);
		
		
		$co='co2';
		$mpo1=$_POST['co02po01'];$mpo2=$_POST['co02po02'];$mpo3=$_POST['co02po03'];
		$mpo4=$_POST['co02po04'];$mpo5=$_POST['co02po05'];$mpo6=$_POST['co02po06'];
		$mpo7=$_POST['co02po07'];$mpo8=$_POST['co02po08'];$mpo9=$_POST['co02po09'];
		$mpo10=$_POST['co02po10'];$mpo11=$_POST['co02po11'];
		
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,co,mpo1,mpo2,mpo3,mpo4,mpo5,mpo6,mpo7,mpo8,mpo9,mpo10,mpo11) 
		VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssddddddddddd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$co,$mpo1,$mpo2
																				,$mpo3,$mpo4,$mpo5,$mpo6,$mpo7,$mpo8,$mpo9,$mpo10,$mpo11);
		mysqli_stmt_execute($stmt);
		
		
		$co='co3';
		$mpo1=$_POST['co03po01'];$mpo2=$_POST['co03po02'];$mpo3=$_POST['co03po03'];
		$mpo4=$_POST['co03po04'];$mpo5=$_POST['co03po05'];$mpo6=$_POST['co03po06'];
		$mpo7=$_POST['co03po07'];$mpo8=$_POST['co03po08'];$mpo9=$_POST['co03po09'];
		$mpo10=$_POST['co03po10'];$mpo11=$_POST['co03po11'];
		
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,co,mpo1,mpo2,mpo3,mpo4,mpo5,mpo6,mpo7,mpo8,mpo9,mpo10,mpo11) 
		VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssddddddddddd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$co,$mpo1,$mpo2
																				,$mpo3,$mpo4,$mpo5,$mpo6,$mpo7,$mpo8,$mpo9,$mpo10,$mpo11);
		mysqli_stmt_execute($stmt);
		
		
		
	
	}
	
	if(isset($_POST['nxt']) && !empty($_POST["nxt"]))
	{
		
			header("Location:userctmap1.php");
	}
	
	
	if(isset($_POST['delall']) && !empty($_POST["delall"]))
	{
		
		$f_id= $_SESSION['fkey'];
		$f_name= $_SESSION['nkey'];
		$c_id= $_SESSION['cikey'];
		$c_name= $_SESSION['ckey'];
		$semester= $_SESSION['skey'];
		$degree= $_SESSION['dkey'];
		$year= $_SESSION['ykey'];
		
		$del = mysqli_prepare($link,"DELETE FROM mastertab WHERE level='m' AND semester=? AND faculty_id=? AND degree=? AND course_id=? AND year=? ");
		mysqli_stmt_bind_param($del, 'sssss', $semester,$f_id,$degree,$c_id,$year);
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
	  
			<style>

#exm td, #customers th {
    font-size: 1em;
    padding: 3px 7px 2px 7px;
}

#exm th {
    font-size: 1.1em;
    text-align: center;
    padding-top: 5px;
    padding-bottom: 4px;
    background-color: #A7C942;
    color: #000;
}

#exm tr.alt td {
    color: #000000;
    background-color: #EAF2D3;
}
</style>
		
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
			<h1 style="font-size:16px;">CO to PO Mapping -- <?php echo $_SESSION["cikey"]; ?> - <?php echo $_SESSION["ckey"]; ?> -
			<?php echo $_SESSION["dkey"]; ?> - <?php echo $_SESSION["ykey"]; ?></h1>

			</div>			
					
			<div style="background-color:#D3D5E2; border-radius:1px; outline: 2px thick; padding:20px; height:432px;
            	border: 1px solid #aaa;
	 -moz-box-shadow: 1px 1px 3px #fff inset;
    -webkit-box-shadow: 1px 1px 3px #fff inset;
    box-shadow: 1px 1px 3px #fff inset;">
			
			
				<div class="register-form" style="width:76%;">
				<div style="text-align:center;">
				<form id="next" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
				<select name="nxt" style="display:none">
						<option value="1">1</option>
				</select>		
				
					<input class="btn register" type="submit" name="next" value="PROCEED TO QUESTION PAPER PATTERN" form="next" style="width:300px;"/>
			</form>
				</div>
			
				<form  method="post" name="courseenter" >
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Details&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					 <p style="padding:5px;">
					<table style="width:100%;">
					<tr>
					<td style="width:10%;"><b>Faculty ID </b></td><td><b>:</b> <?php echo $_SESSION["fkey"];  ?></td>
					<td style="width:14%;"><b>Faculty Name </b></td><td><b>:</b> <?php echo $_SESSION["nkey"];  ?></td>
					</tr>
					<tr>
					<td ><b>Course ID </b></td><td><b>:</b> <?php echo $_SESSION["cikey"];  ?></td>
				
					<td><b>Course Name </b></td><td><b>:</b> <?php echo $_SESSION["ckey"];  ?></td>
					
					<td style="width:6%;"><b>Year </b></td><td><b>:</b> <?php echo $_SESSION["ykey"];  ?></td>
					</tr>
					<tr>
					<td><b>Semester </b></td><td><b>:</b> <?php echo $_SESSION["skey"];  ?></td>
					<td><b>Degree </b></td><td><b>:</b> <?php echo $_SESSION["dkey"];  ?></td>
					</tr>
					</table>
					</p>					
					 
 				</fieldset>
			</form>
            </div>
			
			<div class="register-form" style="width:96%;">
				
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="qppattern" onsubmit="return validateForm()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CO - PO MAPPING&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
				<p style="font-weight:700;padding:5px;align:center;width:400px;">
					
					<table style=" border: 1px solid black;width:100%;text-align:center;" id="exm">
						
						<tr>
							<th>
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
						<tr>
							<td>
							
							<b>CO1</b>
							</td>
							<td>
										
								<select name="co01po01" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>
							<td>
										
								<select name="co01po02" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>
							<td>
										
								<select name="co01po03" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>
							<td>
										
								<select name="co01po04" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>
							<td>
										
								<select name="co01po05" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>
							<td>
										
								<select name="co01po06" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>
							<td>
										
								<select name="co01po07" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>
							<td>
										
								<select name="co01po08" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>
							<td>
										
								<select name="co01po09" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>
							<td>
										
								<select name="co01po10" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>
							<td>
										
								<select name="co01po11" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>
							
							
						</tr>
						
						<tr>
							<td>
							
							<b>CO2</b>
							</td>
							<td>
										
								<select name="co02po01" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>						
							<td>
										
								<select name="co02po02" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>						
							<td>
										
								<select name="co02po03" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>						
							<td>
										
								<select name="co02po04" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>						
							<td>
										
								<select name="co02po05" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>						
							<td>
										
								<select name="co02po06" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>						
							<td>
										
								<select name="co02po07" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>						
							<td>
										
								<select name="co02po08" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>						
							<td>
										
								<select name="co02po09" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>						
							<td>
										
								<select name="co02po10" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>						
							<td>
										
								<select name="co02po11" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>						
						
						</tr>
						
						<tr>
							<td>
							
							<b>CO3</b>
							</td>
							<td>
										
								<select name="co03po01" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>						
							<td>
										
								<select name="co03po02" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>						
							<td>
										
								<select name="co03po03" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>						
							<td>
										
								<select name="co03po04" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>						
							<td>
										
								<select name="co03po05" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>						
							<td>
										
								<select name="co03po06" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>						
							<td>
										
								<select name="co03po07" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>						
							<td>
										
								<select name="co03po08" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>						
							<td>
										
								<select name="co03po09" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>						
							<td>
										
								<select name="co03po10" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>						
							<td>
										
								<select name="co03po11" autofocus >
									<option value="0.6">S</option>
									<option value="0.4">M</option>
									<option value="0.0">B</option>
								</select> 			
								
							</td>						
							
						</tr>
						
							
					</table>
					
				</p>
 				</fieldset>
                <fieldset class="fieldsetbtn">
					
					
					<input class="btn register" type="submit" name="reset" value="RESET ALL" form="rst" />
					
					<input class="btn register" type="submit" name="submit" value="INSERT" />
				</fieldset>
			</form>
			
			
			<form id="rst" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="deleteall">
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
							<th>
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
				
				
				<?php
				
				$f_id= $_SESSION['fkey'];
		$c_id= $_SESSION['cikey'];
		$sem= $_SESSION['skey'];
		$deg= $_SESSION['dkey'];
		$year=$_SESSION['ykey'];
		
			$disp = mysqli_prepare($link,"SELECT mpo1,mpo2,mpo3,mpo4,mpo5,mpo6,mpo7,mpo8,mpo9,mpo10,mpo11 FROM mastertab WHERE level='m' AND faculty_id=? AND course_id=? 
										AND	semester=? AND degree=? AND year=? ORDER BY exam ASC");
				mysqli_stmt_bind_param($disp, 'sssss', $f_id,$c_id,$sem,$deg,$year);
		
			mysqli_stmt_execute($disp);
			mysqli_stmt_bind_result($disp, $a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k);
			
			$no=0;
          while( mysqli_stmt_fetch($disp)){
            global $no;
			$no=$no+1;
			echo
            '<tr>
			  <td>CO'.$no.'</td>	
              <td>'.round($a,1).'</td>
              <td>'.round($b,1).'</td>
              <td>'.round($c,1).'</td>
              <td>'.round($d,1).'</td>
              <td>'.round($e,1).'</td>
              <td>'.round($f,1).'</td>
              <td>'.round($g,1).'</td>
              <td>'.round($h,1).'</td>
              <td>'.round($i,1).'</td>
              <td>'.round($j,1).'</td>
              <td>'.round($k,1).'</td>
              
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