<?php
	include('conection.php');
	session_start();
	if(!empty($_POST['equipo']) && !empty($_POST['modelo']) && !empty($_POST['marca']) && !empty($_POST['tipoEqui']) && !empty($_POST['cantidad'])){
		echo $nomEquipo=$_POST['equipo'];  
		echo $numSerie='1245787884485';  
		echo $cantidad=$_POST['cantidad'];  
		echo $FechaCreacion=date('Y'.'-'.'m'.'-'.'d');  
		echo $fechaActualizacion=date('Y'.'-'.'m'.'-'.'d'); 
		echo $modelo=$_POST['modelo']; 
		echo $marca=$_POST['marca'];
		echo $tipoEquipo=$_POST['tipoEqui'];  
		//echo $img=$_POST['avatar']; 

		$dir_subida = 'assets/';
		$NomFoto= basename($_FILES['avatar']['name']);
		echo $fichero_subido = $dir_subida .$NomFoto;
				
		if(move_uploaded_file($_FILES['avatar']['tmp_name'], $fichero_subido)){
			$query="insert into inventarioe values(default,'$nomEquipo','$numSerie','$cantidad','$marca','$FechaCreacion','$fechaActualizacion','$modelo','$tipoEquipo','$NomFoto',1)";
			$result=mysqli_query($con,$query);
			if($result){
				$_SESSION['ventana']='los datos se insertaron correctamente';
				header('location:gestionDisp.php');
			}
			else
				die('query fallido');
		}
	}else{
		echo 'estan vacios';
	}
?>