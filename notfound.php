<?php
	session_start();
	echo '<h1>404 Not Found!</h1>';
	session_unset(); 
	session_destroy(); 
?>
