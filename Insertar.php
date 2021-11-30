<?php
    include("conection.php");
    session_start();
    if(isset($con)){
		if(!isset($_GET['id']) ){
			$ben=$_POST["nombre"];
			$res=$_POST["responsable"];
			$area=$_POST['area'];
			$equipo=$_POST["equipo"];
			$fecha=$_POST['fecha'];
			$horaI=$_POST['horaI'];
			$horaF=$_POST['horaF'];
			$cantidad=$_POST["cantidad"];
			//echo "resultad".$ben.$res.$area.$equipo.$fecha.$horaI.$horaF;
			if($ben!=null && $res!=null && $area!=null && $equipo!= null && $fecha!=null){
				
			   	$query="insert into historial values(default,'$ben','$res','$area','$equipo','$fecha','$horaI','$horaF',1)";

				$result=mysqli_query($con,$query);
				if(!$result){
					die('Query fallido');
				}
				else{
					$_SESSION['ventana']='los datos se guardaron correctamente';
					header('location:historial.php');
				}
			}
			elseif(isset($_POST['up'])){
				$fecha=date('Y'.'-'.'m'.'-'.'d');
				$query="insert into equipos values(default,'$equipo','$ben','$area',$cantidad,1,'$fecha')";
				$result=mysqli_query($con,$query);
				if(!$result){
					$_SESSION['ventana']='Error al modificar la base de datos';
					die('Query fallidoo');
					
				}
				else{
					//$_SESSION['errorcar']='Guardado';
					$query="select*from inventarioe where nomEquipo = '$equipo'";
					$result=mysqli_query($con,$query);
					if($result){
						$id_equipo;
						while($row=mysqli_fetch_array($result)){
							$id_equipo=$row['id_equipo'];
						}
						$query="update inventarioe set 	cantidad = cantidad-$cantidad where id_equipo = $id_equipo";
						$result=mysqli_query($con,$query);
						if(!$result){
							die('Query fallidoo');
						}
						else{
							$_SESSION['ventana']='los datos se guardaron correctamente';
							header('location:historial.php');
							//echo "<script> confirm('Se actualizo los campo'); </script>";
							//echo "<script type='text/javascript'>window.location='historial.php';</script>";
						}
					}else{
							$_SESSION['ventana']='Error al modificar la base de datos';
							header('location:historial.php');
							//echo "<script> confirm('Error de consulta'); </script>";
							//echo "<script type='text/javascript'>window.location='historial.php';</script>";
					}
				}

			}
			else{
				$_SESSION['errorcar']="Faltaron datos";
				header('location:llenarSolicitud.php');
			}
		}
		elseif(isset($_GET['id']) && $_GET['id']==1){
			//verificar si entro al usuario admin.
			$id=$_GET['id'];
			//datos personales
			$nombre=$_POST['nombre'];
			$apellidoP=$_POST['apellidoP'];
			$apellidoM=$_POST['apellidoM'];
			$email=$_POST['email'];
			$area=$_POST['area'];
			$hm=$_POST['hm'];
			//datos de usuario
			$uname=$_POST['uname'];
			$pword=$_POST['pword'];
			$tipoUser=$_POST['tipoUser'];
			//variables para tabla usu_per
			$id_u=0;
			$id_dp=0;
			if($area!=null && $hm!=null && $tipoUser!=null){
				$dir_subida = 'fotosPerfil/';
				$NomFoto= basename($_FILES['avatar']['name']);
				$fichero_subido = $dir_subida .$NomFoto;
				
				if(move_uploaded_file($_FILES['avatar']['tmp_name'], $fichero_subido)){
					$query="insert into datospersonales values(default,'$nombre','$apellidoP','$apellidoM','$email','$area','$hm',1)";
					$result=mysqli_query($con,$query);

					if(!$result){
						$_SESSION['warnings']='Error al guardar los datos intentelo mas tarde';
						header('location:formNuevoU.php');
						die('Query fallido 1');
					}
					else{

						$Pass=password_hash("$pword", PASSWORD_DEFAULT);

						$query="insert into usuarios values(default,'$uname','$Pass',$tipoUser,'$NomFoto')";
						$result=mysqli_query($con,$query);

						if(!$result){
							$_SESSION['warnings']='Error al guardar los datos intentelo mas tarde';
							header('location:formNuevoU.php');
							die('Query fallido 2');
						}
						else{
							//ultimo usuario
							$query1="select max(id_u) as id_u from usuarios";
							$result1=mysqli_query($con,$query1);
							//ultimno datos personales
							$query2="select max(id_dp) as id_dp from datospersonales";
							$result2=mysqli_query($con,$query2);

							if($result1 && $result2){
								while($row1=mysqli_fetch_array($result1)) {
									$id_u=$row1['id_u'];
								}
								while($row2=mysqli_fetch_array($result2)) {
									$id_dp=$row2['id_dp'];
								}
								echo 'id_u:'.$id_u.'id_dp'.$id_dp;
								if($id_u!=null && $id_dp!=null){
									$query="insert into usu_per values($id_dp,$id_u,1)";
									$result=mysqli_query($con,$query);

									if(!$result){
										$_SESSION['warnings']='Error al guardar los datos intentelo mas tarde';
										header('location:formNuevoU.php');
										die('Query fallido 2');
									}
									else{

										$_SESSION['warnings']='Los datos se guardaron correctamente';
										header('location:formNuevoU.php');
									}
								}
							}
						}

					}
				}
				else{
					$_SESSION['warnings']='Faltaron datos por llenar';
					header('location:formNuevoU.php');
				}
			}
			else{
				$_SESSION['warnings']='Faltaron datos por llenar';
				header('location:formNuevoU.php');
			}
			
		}
		else
			header('location:index.php');
		
    }
?>




