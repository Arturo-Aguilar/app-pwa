<?php include('header.php');?>

<?php
    include('conection.php');
    if(isset($_GET) && !isset($_POST['up']) && !isset($_POST['up2']) ){
        $id=$_GET['id'];
		$tp=$_GET['tp'];
        $ben;
        $resable;
		$area;
		$equipo;
		$fecha;
		$horaI;
		$horaF;
		$cantidad;
		if($tp==1){
			$query="select*from historial where id_h=$id";
			$result=mysqli_query($con,$query);
			while($row=mysqli_fetch_array($result)){
				$ben=$row['nombre'];
				$resable=$row['responsable'];
				$area=$row['area'];
				$equipo=$row['equipo'];
				$fecha=$row['fecha'];
				$horaI=$row['timeI'];
				$horaF=$row['timeF'];
			}
		}
		elseif($tp==2){
			$query="select*from equipos where id_e=$id";
			$result=mysqli_query($con,$query);
			while($row=mysqli_fetch_array($result)){
				$ben=$row['beneficiario'];
				$area=$row['divicion'];
				$equipo=$row['nomEquipo'];
				$cantidad=$row['cantidad'];
			}
		}
		$_SESSION['warnings']=' Al actualizar cualquier dato este se vera afectado en la base de datos';
    }
    if(isset($_POST['up'])){
        $id=$_GET['id'];
		$tp=$_GET['tp'];
         $ben=$_POST["nombre"];
         $res=$_POST["responsable"];
		 $area=$_POST['area'];
		 $equipo=$_POST["equipo"];
		 $fecha=$_POST['fecha'];
		 $horaI=$_POST['horaI'];
		 $horaF=$_POST['horaF'];
		
		$query="update historial set nombre='$ben',responsable='$res',area='$area',equipo='$equipo',fecha='$fecha',timeI='$horaI',timeF='$horaF' where id_h=$id";
		
        //$query="update tareas set titulo='$titulo',descripcion='$desc' where id=$id";
		
        $result=mysqli_query($con,$query);
        if(!$result){
            die("Query fallo");
        }
        else{
			$_SESSION['ventana']='los datos se actualizaron correctamente';
            header('location:historial.php');
        }
		//$_SESSION['warnings']='up 1';
		
    }
	if(isset($_POST['up2'])){
		$fecha=date('Y'.'-'.'m'.'-'.'d');
        $id=$_GET['id'];
		$tp=$_GET['tp'];
        $ben=$_POST['nombre'];
		$area=$_POST['area'];
		$equipo=$_POST['equipo'];
		$cantidad=$_POST['cantidad'];
		
		$query="select*from inventarioe where nomEquipo = '$equipo'";
		$result=mysqli_query($con,$query);
		if($result){
			$id_equipo;
			$equipoConsulat;
			$cantidadConsulta;
			$id_equipoConsulta;
			while($row=mysqli_fetch_array($result)){
				$id_equipo=$row['id_equipo'];
			}
			$query="select*from equipos where beneficiario = '$ben'";
			$result=mysqli_query($con,$query);
			while($row=mysqli_fetch_array($result)){
				$equipoConsulat=$row['nomEquipo'];
				$cantidadConsulta=$row['cantidad'];
			}
			if($equipoConsulat==$equipo){
				$query="update inventarioe set 	cantidad = cantidad+$cantidadConsulta where id_equipo = $id_equipo";
				$result=mysqli_query($con,$query);
				if($result){
					$query="update inventarioe set 	cantidad = cantidad-$cantidad where id_equipo = $id_equipo";
					$result=mysqli_query($con,$query);
					if($result){
						$query="update equipos set nomEquipo='$equipo',beneficiario='$ben',divicion='$area',cantidad='$cantidad',fecha='$fecha' where id_e=$id";
						$result=mysqli_query($con,$query);
						if(!$result){
							die("Query fallo");
						}
						else{
							$_SESSION['ventana']='los datos se actualizaron correctamente';
							header('location:historial.php');
						}
					}
					else
						die('Query fallado');
				}
			}else{
				$query="update inventarioe set 	cantidad = cantidad-$cantidad where id_equipo = $id_equipo";
				$result=mysqli_query($con,$query);
				if($result){
					$query="update equipos set nomEquipo='$equipo',beneficiario='$ben',divicion='$area',cantidad='$cantidad',fecha='$fecha' where id_e=$id";
					$result=mysqli_query($con,$query);
					if(!$result){
						die("Query fallo");
					}
					else{
						$query="select*from inventarioe where nomEquipo = '$equipoConsulat'";
						$result=mysqli_query($con,$query);
						while($row=mysqli_fetch_array($result)){
							$id_equipoConsulta=$row['id_equipo'];
						}
						if($result){
							$query="update inventarioe set 	cantidad = cantidad+$cantidadConsulta where id_equipo = $id_equipoConsulta";
							$result=mysqli_query($con,$query);
							if(!$result){
								die("Query fallo");
							}
							else{
								$_SESSION['ventana']='los datos se actualizaron correctamente';
								header('location:historial.php');
							}
						}
						else
							die('Query fallidoo');
					}
				}
				else
					die('Query fallado');
			}
		}
    }
?>
	<div class="alert alert-danger" role="alert" id="alertaa">
	  <strong>¡CUIDADO!</strong><?php print $_SESSION['warnings'];?> <a href="historial.php" class="alert-link">Click aqui para cancelar.</a>
	</div>
