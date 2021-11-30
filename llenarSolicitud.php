<?php
	include('header.php');
	//include('footer.php');
	//include('NoSession.php');
?>
	<div class="alert alert-success" role="alert" id="alertaa">
	  <h4 class="alert-heading">Información extra</h4>
	  <p>Toda informacion registrada tendra un periodo de 24 horas de aprobacion, si se decea cambiar algun dato se debera de realizar antes del periodo ya mencionado.</p>
	  <hr>
	  <p class="mb-0"><strton>PASANDO LAS 24 HORAS YA NO SE PODRAN HACER CAMBIOS.</strton></p>
	</div>
	
	<?php
		$caso=$_GET['case'];
		if($caso==2):
	?>
	<div class="llenar">
		<h1>Llena con cuidado los datos</h1>
		<form action="Insertar.php" method="post">
            <!--Esto es provicional -->
            <div class="form-group">
				<label for="">Equipo solicitado</label>
               <input type="text" class="form-control" name="equipo" aria-describedby="emailHelp" value="<?php echo strtoupper($_GET['id']);?>" readonly>

                <label for="exampleInputEmail1">Beneficiario</label>
                <input type="text" class="form-control" name="nombre" aria-describedby="emailHelp" placeholder="Ejemplo: Jose Eduardo" required autofocus onkeyup="this.value = this.value.toUpperCase();">
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Responsable del equipo</label>
                <input type="text" class="form-control" name="responsable" aria-describedby="emailHelp" placeholder="Ejemplo: Moreno" required onkeyup="this.value = this.value.toUpperCase();">
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-row">
					<div class="col-md-6 mb-3">
					  <label for="validationCustom03">Día</label>
					  <input type="date" class="form-control" id="validationCustom03" name="fecha" required>
					  <div class="invalid-feedback">
						Please provide a valid city.
					  </div>
					</div>
					<div class="col-md-3 mb-3">
					  <label for="validationCustom04">De</label>
					  <input type="time" class="form-control" id="validationCustom04" name="horaI"  required>
					  <div class="invalid-feedback">
						Please provide a valid state.
					  </div>
					</div>
					<div class="col-md-3 mb-3">
					  <label for="validationCustom05">A</label>
					  <input type="time" class="form-control" id="validationCustom05" name="horaF"  required>
					  <div class="invalid-feedback">
						Please provide a valid zip.
					  </div>
					</div>
				  </div>
				  <div class="form-group col-md-4">
					  <label for="inputState">Área a que corresponde </label>
					  <select id="inputState" name="area" class="form-control" required>
						<option value="">Selecciona</option>
						<option value="TI">TI</option>
						
					  </select>
					</div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
	</div>
	<?php
		elseif($caso==1):
	?>
		<div class="llenar">
		<h1>Llena con cuidado los datos</h1>
		<form action="Insertar.php" method="post">
            <!--Esto es provicional -->
            <div class="form-group">
				<label for="">Equipo solicitado</label>
               <input type="text" class="form-control" name="equipo" aria-describedby="emailHelp" value="<?php echo strtoupper($_GET['id']);?>" readonly>

                <label for="exampleInputEmail1">Beneficiario</label>
                <input type="text" class="form-control" name="nombre" aria-describedby="emailHelp" placeholder="Ejemplo: Jose Eduardo" required autofocus onkeyup="this.value = this.value.toUpperCase();">
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
			<div class="form-group col-md-4">
				<label for="inputState">Área a que corresponde </label>
					<select id="inputState" name="area" class="form-control" required>
						<option value="">Selecciona</option>
						<option value="TI">TI</option>
					</select>
			</div>
           <div class="form-group col-md-4">
				<label for="inputState">Cantidad </label>
					<select id="inputState" name="cantidad" class="form-control" required>
						<option value="">Elija una cantidad</option>
							<?php
								include('conection.php');
								$equiiopo=$_GET['id'];
								$query="select*from inventarioe where nomEquipo='$equiiopo'";
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
            <button type="submit" class="btn btn-primary" name="up" <?php if($canti<=0){echo 'disabled';}?>>Enviar</button>
        </form>
        
	</div>
	<?php
		elseif(empty($caso)):
			header("location:principal.php")
	?>
	<?php
		
		endif;
	?>
<?php
	if(!empty($_SERVER['errorcar'])){
		echo $_SESSION['errorcar'];
	}
	//include('header.php');
	include('footer.php');
	//include('NoSession.php');
?>