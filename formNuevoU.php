
<?php
	include('header.php');
	
	//include('NoSession.php');
?>

<?php
	if(!empty($_SESSION['warnings']) && $_SESSION['warnings']=='Faltaron datos por llenar' ):
?>
	<div class="alert alert-danger" role="alert" id="alertaa">
	  <strong>¡CUIDADO!</strong><?php print $_SESSION['warnings'];?> <a href="principal.php" class="alert-link">Click aqui para cancelar.</a>
	</div>
<?php
	elseif(!empty($_SESSION['warnings']) && $_SESSION['warnings']=='Los datos se guardaron correctamente'):
?>
	<div class="alert alert-success" role="alert" id="alertaa">
	  <strong>¡EXCELENTE!</strong><?php print $_SESSION['warnings'];?> <a href="usuariosReg.php" class="alert-link">Click aqui para visualizar los usuarios registrados</a>
	</div>
<?php
	elseif(!empty($_SESSION['warnings']) && $_SESSION['warnings']=='Error al guardar los datos intentelo mas tarde'):
?>
	<div class="alert alert-danger" role="alert" id="alertaa">
	  <strong>¡Surgio algo inesperado!</strong><?php print $_SESSION['warnings'];?> <a href="#" class="alert-link">Click aqui para salir</a>
	</div>
<?php
	endif;
?>




	<form id="regForm" action="Insertar.php?id=1" method="post" enctype="multipart/form-data">
		  <h1>Registro Nuevo Usuario:</h1>
		  <!-- One "tab" for each step in the form: -->
		  <div class="tab">Nombre/s:
			<p><input placeholder="Nombre/s" oninput="this.className = ''" name="nombre" onkeyup="this.value = this.value.toUpperCase();"></p>
			<label for="exampleInputEmail1">Apellido paterno</label>
			<p><input placeholder="Primer Apellido" oninput="this.className = ''" name="apellidoP" onkeyup="this.value = this.value.toUpperCase();"></p>
			<label for="exampleInputEmail1">Apellido materno</label>
			<p><input placeholder="Segundo Apellido" oninput="this.className = ''" name="apellidoM" onkeyup="this.value = this.value.toUpperCase();"></p>
			<p>Sexo:
				<input type="radio" id="input-showPass" name="hm" value="M"> Hombre
				<input type="radio" id="input-showPass" name="hm" value="F"> Mujer
		  	</p>
		  </div>
		  <div class="tab">Informacion Institucional:
			<br><label for="exampleInputEmail1">Correo institucional</label>
			<p><input id="correo" placeholder="Ejemplo: utp0005646@alumno.utpuebla.edu.mx" oninput="this.className = ''" name="email" type="email" onkeyup="this.value = this.value.toUpperCase();"></p>
			
			<label for="exampleInputEmail1">Divicion</label>
				<select id="inputState" name="area" class="form-control" required>
						<option value="">Selecciona</option>
						<option value="TI">TI</option>
				</select>
		  </div>
		  
		  <div class="tab">Informacion de inicio de sesion:
		  
			<br><label for="exampleInputEmail1">Usuario</label>
			<p><input placeholder="Matricula: UTP0463499" oninput="this.className = ''" name="uname" onkeyup="this.value = this.value.toUpperCase();"></p>
			
			<label for="exampleInputfile">Subir foto de perfil</label>
			<p><input type="file" name="avatar" accept="image/jpeg"></p>
			
			<label for="exampleInputEmail1">Tipo de usuario</label>
				<select id="inputState" name="tipoUser" class="form-control" required>
						<option value="">Selecciona</option>
						<option value="1">Administrador</option>
						<option value="2">Usuario</option>
				</select>
			<label for="exampleInputEmail1">Contraseña</label>
			<p><input id="myPass" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" oninput="this.className = ''" name="pword" type="password"></p>
			<input id="input-showPass" type="checkbox" onclick="functionPass()">Mostrar contraseña
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
	include('footer.php');
?>	
