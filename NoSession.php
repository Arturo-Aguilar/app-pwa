<?php
	session_start();
	if(!isset($_SESSION['USUARIO'])){
		//echo "<h1>existe</h1>";
		header("location:index.php");
	}
?>