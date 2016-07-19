<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkuser.php");
	

	$f_id = $_SESSION['fkey'];
	$f_name = $_SESSION['nkey'];
	$c_id = $_SESSION['cikey'];
	$c_name = $_SESSION['ckey'];
	$semester = $_SESSION['skey'];
	$degree = $_SESSION['dkey'];
	$year = $_SESSION['ykey'];
		
	$result = mysqli_query($link, "SELECT co1,co2,co3,po1,po2,po3,po4,po5,po6,po7,po8,po9,po10,po11 FROM mastertab WHERE course_id='$c_id' AND level='j' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND name='$f_name'");
	$row = mysqli_fetch_assoc($result);
	$co1=$row['co1'];
	$co2=$row['co2'];
	$co3=$row['co3'];
	
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
			I . Attainmnet of Course Outcome Evaluation and Subject Contribution to PO (Form-1)
			
	
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
			<tr>
            	<td><b>SUBJECT CODE</b></td>
            	<td><b>:</b>&nbsp;<?php echo $c_id; ?></td>
            </tr>
			<tr>
            	<td><b>SUBJECT NAME</b></td>
            	<td><b>:</b>&nbsp;<?php echo $c_name; ?></td>
            </tr>
			<tr>
            	<td><b>FACULTY NAME</b></td>
            	<td><b>:</b>&nbsp;<?php echo $f_name; ?></td>
            </tr>
				
		</table>
		
		
		<br/>
		<p style="text-align:center; width:100%; ">
		
		<table border="1px" style="margin: 0px auto; width:60%; text-align:center; ">
        	<tr>
            	<td style="width:10%;  "><br/><b>CO-1</b><br/><br/></td>
            	<td style="width:90%"></td>
            </tr>
			<tr>
            	<td><br/><b>CO-2</b><br/><br/></td>
            	<td></td>
            </tr>
			<tr>
            	<td><br/><b>CO-3</b><br/><br/></td>
            	<td></td>
            </tr>
				
		</table>
		</p>
		
		<br/>
		<p style="text-align:center; width:100%; ">
			<b>A. Attainment of COs</b>
		</p>
		<br/>
		<p style="text-align:center; width:100%; ">
		
		<table border="1px" style="margin: 0px auto; width:20%; text-align:center; ">
        	<tr>
            	<td style="width:33%; padding:5px; "><b>CO-1</b></td>
            	<td style="width:33%;  "><b>CO-2</b></td>
            	<td style="width:33%;  "><b>CO-3</b></td>
            </tr>
			<tr>
            	<td style="padding:5px;"><?php echo round($co1,2); ?></td>
            	<td><?php echo round($co2,2); ?></td>
				<td><?php echo round($co3,2); ?></td>
            </tr>
				
		</table>
		</p>
		<br/>
		<p style="text-align:center; width:100%; ">
			<b>B. Attainment of POs</b>
		</p>
		<br/>
		<table border="1px" style="margin: 0px auto; width:60%; text-align:center; ">
				
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
			  <td><b>CO'.$no.'</b></td>	
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
	<br/>
		<p style="text-align:center; width:100%; ">
			<b>CONTRIBUTION OF SUBJECT TO POs</b>
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
            	<td><?php echo round($po2,2); ?></td>
				<td><?php echo round($po3,2); ?></td>
				<td><?php echo round($po4,2); ?></td>
				<td><?php echo round($po5,2); ?></td>
				<td><?php echo round($po6,2); ?></td>
				<td><?php echo round($po7,2); ?></td>
				<td><?php echo round($po8,2); ?></td>
				<td><?php echo round($po9,2); ?></td>
				<td><?php echo round($po10,2); ?></td>
				<td><?php echo round($po11,2); ?></td>
			</tr>
				
		</table>
		</p>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<p style="text-align:center; width:100%; ">
		<table style="margin: 0px auto; width:60%; text-align:center; ">
		<tr>
			<td><b>(Signature of faculty)</b></td>
			<td><b>(Signature of PAC Chairman)</b></td>
			<td><b>(Signature of HoD)</b></td>
		</tr>
		</table>
		</p>
		
		
		
		
		
		
		
		
  </body>
</html>