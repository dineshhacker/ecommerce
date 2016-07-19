<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkadminstud.php");
	
	//FORM HANDLING
	
	if(isset($_POST['batchyear']) && !empty($_POST["batchyear"]) )
	 { 
		$_SESSION["batch"] = $_POST['batchyear'];
		header("Location:adminstud2.php");
	}
	

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
  background: linear-gradient(#D5AAAA 60%, #FFF 120%); text-align:center">
			<h1 style="font-size:16px;">Enter Batch - <?php echo $_SESSION['degree'];?></h1>

			</div>			
					
			<div style="background-color:#D3D5E2; border-radius:1px; outline: 2px thick; padding:20px; height:auto;
            	border: 1px solid #aaa;
	 -moz-box-shadow: 1px 1px 3px #fff inset;
    -webkit-box-shadow: 1px 1px 3px #fff inset;
    box-shadow: 1px 1px 3px #fff inset;">
			
			
				<div class="register-form" style=" width:25%;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="batchenter" >
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BATCH ENTRY&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
					<p style="font-weight:700;padding:5px;">
                    
                    <label>Year :</label>
						
						<select name="batchyear">
						<?php
							
							if($_SESSION['degree']==='B.Tech')
							{
							echo '
								
								<option value="2011-15">2011-15</option>
								<option value="2012-16">2012-16</option>
								<option value="2013-17">2013-17</option>
								<option value="2014-18">2014-18</option>
								<option value="2015-19">2015-19</option>
								<option value="2016-20">2016-20</option>
								<option value="2017-21">2017-21</option>
								<option value="2018-22">2018-22</option>
								<option value="2019-23">2019-23</option>
								<option value="2020-24">2020-24</option>
								<option value="2021-25">2021-25</option>
								<option value="2022-26">2022-26</option>
								
									
							';
							}
							else if($_SESSION['degree']==='M.Tech')
							{
								echo '
								
								<option value="2013-15">2013-15</option>
								<option value="2014-16">2014-16</option>
								<option value="2015-17">2015-17</option>
								<option value="2016-18">2016-18</option>
								<option value="2017-19">2017-19</option>
								<option value="2018-20">2018-20</option>
								<option value="2019-21">2019-21</option>
								<option value="2020-22">2020-22</option>
								<option value="2020-22">2021-23</option>
								<option value="2020-22">2022-24</option>
								
									
								';		
								
								
							}
						?>	
						</select>
					
					</p>
				</fieldset>
                <fieldset class="fieldsetbtn">
					<input class="btn register" type="submit" name="submit" value="NEXT" />
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