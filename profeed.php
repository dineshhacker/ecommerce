<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkstud.php");
	
	if(isset($_POST['productname']) && !empty($_POST["productname"]) && isset($_POST['prodesc']) && !empty($_POST["prodesc"])
		
		&& isset($_POST['rating']) && !empty($_POST["rating"])  )
	 { 
		$productname = $_POST['productname'];
		$prodesc = $_POST['prodesc'];
		$rating = $_POST['rating'];
		
	
				$faculty_id = $_SESSION["fkey"];
				date_default_timezone_set('Asia/Calcutta'); // CDT
//print date('Y-m-d  H:i:s');
$current_date = date('Y-m-d');
			//print $current_date;
//print $rating;
//print $faculty_id;
		$stmt = mysqli_prepare($link,"INSERT INTO profeed VALUES(?,?,?,?,?)");
		mysqli_stmt_bind_param($stmt, 'sssss', $productname, $prodesc, $current_date, $rating, $faculty_id);
		mysqli_stmt_execute($stmt);
		
		mysqli_stmt_close($stmt);



	
	}
	

?>

<!-- HTML STARTS-->
<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      include('pcommon/meta.php');
      ?>
	  <script>
			function validateForm() {
				var x = document.forms["accountedit"]["issuename"].value;
				var y = document.forms["accountedit"]["issuedesc"].value;
				var z = document.forms["accountedit"]["date"].value;
				var b = document.forms["accountedit"]["rating"].value;
				var a = document.forms["accountedit"]["faculty_id"].value;
				
				if((y==null || y=="") || (a==null || a=="") || (x==null || x=="") || (b==null || b=="")|| (z==null || z=="")){
					alert("Fields are Empty!");
				}
				
			}
		</script>
	  
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
			<h1 style="font-size:16px;color:white;font-family:Andika">SUBMIT PRODUCT FEEDBACK</h1>

			</div>	
					
			<div style="background-color:#00b8e6; border-radius:1px; outline: 2px thick; padding:20px; height:auto;
            	border: 1px solid #003d4d;
	 -moz-box-shadow: 1px 1px 3px #003d4d inset;
    -webkit-box-shadow: 1px 1px 3px #003d4d inset;
    box-shadow: 1px 1px 3px #003d4d inset;">
		
			
				<div class="register-form" style="float:left; width:46%;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="accountedit" onsubmit="return validateForm()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Submit Product Feedback&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					<p style="font-weight:700;padding:5px;">
					<label>Product name :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="productname" placeholder="Product name" autofocus /><br/>
					</p>
                    <p style="font-weight:700;padding:5px;">
                    <label>Product Feedback :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="prodesc" placeholder="Product Description" autofocus /><br />
					</p>
				
					<p style="font-weight:700;padding:5px;">
                    <label>Ratings :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="int" name="rating" placeholder="Your Rating b/w 0 to 5" autofocus /><br />
					</p>
					
					


					
 				</fieldset>
                <fieldset class="fieldsetbtn">
					<input class="btn register" type="submit" name="submit" value="INSERT" />
				</fieldset>
			</form>
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