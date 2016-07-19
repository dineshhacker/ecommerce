<?php
	
	session_start();
	$msg="";
	$user="";
	$pass="";
	
	include("pscripts/connect.php");
		
	 
		
	 if(isset($_POST['eusername']) && !empty($_POST["eusername"]) && isset($_POST['epassword']) && !empty($_POST["epassword"]))
	 { 
		$user = $_POST['eusername'];
		$pass = $_POST['epassword'];
		
		$stmt = mysqli_prepare($link,"SELECT * FROM info WHERE username = ? and password = ?");
		mysqli_stmt_bind_param($stmt, 'ss', $user, $pass);
		
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $username,$password,$faculty_id,$role,$name,$batch,$branch,$age,$city,$email,$contact,$address1,$address2 );
		mysqli_stmt_fetch($stmt);
		
			if($username === $user && $password === $pass ){
			
				$_SESSION["ukey"] = $username;
				$_SESSION["pkey"] = $password;
				$_SESSION["fkey"] = $faculty_id;
				$_SESSION["rkey"] = $role;
				$_SESSION["nkey"] = $name;
				$_SESSION["bkey"] = $batch;
				$_SESSION["ckey"] = $branch;
				$_SESSION["akey"] = $age;
				$_SESSION["ctkey"] = $city;
				$_SESSION["ekey"] = $email;
				$_SESSION["pnokey"] = $contact;
				$_SESSION["ad1key"] = $address1;
				$_SESSION["ad2key"] = $address2;
				
				
				
				
				
				
				header("Location:inside.php");
			}
			
			else
			{
				$msg = " Sorry! Can't log in into the Shopping Portal ";
			}
		
		mysqli_stmt_close($stmt);
	}

	
	mysqli_close($link);
		/*
		$query = "INSERT INTO info VALUES ('". $user ."','". $pass ."')";
		echo "<pre>Debug: $query</pre>\m";
		$result = mysqli_query($link,$query);
		if ( false===$result ) {
			printf("error: %s\n", mysqli_error($link));
		}
		else {
			echo 'done.';
		}
		*/
		
		//$stmt = mysqli_prepare($link, "INSERT INTO info VALUES ('?','?')");
		//mysqli_stmt_bind_param($stmt, 'ss', $user, $pass);
		
		//mysqli_stmt_execute($stmt);
		//mysqli_stmt_close($stmt);
		
		//header("Location:pscripts/init.php");
		
?>

<html>
	<head>
	
		<title>Shopper Now Login!</title>

		
		<!-- STYLE SHEET LINKS-->
		<link rel="stylesheet" type="text/css" href="style/style.css" />
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Andika"/>
		
		<!-- JAVASCRIPTS-->
		<script>
			function validateForm() {
				var x = document.forms["login"]["eusername"].value;
				var y = document.forms["login"]["epassword"].value;
				
				if((y==null || y=="") && (x==null || x=="")){
					alert("Fields are Empty!");
				}
				else if (x==null || x=="") {
					alert("Please Enter Username!");
					return false;
				}
				else if (y==null || y=="") {
					alert("Please Enter Password!");
					return false;
				}
				
			}
		</script>
	
	</head>

	<body style="background-color:#ccf3ff">
        <!-- IMAGE-->
    	<div style="margin-left:auto; margin-right:auto; margin-top:70px; width: 500px; text-align:center;" >
            <img src="images/1.png" height="300px" width="500px" >        
        </div>
		
        <!-- TOP TEXT-->
        <div style="margin-left:auto; margin-right:auto; width: 500px; text-align:center; font-family:Andika;; font-size:20px; font-weight:bold; " >
            
            Welcome to Shop Now!        
        </div>
		
        
         <!-- REGISTRATION FORM-->
         
		<div class="register-form">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="login" onsubmit="return validateForm()">
            
				<fieldset class="fieldsetform"><legend >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Log in&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
				
				
				<p style="font-weight:700;">
					<label>User Name : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="eusername" placeholder="username" autofocus>
				</p>
 
				<p style="font-weight:700;">
					<label>Password&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="password" name="epassword" placeholder="password" />
				</p>
				
				</fieldset>
				<fieldset class="fieldsetbtn">
				
				<input class="btn register" type="submit" name="submit" value="Go" />
				
				</fieldset>
				


			</form>
		</div>
		<?php 
			if($msg!="") 
			{ 
				echo '<div class="error" style="height:20px;">';
				echo $msg; 
				echo '</div>';
			}
		?>						 
			<div style="margin-left:auto; margin-right:auto; width: 500px; text-align:center; font-family:Andika;; font-size:15px; font-weight:bold; " >
            
            Are you new to Shop Now? Register Here!       
        </div>		
			<div class="register-form">
			<div class="regform">	
			<form action="index1.php">
				
					<input class="btn register" type="submit" name="submit" value="Register" />
				
			</form>
			</div></div>
	
	</body>
</html>