<?php
	session_start();
	
	if (isset($_SESSION['rkey']) && ($_SESSION['rkey'] === "admin") ){
		header("Location:adminlogin.php");
	}
	else if( isset($_SESSION['rkey']) && ($_SESSION['rkey'] === "student")){
		header("Location:studlogin.php");
	}
	else if( isset($_SESSION['rkey']) && ($_SESSION['rkey'] === "alumini")){
		header("Location:aluminilogin.php");
	}
?>
