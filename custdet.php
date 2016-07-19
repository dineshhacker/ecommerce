<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkadmin.php");

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
			<h1 style="font-size:16px;color:white;font-family:Andika">VIEW CUSTOMER DETAILS</h1>

			</div>		
			
		<div style="background-color:#00b8e6; border-radius:1px; outline: 2px thick; padding:20px; height:auto;
            	border: 1px solid #003d4d;
	 -moz-box-shadow: 1px 1px 3px #003d4d inset;
    -webkit-box-shadow: 1px 1px 3px #003d4d inset;
    box-shadow: 1px 1px 3px #003d4d inset;">
		
			<table class="gradienttable" style="margin:0 auto; padding:5px; width:100%;" >
				
					<tr>
						<th>CUSTOMER USERNAME</th>
						<th>PASSWORD</th>
						<th>NAME</th>
						
						<th>USER ID</th>
						<th>GENDER</th>
						<th>STATE</th>
						<th>AGE</th>
						<th>CITY</th>
						<th>EMAIL</th>
						<th>CONTACT NO.</th>
						<th>ADDRESS LINE 1</th>
						<th>ADDRESS LINE 2</th>
						
					</tr>
				
				
				<?php
		
			
			$disp = mysqli_prepare($link,"SELECT username,password,faculty_id,name,batch,branch,age,city,email,contact,address1,address2 FROM info;");
	
			mysqli_stmt_execute($disp);
			mysqli_stmt_bind_result($disp, $username,$password,$faculty_id,$name,$batch,$branch,$age,$city,$email,$contact,$address1,$address2);
			
			
          while( mysqli_stmt_fetch($disp)){
            echo
            '<tr>
              <td>'.$username.'</td>
              <td>'.$password.'</td>
              <td>'.$faculty_id.'</td>
               
              <td>'.$name.'</td>
			  <td>'.$batch.'</td>			  
              <td>'.$branch.'</td>	
              <td>'.$age.'</td>	
              <td>'.$city.'</td>	
              <td>'.$email.'</td>			  
              <td>'.$contact.'</td>	
              <td>'.$address1.'</td>	
              <td>'.$address2.'</td>	

            </tr>';
          }
		  
			mysqli_stmt_close($disp);
		  
        ?>	
		
    </table>
</div>					
		

				<!--</div>-->
			



	
		</div>
	
		<div style="float:left;width:100%;">
		<?php
			include('pcommon/footer.php');
		?>
		</div>

  </body>
</html>