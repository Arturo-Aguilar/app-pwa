<?php
	if(isset($_GET['id']) && isset($_GET['ac']) && !empty($_GET['ac']) && !empty($_GET['id'])):
?>
	<?php
		include("conection.php");
		if(isset($con)){
			if(isset($_GET['id']) && isset($_GET['ac']) && !empty($_GET['ac']) && !empty($_GET['id'])){
				$accion=$_GET['ac'];
				$id=$_GET['id'];
				if($accion==2){
					$query="update inventarioe set estado=0 where id_equipo=$id";
					$result=mysqli_query($con,$query);
					if($result){
						echo "<script> confirm('El equipo fue baja de alta satisfactoriamente'); </script>";
						echo "<script type='text/javascript'>window.location='gestionDisp.php';</script>";
					}else
						die('Query fallido');
				}elseif($accion==1){
					$query="select*from inventarioe where id_equipo=$id";
					$result=mysqli_query($con,$query);
					if($result){
						while($row=mysqli_fetch_array($result)) {
							$idUp=$row['id_equipo'];
							$nomEquipo=$row['nomEquipo'];
							$numSerie=$row['numSerie'];
							$cantidad=$row['cantidad'];
							$marca=$row['marca'];
							$modelo=$row['modelo'];
							$tipoEquipo=$row['tipoEquipo'];
						}
					}
					?>
					<?php
						include('header.php');
						//include('conection.php');

					?>
						<div class="llenar">
							<h1>Llena con cuidado los datos</h1>
							<form action="cruddrivers.php?actual=1&idUp=<?php echo $idUp?>" method="post" >
								<!--Esto es provicional -->
								<div class="form-group">
									<label for="">Equipo a Actualizar</label>
								   <input readonly type="text" class="form-control" name="equipo" aria-describedby="emailHelp" placeholder="Ejemplo: Teclado" autofocus onkeyup="this.value = this.value.toUpperCase();" required value="<?php echo $nomEquipo?>">
								</div>
								
								<div class="form-row">
										<div class="col-md-6 mb-3">
										  <label for="validationCustom03">Modelo</label>
										  <input type="text" class="form-control" id="validationCustom03" name="modelo" required onkeyup="this.value = this.value.toUpperCase();" placeholder="Ejemplo:F6D4630-4" value="<?php echo $modelo?>">
										  <div class="invalid-feedback">
											Please provide a valid city.
										  </div>
										</div>
										<div class="col-md-3 mb-3">
										  <label for="validationCustom04">Marca</label>
										  <input type="text" class="form-control" id="validationCustom04" name="marca"  required onkeyup="this.value = this.value.toUpperCase();" placeholder="Eje:SAMSUNG" value="<?php echo $marca?>">
										  <div class="invalid-feedback">
											Please provide a valid state.
										  </div>
										</div>
										<div class="col-md-3 mb-3">
										  <label for="inputState">Tipo de equipo</label>
										  <select id="inputState" name="tipoEqui" class="form-control" required>
											<option value="<?php echo $tipoEquipo?>"><?php echo $tipoEquipo?></option>
											<option value="EP">Equipo de prestamo</option>
											<option value="ED">Para reemplazo de equipo</option>
										  </select>
										  <div class="invalid-feedback">
											Please provide a valid zip.
										  </div>
										</div>
									  </div>
										 <div class="form-group col-md-4">
											<label for="inputState">Cantidad </label>
												<select id="inputState" name="cantidad" class="form-control" required>
													<option value="<?php echo $cantidad?>"><?php echo $cantidad?></option>
													<?php
														$i=1;
														while($i<=100){
													?>
													<option value="<?php echo $i?>"><?php echo $i?></option>
													<?php
														$i++;
														}
													?>
												</select>
										</div>
								<button type="submit" class="btn btn-primary">Enviar</button>
							</form>
						</div>
						<?php

							include('footer.php');

						?>
					<?php
				}
			}
			else{
				echo "<script> confirm('Los campos estan vacios'); </script>";
				echo "<script type='text/javascript'>window.location='gestionDisp.php';</script>";
			}
		}
		else{
			die('error de conexion');
		}
	?>
<?php
	elseif(isset($_GET['actual']) && !empty($_GET['actual']) && isset($_GET['idUp']) && !empty($_GET['idUp']) && $_GET['actual']==1):
?>
	<?php
		include("conection.php");
		session_start();
		echo $idUp=$_GET['idUp'];
		echo $nomEquipo=$_POST['equipo'];
		echo $numSerie='12029463000616';
		echo $cantidad=$_POST['cantidad'];
		echo $marca=$_POST['marca'];
		echo $modelo=$_POST['modelo'];
		echo $tipoEquipo=$_POST['tipoEqui'];
			 $fechaAc= date('Y'.'-'.'m'.'-'.'d');

		$query="update inventarioe set nomEquipo='$nomEquipo',numSerie='$numSerie',fechaActualizacion='$fechaAc',cantidad=$cantidad,marca='$marca',modelo='$modelo',tipoEquipo='$tipoEquipo' where id_equipo=$idUp";
		$result=mysqli_query($con,$query);
		if($result){
			$_SESSION['ventana']='Los datos se actualizaron correctamente';
			header('location:gestionDisp.php');
		}
		else
			die('Query fallido0');
	?>
<?php
	else:
?>
	<script> confirm('Pagina no autorizada'); </script>;
	<script type='text/javascript'>window.location='gestionDisp.php';</script>;
<?php
	endif
?>