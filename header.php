<?php
	include('NoSession.php');
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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="estilos.css">
		<!--Manifiest-->
        <link rel="manifest" href="./json/app.webmanifest">
		<!--++++++++++-->
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
   		<!--<link rel="icon" href="fotosPerfil/0005600_JOSE%20ARTURO%20MORENO%20AGUILAR.JPG">-->
    </head>
    <body>
    <div class="menu">
    	
    	
		<div class="dropdown show">
	  <div class="titimg">
    		<a href="index.php" class="navbar-brand"><img src="assets/loggo.png" alt="">Inventario UTP</a>
    	</div>
		  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<?php if (!isset($_SESSION['nombreCompleto'])) {
                            echo "";
                            } else {
                            echo $_SESSION['nombreCompleto'];
                            }?>
		  </a>

		  	<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
		  		<div class="info-per">
		  			<img id="imgPerson" src="fotosPerfil/<?php echo $_SESSION['imgPer'];?>"alt="">
					<a class="dropdown-item" href="logout.php">Cerrar sesión</a>
					<a class="dropdown-item" href="infomaP.php">Información personal</a>
					<a class="dropdown-item" href="changePass.php">Cambiar contraseñaa</a>
					<a class="dropdown-item" href="anuario.php">Anuario</a>
		  		</div>
		  		
			</div>
		</div>
	</div>
	
	<!--<ul>
	  	<form action="">
			  <li><a id="menu" class="active" href="solicitud.php">Solicitud</a></li>
			  <li><a id="menu" href="#news">Historial</a></li>
			  <li><a id="menu" href="centroAyuda.php">Centor de ayuda</a></li>
			  <!--<li><a id="menu" href="#about">About</a></li>
		  </form>
		</ul>-->
	<nav class="navbar navbar-expand-lg navbar-light bg-dark">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
	  	<?php if($_SESSION['rol']==2): ?>
		  <li class="nav-item active">
			<a id="menu" class="nav-link" href="solicitud.php">Solicitud</a>
		  </li>
		   <li class="nav-item active">
			<a id="menu" class="nav-link" href="historial.php">Historial</a>
		  </li>
		   <li class="nav-item active">
			<a id="menu" class="nav-link" href="centroAyuda.php">Centro de ayuda</a>
		  </li>
		   <li class="nav-item active">
			<a id="menu" class="nav-link" href="About.php">Conoce más</a>
		  </li>
		 <?php elseif($_SESSION['rol']==1): ?> 
		 <li class="nav-item active">
			<a id="menu" class="nav-link" href="gestionDisp.php">Gestion de dispositivos</a>
		 </li>
		 <li class="nav-item active">
			<a id="menu" class="nav-link" href="formNuevoU.php">Registrar nuevos usuarios</a>
		  </li>
		  <li class="nav-item active">
			<a id="menu" class="nav-link" href="usuariosReg.php">Visualizar usuarios</a>
		 </li>
		   <li class="nav-item active">
			<a id="menu" class="nav-link" href="#">Reporte</a>
		  </li>
		  <li class="nav-item active">
			<a id="menu" class="nav-link" href="historial.php">Historial</a>
		  </li>
		 <?php endif; ?>
		</ul>
	  </div>
	</nav>
	<div class="lema" style="padding:0 5%  0 5%">
		<marquee direction="right" scrolldelay="5" scrollamount="10"><img src="assets/lema.png" alt=""></marquee>
	</div>
	