<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkstud.php");
	
	$id = $_POST['faciddel'];
		

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      include('pcommon/meta.php');
      ?>
	  

</head>

   <body>
		
		<div class="page-container">
			<?php include('pcommon/header.php'); ?>
				
				<div  style="float:left;position:relative;width:15%;  ">
					<?php include('pcommon/basestud.php');?>
				</div>
	
				<div class="content">



		<div style="background-color:#00b8e6; border-radius:1px; outline: 2px thick; padding:20px; height:auto;
            	border: 1px solid #003d4d;
	 -moz-box-shadow: 1px 1px 3px #003d4d inset;
    -webkit-box-shadow: 1px 1px 3px #003d4d inset;
    box-shadow: 1px 1px 3px #003d4d inset;">
		
			<table class="gradienttable" style="margin:0 auto; padding:5px; width:100%;" >
				
					<tr>
						<th>COMPLAINT NAME</th>
						<th>COMPLAINT DESCRIPTION</th>
						<th>DATE</th>
						<th>USER ID</th>
						
					</tr>
				
				
				<?php
		
			
			$disp = mysqli_prepare($link,"SELECT * FROM feedback where faculty_id=?;");
	
			mysqli_stmt_execute($disp);
			mysqli_stmt_bind_result($disp, $issuename,$issuedesc,$date,$faculty_id);
			
			
          while( mysqli_stmt_fetch($disp)){
            echo
            '<tr>
              <td>'.$issuename.'</td>
              <td>'.$issuedesc.'</td>
              <td>'.$date.'</td>
              <td>'.$faculty_id.'</td>
            

			 			  
            </tr>';
          }
		  
			mysqli_stmt_close($disp);
		  
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