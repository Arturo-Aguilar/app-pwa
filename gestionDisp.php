<?php
	include('header.php');
	include('conection.php');
	
?>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
	  <li class="nav-item">
		<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Inventario de equipos</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Insertar nuevo equipo</a>
	  </li>

	</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  <?php
		if(isset($_SESSION['ventana']) && !empty($_SESSION['ventana'])):
	?>
		<div class="alert alert-success" role="alert" id="alertaa">
		  <strong><?php print strtoupper($_SESSION['ventana']);?></strong>
		</div>
	<?php
		$_SESSION['ventana']=null;
		endif;
	?>
	<h2>Filtrar por:</h2>

		<select id="mySelect4" class="form-control">
	  	  <option value="">Selecciona</option>
		  <option value="0">Equipo</option>
		  <option value="1">SN</option>
		  <option value="2">Modelo</option>
		  <option value="3">Marca</option>
		</select>
<input type="text" id="myInput4" onkeyup="myFunction4()" placeholder="Buscar" title="Type in a name">
	
		<table class="table">
			<thead>
				<th style="width:20%;">Beneficiario</th>
				<th style="width:20%;">Responsable</th>
				<th style="width:20%;">Área</th>
				<th style="width:20%;">Equipo</th>
				<th style="width:20%;">Fecha de prestamo</th>
				<th style="width:20%;">Hora inicial</th>
				<th style="width:20%;">Hora final</th>
				<th style="width:20%;">Accion</th>
			</thead>
			<tbody>
				<tr>
					<td data-label="Beneficiario">Jose</td>
					<td data-label="Responsable">Artuo</td>
					<td data-label="Área">Moreno</td>
					<td data-label="Equipo">Aguilar</td>
					<td data-label="Fecha de prestamo">utp0005600@alumno.utpuebla.edu.mx</td>
					<td data-label="Hora inicial">utp0005600@alumno.utpuebla.edu.mx</td>
					<td data-label="Hora final">utp0005600@alumno.utpuebla.edu.mx</td>
					
				</tr>
				<tr>
					<td data-label="uno">Jose</td>
					<td data-label="dos">Artuo</td>
					<td data-label="tres">Moreno</td>
					<td data-label="cuarto">Aguilar</td>
					<td data-label="cinco">utp0005600@alumno.utpuebla.edu.mx</td>
				</tr>
				<tr>
					<td data-label="uno">Jose</td>
					<td data-label="dos">Artuo</td>
					<td data-label="tres">Moreno</td>
					<td data-label="cuarto">Aguilar</td>
					<td data-label="cinco">utp0005600@alumno.utpuebla.edu.mx</td>
				</tr>
				<tr>
					<td data-label="uno">Jose</td>
					<td data-label="dos">Artuo</td>
					<td data-label="tres">Moreno</td>
					<td data-label="cuarto">Aguilar</td>
					<td data-label="cinco">utp0005600@alumno.utpuebla.edu.mx</td>
				</tr>
			</tbody>
		</table>
	<!--</div>-->
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  	<!--CONTENIDO DE LOS EQUIPOS PRESTADOS-->
  	<div class="llenar">
		<h1>Llena con cuidado los datos</h1>
		<form action="insertarNuevoEquipo.php" method="post" enctype="multipart/form-data">
            <!--Esto es provicional -->
            <div class="form-group">
				<label for="">Equipo a insertar</label>
               <input type="text" class="form-control" name="equipo" aria-describedby="emailHelp" placeholder="Ejemplo: Teclado" autofocus onkeyup="this.value = this.value.toUpperCase();" required>
            </div>
            <div class="form-group">
                <label for="exampleInputfile">Subir foto de perfil</label>
				<p><input type="file" name="avatar" accept="image/jpeg"></p>
            </div>
            <div class="form-row">
					<div class="col-md-6 mb-3">
					  <label for="validationCustom03">Modelo</label>
					  <input type="text" class="form-control" id="validationCustom03" name="modelo" required onkeyup="this.value = this.value.toUpperCase();" placeholder="Ejemplo:F6D4630-4">
					  <div class="invalid-feedback">
						Please provide a valid city.
					  </div>
					</div>
					<div class="col-md-3 mb-3">
					  <label for="validationCustom04">Marca</label>
					  <input type="text" class="form-control" id="validationCustom04" name="marca"  required onkeyup="this.value = this.value.toUpperCase();" placeholder="Eje:SAMSUNG">
					  <div class="invalid-feedback">
						Please provide a valid state.
					  </div>
					</div>
					<div class="col-md-3 mb-3">
					  <label for="inputState">Tipo de equipo</label>
					  <select id="inputState" name="tipoEqui" class="form-control" required>
						<option value="">Selecciona</option>
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
								<option value="">Cantidad</option>
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
	
  </div>
  <h1><?php echo date('Y'.'-'.'m'.'-'.'d')?></h1>
</div>
<?php
	
	include('footer.php');
	
?>