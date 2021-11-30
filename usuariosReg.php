<?php
	include('header.php');
	include('conection.php');
	
?>
<?php
	if(isset($_GET['actual'])){
		echo"--".$id=$_GET['id'];
	 	echo"--".$nombre=$_POST['nombre'];
	 	echo"--".$apellidoP=$_POST['apellidoP'];
	 	echo"--".$apellidoM=$_POST['apellidoM'];
	 	echo"--".$email=$_POST['email'];
	 	echo"--".$area=$_POST['area'];
	 	echo"--".$hm=$_POST['hm'];
		//datos de usuario
	 	echo"--".$uname=$_POST['uname'];

	 	echo"--".$tipoUser=$_POST['tipoUser'];
		
		$query="update datospersonales set nombre='$nombre', apellidoP='$apellidoP', apellidoM='$apellidoM', correo='$email', division='$area', sexo='$hm' where id_dp=$id";
		$result=mysqli_query($con,$query);
		if($result){
			$query="update usuarios set
						usuarioutp='$uname',
						id_r=$tipoUser
					where id_u=$id";
			$result=mysqli_query($con,$query);
			if($result){
				
				$_SESSION['alert-emer']="se actualizo";
				header('location:usuariosReg.php');
			}else
				die('Query fallido2');
			
		}else
			die('Query fallido1');
	}
?>


<?php
	if(!isset($_GET['id'])):
?>
	<?php
		if(isset($_SESSION['alert-emer']) && !empty($_SESSION['alert-emer'])):
	?>
		<div class="alert alert-success" role="alert" id="alertaa">
		  <strong>¡EXCELENTE!</strong><?php print $_SESSION['alert-emer'];?>
		</div>
	<?php
		$_SESSION['alert-emer']=null;
		endif;
	?>
<h2>Filtrar por:</h2>

		<select id="mySelect3" class="form-control">
	  	  <option value="">Selecciona</option>
		  <option value="0">Nombre</option>
		  <option value="1">Apellido paterno</option>
		  <option value="2">Apellido materno</option>
		  <option value="3">Usuario</option>
		  <option value="4">Area</option>
		</select>
<input type="text" id="myInput3" onkeyup="myFunction3()" placeholder="Buscar equipo" title="Type in a name">
	
		<table id="myTable3">
		  <tr class="header">
			<th style="width:20%;">Nombre </th>
			<th style="width:20%;">Apellido paterno</th>
			<th style="width:20%;">Apellido materno</th>
			<th style="width:20%;">Usuario</th>
			<th style="width:20%;">Area</th>
			<th style="width:20%;">Accion</th>
		  </tr>
		  <?php
								$query="select*from datospersonales as dp inner join usu_per as up on dp.id_dp=up.id_dp inner join usuarios as u on u.id_u=up.id_u where u.id_r=2";
								//$query="select*from datospersonales as dp inner join usu_per as up on dp.id_dp=up.id_dp inner join usuarios as u on u.id_u=up.id_u";
								$result=mysqli_query($con,$query);
								if($result){
								while($row=mysqli_fetch_array($result)) { ?>
									<tr>
										<td><?php echo $row['nombre']?></td>
										<td><?php echo $row['apellidoP']?></td>
										<td><?php echo $row['apellidoM']?></td>
										<td><?php echo $row['usuarioutp']?></td>
										<td><?php echo $row['division']?></td>
										<td>
										<?php
											
											if($row['estado']==1):
										?>
											<a href="usuariosReg.php?id=<?php echo $row['id_dp']?>&ac=1"><img src="assets/edit.png" width="40px" alt="editar"></a>
											<a href="usuariosReg.php?id=<?php echo $row['id_dp']?>&ac=2"><img src="assets/botebasura.png" width="40px" alt="borrar imagen"></a>
										<?php
											else:
										?>
											<img src="imagenes/no.png" width="40px" alt="check">
										<?php
											endif;
										?>
										</td>
									</tr>
								<?php }} ?>
		</table>
<?php
	elseif(isset($_GET['id'])&& $_GET['ac']==1):
	