<?php
	if($tp==1):
?>
<div class="llenar">
		<h1>Actualizar Datos</h1>
		<form action="editarTarea.php?id=<?php echo $_GET['id'];?>&tp=1" method="post">
            <!--Esto es provicional -->
            <div class="form-group">
				
				 <div class="form-group col-md-4">
					  <label for="inputState">Cambiar Equipo </label>
					  <select id="inputState" name="equipo" class="form-control" required>
						<option value="<?php echo $equipo;?>"><?php echo $equipo;?></option>
						<?php
							$query="select*from inventarioe where estado=1 and tipoEquipo='ED'";
							$result=mysqli_query($con,$query);
							if($result){
								while($row=mysqli_fetch_array($result)) { ?>
									<option value="<?php echo $row['nomEquipo']?>"><?php echo $row['nomEquipo']?></option>
						<?php }} ?>
					  </select>
					</div>
                <label for="exampleInputEmail1">Beneficiario</label>
                <input type="text" class="form-control" name="nombre" aria-describedby="emailHelp" placeholder="Ejemplo: Jose Eduardo" required autofocus onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $ben;?>">
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Responsable del equipo</label>
                <input type="text" class="form-control" name="responsable" aria-describedby="emailHelp" placeholder="Ejemplo: Moreno" required onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $resable;?>">
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-row">
					<div class="col-md-6 mb-3">
					  <label for="validationCustom03">Día</label>
					  <input type="date" class="form-control" id="validationCustom03" name="fecha" required value="<?php echo $fecha;?>">
					  <div class="invalid-feedback">
						Please provide a valid city.
					  </div>
					</div>
					<div class="col-md-3 mb-3">
					  <label for="validationCustom04">De</label>
					  <input type="time" class="form-control" id="validationCustom04" name="horaI"  required value="<?php echo $horaI;?>" >
					  <div class="invalid-feedback">
						Please provide a valid state.
					  </div>
					</div>
					<div class="col-md-3 mb-3">
					  <label for="validationCustom05">A</label>
					  <input type="time" class="form-control" id="validationCustom05" name="horaF"  required value="<?php echo $horaF;?>">
					  <div class="invalid-feedback">
						Please provide a valid zip.
					  </div>
					</div>
				  </div>
				  <div class="form-group col-md-4">
					  <label for="inputState">Área a que corresponde </label>
					  <select id="inputState" name="area" class="form-control" required>
						<option value="<?php echo $area;?>"><?php echo $area;?></option>
						<option value="Ambiental">Ambiental</option>
						<option value="Ambiental">Ambiental</option>
						<option value="Ambiental">Ambiental</option>
					  </select>
					</div>
            <button type="submit" class="btn btn-primary" name="up">Actualizar</button>
        </form>
	</div>
	
<h1>
	<?php
		print $_SESSION['warnings'];
	?>
</h1>

<?php
	elseif($tp==2):
?>
	
	<div class="llenar">
		<h1>Actualizar Datos</h1>
		<form action="editarTarea.php?id=<?php echo $_GET['id'];?>&tp=2" method="post">
            <!--Esto es provicional -->
            <div class="form-group">
				
				 <div class="form-group col-md-4">
					  <label for="inputState">Equipo </label>
					  <input type="text" class="form-control" name="equipo" aria-describedby="emailHelp" placeholder="Ejemplo: Jose Eduardo" required autofocus onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $equipo;?>" readonly>
                <small id="emailHelp" class="form-text text-muted"></small>
					</div>
                <label for="exampleInputEmail1">Beneficiario</label>
                <input type="text" class="form-control" name="nombre" aria-describedby="emailHelp" placeholder="Ejemplo: Jose Eduardo" required autofocus onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $ben;?>">
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            
				  <div class="form-group col-md-4">
					  <label for="inputState">Área a que corresponde </label>
					  <select id="inputState" name="area" class="form-control" required>
						<option value="<?php echo $area;?>"><?php echo $area;?></option>
						<option value="TI">TI</option>
					  </select>
					</div>
           <div class="form-group col-md-4">
				<label for="inputState">Cantidad </label>
					<select id="inputState" name="cantidad" class="form-control" required>
						<option value="<?php echo $cantidad;?>"><?php echo $cantidad;?></option>
						<?php
								include('conection.php');
								$query="select*from inventarioe where nomEquipo='$equipo'";
								$i=1;
								$result=mysqli_query($con,$query);
								if($result){
									while($row=mysqli_fetch_array($result)) {
										$canti=$row['cantidad'];
									}
								}
								if($canti>0):
							?>
								<?php
									while($i<=$canti){
								?>
									<option value="<?php echo $i?>"><?php echo $i?></option>
								<?php
									$i++;
									}
								?>
							<?php
								else:
							?>
								<option value=""><?php echo 'No hay en existencia intentelo mas tarde'?></option>
							<?php
								endif;
							?>
					</select>
			</div>
            <button type="submit" class="btn btn-primary" name="up2" <?php if($canti<=0){echo 'disabled';}?>>Actualizar</button>
        </form>
	</div>

	<!--Alerta-->
	

<?php
	elseif(empty($tp)):
		header("location:principal.php")
?>
<?php
		
	endif;
	include('footer.php')
?>