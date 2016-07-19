<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkadminctab.php");
	if (!(isset($_SESSION['semester']))){
		
		header("Location:notfound.php");
	}
	if (!(isset($_SESSION['degree']))){
		
		header("Location:notfound.php");
	}
	


	$semester = $_SESSION['semester'];
	$degree = $_SESSION['degree'];
	$year = $_SESSION['year'];
		
	
	
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
	<div  style="text-align:center;padding-top: 10px;
	padding-left: 10px;
	padding-right: 20px;
	float:left;">
		<img src="images/NITTlogo.jpg" width="90px" >
	</div>
    <br/>
    <div style="padding-left:0px; float:left;"  >
		<h4>
			 <br/>
			 Department of Computer Science & Engineering
			 <br/>
			 National Institute of Technology
			 <br/> 
			 Tiruchirapalli - 620015
			 <br/>
			 
		</h4>
	</div>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
     <br/>
     <hr/>	
		
		<br/><br/>

		<p style="text-align:center; font-size:20px;">
			I . Semester PO Attainment (Form-2)
			
	
		</p>
		<br/>	
        
        <table style="margin: 0px auto; width:20%; text-align:left; ">
        	<tr>
            	<td style="width:44%;"><b>PROGRAM</b></td>
            	<td style="width:56%;"><b>:</b>&nbsp;<?php echo $degree; ?></td>
            </tr>
			<tr>
            	<td><b>YEAR</b></td>
            	<td><b>:</b>&nbsp;<?php echo $year; ?></td>
            </tr>
			<tr>
            	<td><b>SEMESTER</b></td>
            	<td><b>:</b>&nbsp;<?php echo $semester; ?></td>
            </tr>
				
		</table>
		
		
		<br/>
		<br/>
		<table border="1px" style="margin: 0px auto; width:60%; text-align:center; ">
					
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
									AND semester='$semester' AND degree='$degree'");
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
					
					
					
					//DELETE 
					
					$result = mysqli_query($link, "DELETE FROM mastertab WHERE level='k' AND year='$year' 
									AND semester='$semester' AND degree='$degree'");
					
					
					
					//CALCULATE
					
					
					$result = mysqli_query($link, "SELECT DISTINCT po1,po2,po3,po4,po5,po6,po7,po8,po9,po10,po11 FROM mastertab WHERE level='j' AND year='$year' 
									AND semester='$semester' AND degree='$degree'");
					$spo1=0;
					$spo2=0;
					$spo3=0;
					$spo4=0;
					$spo5=0;
					$spo6=0;
					$spo7=0;
					$spo8=0;
					$spo9=0;
					$spo10=0;
					$spo11=0;
					
					$num = mysqli_num_rows($result);
					
					while($row = mysqli_fetch_assoc($result)){
							
						global $spo1,$spo2,$spo3,$spo4,$spo5,$spo6,$spo7,$spo8,$spo9,$spo10,$spo11;	
						
						$spo1 = $spo1 + $row['po1'];
						$spo2 = $spo2 + $row['po2'];
						$spo3 = $spo3 + $row['po3'];
						$spo4 = $spo4 + $row['po4'];
						$spo5 = $spo5 + $row['po5'];
						$spo6 = $spo6 + $row['po6'];
						$spo7 = $spo7 + $row['po7'];
						$spo8 = $spo8 + $row['po8'];
						$spo9 = $spo9 + $row['po9'];
						$spo10 = $spo10 + $row['po10'];
						$spo11 = $spo11 + $row['po11'];
						
					
					}
					
					$spo1 = $spo1 / $num;
					$spo2 = $spo2 / $num;
					$spo3 = $spo3 / $num;
					$spo4 = $spo4 / $num;
					$spo5 = $spo5 / $num;
					$spo6 = $spo6 / $num;
					$spo7 = $spo7 / $num;
					$spo8 = $spo8 / $num;
					$spo9 = $spo9 / $num;
					$spo10 = $spo10 / $num;
					$spo11 = $spo11 / $num;
					
					
					//INSERT
					
					// $result = mysqli_query($link, "INSERT INTO matertab(level,year,) DISTINCT po1,po2,po3,po4,po5,po6,po7,po8,po9,po10,po11 FROM mastertab WHERE level='j' AND year='$year' 
									// AND semester='$semester' AND degree='$degree'");
									
					$level='k';
					$ins = mysqli_prepare($link,"INSERT INTO mastertab(level,semester,degree,year,spo1,spo2,spo3,spo4,spo5,spo6,spo7,spo8,spo9,spo10,spo11) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
					mysqli_stmt_bind_param($ins, 'ssssddddddddddd' , $level,$semester,$degree,$year,$spo1,$spo2,$spo3,$spo4,$spo5,$spo6,$spo7,$spo8,$spo9,$spo10,$spo11);
					mysqli_stmt_execute($ins);
					mysqli_stmt_close($ins);				
					
        ?>	
		
    </table>
	
	
		<br/>
	<br/>
		<p style="text-align:center; width:100%; ">
			<b>SEMESTER PO ATTAINMENT</b>
		</p>
		<br/>
<p style="text-align:center; width:100%; ">
		
		<table border="1px" style="margin: 0px auto; width:60%; text-align:center; ">
        	<tr>
            	<td style="padding:5px; "><b>PO1</b></td>
            	<td><b>PO2</b></td>
            	<td><b>PO3</b></td>
				<td><b>PO4</b></td>
				<td><b>PO5</b></td>
				<td><b>PO6</b></td>
				<td><b>PO7</b></td>
				<td><b>PO8</b></td>
				<td><b>PO9</b></td>
				<td><b>PO10</b></td>
				<td><b>PO11</b></td>
				
			</tr>
			<tr>
            	<td style="padding:5px;"><?php echo round($po1,2); ?></td>
            	<td><?php echo round($spo2,2); ?></td>
				<td><?php echo round($spo3,2); ?></td>
				<td><?php echo round($spo4,2); ?></td>
				<td><?php echo round($spo5,2); ?></td>
				<td><?php echo round($spo6,2); ?></td>
				<td><?php echo round($spo7,2); ?></td>
				<td><?php echo round($spo8,2); ?></td>
				<td><?php echo round($spo9,2); ?></td>
				<td><?php echo round($spo10,2); ?></td>
				<td><?php echo round($spo11,2); ?></td>
			</tr>
				
		</table>
		</p>
		<br/>
		<br/>
		<br/>
		<p style="text-align:center; width:100%; ">
		<table style="margin: 0px auto; width:60%; text-align:center; ">
		<tr>
			<td><b>(Signature of OBE Batch - i/c)</b></td>
			<td><b>(Signature of HoD)</b></td>
		</tr>
		</table>
		</p>
		
		
		
		

  </body>
</html>