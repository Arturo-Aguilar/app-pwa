<?php
	include('header.php');
	//include('footer.php');
	//include('NoSession.php');
?>

	<div class="container-info">
		<div class="info-per">
			<img id="imgPerson" src="fotosPerfil/<?php echo $_SESSION['imgPer'];?>" alt="">
			<h1>Informacion personal</h1>
		</div>
		
		<div class="datos">
			<h3>Nombre:</h3><label for=""><?php echo $_SESSION['nombreCompleto'];?></label>
			<h3>Matricula:</h3><label for=""><?php echo $_SESSION['matricula'];?></label>
			<h3>Sexo:</h3><label for=""><?php echo $_SESSION['sexo'];?></label>
			<h3>Correo:</h3><label for=""><?php echo $_SESSION['correo'];?></label>
			<h3>División:</h3><label for=""><?php echo $_SESSION['division'];?></label>
			
		</div>
	</div>
	
<?php
	//include('header.php');
	include('footer.php');
	//include('NoSession.php');
?>