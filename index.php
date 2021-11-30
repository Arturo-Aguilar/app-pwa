<?php
	session_start();
	if(isset($_SESSION['USUARIO'])){
		//echo "<h1>existe</h1>";
		header("location:principal.php");
	}
?>
<!DOCTYPE HTML>
<html lang="es">
	<head>
		<title>titulo de la web</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta name="title" content="titulo de la web"/>
		<meta name ="description" content="Descripcion de la web"/>
		<link rel="shortcut icon" type="image/x-icon" href="assets/loggo.png"/>
		<link href="css/css.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="estilos.css">
		
	</head>
	<body>
		<div class="contenedor" style="background-image:url(assets/fondo.jpg)">
			<div class="contenedor-form">
				<form action="confirmar.php" class="box" method="post" name="confir">
					<img src="assets/loggo.png" alt="">
					<h1>Login</h1>
					<input type="text" name="USU" placeholder="Usuario" maxlength="11" onkeyup="this.value = this.value.toUpperCase();" required>
					<input type="password" name="PASS" minlength="8" id="myPass" placeholder="Password" required>
					<input id="input-showPass" type="checkbox" onclick="functionPass()">Mostrar contraseña
					<input type="submit" name="" value="LOG IN">
        		</form>
			</div>
		</div>
	</body>
</html>

<script src="scriptPass.js"></script>

