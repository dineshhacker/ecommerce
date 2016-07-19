<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkadminstud1.php");
	
	//FORM HANDLING
	
	if(isset($_POST['studid']) && !empty($_POST["studid"]) && isset($_POST['studname']) && !empty($_POST["studname"]))
	 { 
		
				
		$stmt = mysqli_prepare($link,"INSERT INTO studentab VALUES(?,?,?,?,?)");
		mysqli_stmt_bind_param($stmt, 'sssss', $_POST['studid'],$_POST['studname'],$_POST['sex'],$_SESSION["batch"],$_SESSION['degree']);
		mysqli_stmt_execute($stmt);
		
		mysqli_stmt_close($stmt);
	}
	
	if(isset($_POST['delid']) && !empty($_POST["delid"]))
	 { 
		
				
		$stmt = mysqli_prepare($link,"DELETE FROM studentab WHERE student=? AND batch=?");
		mysqli_stmt_bind_param($stmt, 'ss', $_POST['delid'],$_SESSION['batch']);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	
	if(isset($_POST['delall']) && !empty($_POST["delall"]))
	{
		$del = mysqli_prepare($link,"DELETE FROM studentab WHERE batch=?");
		mysqli_stmt_bind_param($del, 's', $_SESSION['batch']);
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
	  
	  	<!-- JAVASCRIPTS-->
		<script>
			function validateForm() {
				var x = document.forms["coursemap"]["studid"].value;
				var y = document.forms["coursemap"]["studname"].value;
				
				
				if((y==null || y=="") || (x==null || x=="")){
					alert("Fields are Empty!");
				}
				
			}
		</script>
		
		<script>
			function validateFormdel() {
				var x = document.forms["del"]["delid"].value;
				
				if((x==null || x=="")){
					alert("Fields are Empty!");
				}
				
			}
		</script>
	  
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
			<h1 style="font-size:16px;">Student Database Entry - <?php echo $_SESSION['degree'];?> - (<?php echo $_SESSION['batch'];?>)</h1>

			</div>			
					
			<div style="background-color:#D3D5E2; border-radius:1px; outline: 2px thick; padding:20px; height:220px;
            	border: 1px solid #aaa;
	 -moz-box-shadow: 1px 1px 3px #fff inset;
    -webkit-box-shadow: 1px 1px 3px #fff inset;
    box-shadow: 1px 1px 3px #fff inset;">
			
			
				<div class="register-form" style=" width:40%;float:left;padding-left:60px;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="coursemap" onsubmit="return validateForm()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ENTER STUDENT DATA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
                    <p style="font-weight:700;padding:5px;">
					<table style="width=90%">
					<tr>
					<td style="width:20%">
                    <label><b>ROLL No. </b> &nbsp;&nbsp;</label>
					</td>
					<td style="width:30%">
					<b>:</b> &nbsp;<input type="text" name="studid" placeholder="Roll Number" autofocus />
					</td>
					<tr>
					<td style="width:20%">
                    <label><b>NAME </b> &nbsp;&nbsp;</label>
					</td>
					<td style="width:30%">
					
					<b>:</b> &nbsp;<input type="text" name="studname" placeholder="Name"/>
							
					</td>
					</tr>
					<tr>
					<td style="width:20%">
                    <label><b>SEX </b> &nbsp;&nbsp;</label>
					</td>
					<td style="width:30%">
					
					<b>:</b>&nbsp;
					<select name="sex">
						<option value="M">MALE</option>
						<option value="F">FEMALE</option>					
					</select>
					</td>
					</tr>
					</table>
					</p>
 				</fieldset>
                <fieldset class="fieldsetbtn">
					<input class="btn register" type="submit" name="submit" value="INSERT" />
				</fieldset>
			</form>
			
			
            </div>
			<br/>
			<div class="register-form" style=" width:40%; padding-left:540px;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="del" onsubmit="return validateFormdel()">
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DELETE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
                   
				
                    <label><b>ROLL No. :</b> &nbsp;&nbsp;</label>
					
					<input type="text" name="delid" placeholder="Roll Number" autofocus />
					
					
					</p>
 				</fieldset>
                <fieldset class="fieldsetbtn">
					<input class="btn register" type="submit" name="submit" value="DELETE" />
					<input class="btn register" type="submit" name="deleteall" value="DELETE ALL" form="myform" />
				
				</fieldset>
			</form>
			<form id="myform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="coursedeleteall">
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
						<th>ROLL NUMBER</th>
						<th>STUDENT NAME</th>
						<th>SEX</th>
						<th>BATCH</th>
						<th>DEGREE</th>
						
					</tr>
				
				
				<?php
		
			
			$disp = mysqli_prepare($link,"SELECT * FROM studentab WHERE batch=? AND degree=? ORDER BY student ASC");
			mysqli_stmt_bind_param($disp,'ss',$_SESSION['batch'],$_SESSION['degree']);
			mysqli_stmt_execute($disp);
			mysqli_stmt_bind_result($disp, $a,$b,$c,$d,$e);
			
			
          while( mysqli_stmt_fetch($disp)){
            echo
            '<tr>
              <td>'.$a.'</td>
              <td>'.$b.'</td>
              <td>'.$c.'</td>
              <td>'.$d.'</td>
			  <td>'.$e.'</td>
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