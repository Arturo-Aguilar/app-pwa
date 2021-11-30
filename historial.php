<?php
	include('header.php');
	include('conection.php');
	
?>
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
<!--<div class="form-group col-md-4">
	<label for="inputState">Filtrar por </label>
		<select id="inputState" name="area" class="form-control" required>
			<option value="">Selecciona</option>
			<option id="ben">BENEFICIARIO</option>
			<option >RESPONSBLE</option>
			<option value="area">AREA</option>
			<option value="equipo">EQUIPO</option>
			<option value="fecha">FECHA</option>
	</select>
	<button type="submit" class="btn btn-primary"><a href="historial.php"><img src="assets/filtro.png" width="20px" alt=""></a></button></div>-->
	<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
	  <li class="nav-item">
		<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Equipos dañados</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Equipos prestados</a>
	  </li>

	</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  	
  	<!--CONTENIDO DE LOS EQUIPOS DAÑADOS-->
		<h2>Filtrar por:</h2>

		<select id="mySelect" class="form-control">
	  	  <option value="">Selecciona</option>
		  <option value="0">Beneficiario</option>
		  <option value="1">Área</option>
		  <option value="2">Equipo</option>
		</select>	
			
  		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar" title="Type in a name">
		<p id="demo"></p>
		<table id="myTable">
		  <tr class="header">
			<th style="width:20%;">Beneficiario </th>
			<th style="width:20%;">Área</th>
			<th style="width:20%;">Equipo</th>
			<th style="width:20%;">Cantidad</th>
			<th style="width:20%;">Fecha</th>
			<th style="width:20%;">Accion</th>
			
		  </tr>
		  <?php
								$fecha=date('Y'.'-'.'m'.'-'.'d');
								$query="select*From equipos where estado=1";
								$result=mysqli_query($con,$query);
								if($result){
								while($row=mysqli_fetch_array($result)) { ?>
									<tr>
										<td><?php echo $row['beneficiario']?></td>
										<td><?php echo $row['divicion']?></td>
										<td><?php echo $row['nomEquipo']?></td>
										<td><?php echo $row['cantidad']?></td>
										<td><?php echo $row['fecha']?></td>
										<td>
										<?php
											if($row['fecha']>=$fecha):
										?>
											<a href="editarTarea.php?id=<?php echo $row['id_e']?>&tp=2"><img src="assets/edit.png" width="40px" alt="editar"></a>
											<a href="borrarTarea.php?id=<?php echo $row['id_e']?>&tp=2"><img src="assets/botebasura.png" width="40px" alt="borrar imagen"></a>
										<?php
											else:
										?>
											<img src="imagenes/autorizado.png" width="40px" alt="check">
										<?php
											endif;
										?>
										</td>
									</tr>
								<?php }} ?>
		</table>
  	
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  	<!--CONTENIDO DE LOS EQUIPOS PRESTADOS-->
  	<h2>Filtrar por:</h2>

		<select id="mySelect2" class="form-control">
	  	  <option value="">Selecciona</option>
		  <option value="0">Beneficiario</option>
		  <option value="1">Responsable</option>
		  <option value="2">Área</option>
		  <option value="3">Equipo</option>
		</select>
  	<input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Buscar equipo" title="Type in a name">
	
		<table id="myTable2">
		  <tr class="header">
			<th style="width:20%;">Beneficiario </th>
			<th style="width:20%;">Responsable</th>
			<th style="width:20%;">Área</th>
			<th style="width:20%;">Equipo</th>
			<th style="width:20%;">Fecha de prestamo</th>
			<th style="width:20%;">Hora inicial</th>
			<th style="width:20%;">Hora final</th>
			<th style="width:20%;">Accion</th>
		  </tr>
		  <?php
								$fecha=date('Y'.'-'.'m'.'-'.'d');
								$query="select*From historial where estado=1";
								$result=mysqli_query($con,$query);
								if($result){
								while($row=mysqli_fetch_array($result)) { ?>
									<tr>
										<td><?php echo $row['nombre']?></td>
										<td><?php echo $row['responsable']?></td>
										<td><?php echo $row['area']?></td>
										<td><?php echo $row['equipo']?></td>
										<td><?php echo $row['fecha']?></td>
										<td><?php echo $row['timeI']?></td>
										<td><?php echo $row['timeF']?></td>
										<td>
										<?php
											if($row['fecha']>=$fecha):
										?>
											<a href="editarTarea.php?id=<?php echo $row['id_h']?>&tp=1"><img src="assets/edit.png" width="40px" alt="editar"></a>
											<a href="borrarTarea.php?id=<?php echo $row['id_h']?>&tp=1"><img src="assets/botebasura.png" width="40px" alt="borrar imagen"></a>
										<?php
											else:
										?>
											<img src="imagenes/autorizado.png" width="40px" alt="check">
										<?php
											endif;
										?>
										</td>
									</tr>
								<?php }} ?>
		</table>
	
  </div>
  <h1><?php echo date('Y'.'-'.'m'.'-'.'d')?></h1>
</div>
	
	
	
	


<?php
	
	include('footer.php');
	
?>