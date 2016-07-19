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
			<h1 style="font-size:16px;color:white;font-family:Andika">VIEW PRODUCTS INFO</h1>

			</div>	
			
			

		<div style="background-color:#EEE; border-radius:1px; outline: 2px thick; padding:20px;
        border: 1px solid #aaa;
	 -moz-box-shadow: 1px 1px 3px #fff inset;
    -webkit-box-shadow: 1px 1px 3px #fff inset;
    box-shadow: 1px 1px 3px #fff inset;">
		
			<table class="gradienttable" style="margin:0 auto; padding:5px; width:100%;" >
				
					<tr>
						<th>PRODUCTNAME</th>
						<th>PRODUCT ID</th>
						<th>QUANTITY</th>
						<th>AVAILABILITY</th>
						<th>PRICE</th>
						
						<th>CATEGORY</th>
					</tr>
				
				
				<?php
		
			//echo $_SESSION['role'];
			$disp = mysqli_prepare($link,"SELECT * FROM product  ");
		//	mysqli_stmt_bind_param($disp, 'ss', $_SESSION['category'],$_SESSION['availability']);
			mysqli_stmt_execute($disp);
			mysqli_stmt_bind_result($disp, $productname,$productid,$quantity,$price,$availability,$category);
			
			
          while( mysqli_stmt_fetch($disp)){
            echo
            '<tr>
              <td>'.$productname.'</td>
              <td>'.$productid.'</td>
              <td>'.$quantity.'</td>
              <td>'.$price.'</td>
              <td>'.$availability.'</td>			  
              <td>'.$category.'</td>			  
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