?>
	<?php
		$id=$_GET['id'];
		$nombre;
		$apellidoP;
		$apellidoM;
		$email;
		$area;
		$hm;
		//datos de usuario
		$uname;
		$img;
		$tipoUser;

		$query="select*from datospersonales as dp inner join usu_per as up on dp.id_dp=up.id_dp inner join usuarios as u on u.id_u=up.id_u where dp.id_dp=$id and dp.estado=1";
		$result=mysqli_query($con,$query);
		if($result){
			while($row=mysqli_fetch_array($result)) {
				$nombre=$row['nombre'];
				$apellidoP=$row['apellidoP'];
				$apellidoM=$row['apellidoM'];
				$email=$row['correo'];
				$area=$row['division'];
				$hm=$row['sexo'];
				$uname=$row['usuarioutp'];
				$img=$row['foto'];
				$tipoUser=$row['id_r'];
			}
		}
	?>

	<form id="regForm" action="usuariosReg.php?actual=1&id=<?php echo $id?>" method="post">
		  <h1>Registro Nuevo Usuario:</h1>
		  <!-- One "tab" for each step in the form: -->
		  <div class="tab">Nombre/s:
			<p><input value="<?php echo $nombre?>" placeholder="Nombre/s" oninput="this.className = ''" name="nombre" onkeyup="this.value = this.value.toUpperCase();"></p>
			<label for="exampleInputEmail1">Apellido paterno</label>
			<p><input value="<?php echo $apellidoP?>" placeholder="Primer Apellido" oninput="this.className = ''" name="apellidoP" onkeyup="this.value = this.value.toUpperCase();"></p>
			<label for="exampleInputEmail1">Apellido materno</label>
			<p><input value="<?php echo $apellidoM?>" placeholder="Segundo Apellido" oninput="this.className = ''" name="apellidoM" onkeyup="this.value = this.value.toUpperCase();"></p>
			<p>Sexo:
				<input type="radio" id="input-showPass" name="hm" value="M" <?php if($hm=='M'){echo 'checked';}?>> Hombre
				<input type="radio" id="input-showPass" name="hm" value="F" <?php if($hm=='F'){echo 'checked';}?>> Mujer
		  	</p>
		  </div>
		  <div class="tab">Informacion Institucional:
			<br><label for="exampleInputEmail1">Correo institucional</label>
			<p><input value="<?php echo $email?>" placeholder="Ejemplo: utp0005646@alumno.utpuebla.edu.mx" oninput="this.className = ''" name="email" type="email" onkeyup="this.value = this.value.toUpperCase();"></p>
			<label for="exampleInputEmail1">Divicion</label>
				<select id="inputState" name="area" class="form-control" required>
						<option value="<?php echo $area?>"><?php echo $area?></option>
						<option value="TI">TI</option>
				</select>
		  </div>
		  
		  <div class="tab">Informacion de inicio de sesion:
		  
			<label for="exampleInputEmail1">Usuario</label>
			<p><input value="<?php echo $uname?>" placeholder="Matricula: UTP0463499" oninput="this.className = ''" name="uname" onkeyup="this.value = this.value.toUpperCase();"></p>
			
			<label for="exampleInputEmail1">Tipo de usuario</label>
				<select id="inputState" name="tipoUser" class="form-control" required>
						<option value="<?php echo $tipoUser?>"><?php if($tipoUser==1){ echo 'Administrador';} else echo 'Usuario';?></option>
						<option value="1">Administrador</option>
						<option value="2">Usuario</option>
				</select>
			
		  </div>
		  <div style="overflow:auto;">
			<div style="float:right;">
			  <button type="button" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
			  <button type="button" id="nextBtn" onclick="nextPrev(1)">Siguinte</button>
			</div>
		  </div>
		  <!-- Circles which indicates the steps of the form: -->
		  <div style="text-align:center;margin-top:40px;">
			<span class="step"></span>
			<span class="step"></span>
			<span class="step"></span>
			<span class="step"></span>
		  </div>
</form>
<?php
	else:
?>
	<h1>etro al borrado</h1>
	<?php
		if(isset($_GET['id'])&& $_GET['ac']==2){
			$id=$_GET['id'];
			$query="update datospersonales set estado=0 where id_dp=$id";
			$result=mysqli_query($con,$query);
			if($result){
				$_SESSION['alert-emer']="El usuario fue dado de baja correctamente.";
				header('location:usuariosReg.php');
			}
			else
				die("queri fallido");
		}
		
	?>
<?php
	endif;
?>

<?php
	
	include('footer.php');
	
?>