<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkstud.php");
	
	
	

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
		
		<div class="page-container">
			<?php include('pcommon/header.php'); ?>
				
				<div  style="float:left;position:relative;width:15%;  ">
					<?php include('pcommon/basestud.php');?>
				</div>
	
				<div class="content">
							<!-- HTML STARTS-->
			<div style="background-color:#D3D5E2;  outline: 2px thick; padding:5px;
            	background: -moz-linear-gradient(#999 50%, #112 140%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(50%, #D3D5E2), color-stop(140%, #112));
  background: -webkit-linear-gradient(#999 50%, #112 140%);
  background: linear-gradient(#003d4d 60%, #00b8e6 120%, #00b8e6 60%, #00b8e6 120%); text-align:center">
			<h1 style="font-size:16px;color:white;font-family:Andika">YOUR COMPLAINT DETAILS</h1>

			</div>			
					
			<div style="background-color:#D3D5E2; border-radius:1px; outline: 2px thick; padding:20px; height:auto;
            	border: 1px solid #aaa;
	 -moz-box-shadow: 1px 1px 3px #fff inset;
    -webkit-box-shadow: 1px 1px 3px #fff inset;
    box-shadow: 1px 1px 3px #fff inset;">
			
			
			<!--	<div class="register-form" style="float:left; width:48%;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="accountedit" onsubmit="return validateForm()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DETAILS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
					<?php
					
						$ret = mysqli_prepare($link,"SELECT issuename,issuedesc,date FROM feedback  WHERE faculty_id = ? ");
						mysqli_stmt_bind_param($ret, 's', $_SESSION["fkey"]);
						mysqli_stmt_execute($ret);
						mysqli_stmt_bind_result($ret, $issuename,$issuedesc,$date);
						mysqli_stmt_fetch($ret);
						
						
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>Complaint NAME :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$issuename.'</i>';
						echo '</p>';
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>Complaint Description :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$issuedesc.'</i>';
						echo '</p>';
						echo '<p style="font-weight:700;padding:5px;">';
						echo '<label>Complaint Given on :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><i>'.$date.'</i>';
						echo '</p>';
						
						
						mysqli_stmt_close($ret);
					
					?>
					
					
 				</fieldset>
			</form>
            </div>
			
			-->
		
				
				
				
			
			</div>
                    

<table class="gradienttable" style="margin:0 auto; padding:5px; width:100%;" >
				
					<tr>
						<th>ISSUE NAME</th>
						<th>ISSUE DESCRIPTION</th>
						<th>DATE</th>
						<th>Response</th>
						
						
						
					</tr>
				
				
				<?php
		
			
			$disp = mysqli_prepare($link,"SELECT issuename,issuedesc,current_date,response FROM feedback where faculty_id=?;");
			mysqli_stmt_bind_param($disp, 's', $_SESSION["fkey"]);
				mysqli_stmt_execute($disp);
			mysqli_stmt_bind_result($disp, $issuename,$issuedesc,$current_date,$response);
			
			
          while( mysqli_stmt_fetch($disp)){
            echo
            '<tr>
              <td>'.$issuename.'</td>
              <td>'.$issuedesc.'</td>
              <td>'.$current_date.'</td>
               <td>'.$response.'</td>
             
              
			 			  
            </tr>';
          }
		  
			mysqli_stmt_close($disp);
		  
        ?>	
		
    </table>



					
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