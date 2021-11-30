<?php
    include('conection.php');
	session_start();
	if(isset($_GET['id'])){
		if(isset($_GET['tp']) && $_GET['tp']==1){
			$id=$_GET['id'];
			$query="update historial set estado=0 where id_h=$id";
			$result=mysqli_query($con,$query);
			if(!$result){
				die("Query falladoa");
			}
			else{
				$_SESSION['ventana']='los datos se borraron correctamente';
				header('location:historial.php');
			}
		}
		if(isset($_GET['tp']) && $_GET['tp']==2){
			$id=$_GET['id'];
			$query="update equipos set estado=0 where id_e=$id";
			$result=mysqli_query($con,$query);
			if(!$result){
				die("Query falladoo");
			}
			else{
				$query="select*from equipos where id_e=$id";
				$result=mysqli_query($con,$query);
				if($result){
					while($row=mysqli_fetch_array($result)){
						$equipoCon=$row['nomEquipo'];
						$cantidadConsu=$row['cantidad'];
					}
					$query="select*from inventarioe where nomEquipo='$equipoCon'";
					$result=mysqli_query($con,$query);
					while($row=mysqli_fetch_array($result)){
						$id_equipo=$row['id_equipo'];
					}
					if($result){
						$query="update inventarioe set 	cantidad = cantidad+$cantidadConsu where id_equipo = $id_equipo";
						$result=mysqli_query($con,$query);
						$_SESSION['ventana']='los datos se borraron correctamente';
						header('location:historial.php');
					}
					
				}else
					die("query fallido");
				
			}
		}
	}
	else
		header('location:index.php')
?>