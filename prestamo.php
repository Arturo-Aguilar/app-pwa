<?php
	include('header.php');
	include('conection.php');
	//include('footer.php');
	//include('NoSession.php');
?>
	<!--<div class="cards-propias">
		<div class="card-deck">
		  <div class="card">
			<img class="card-img-top" src="assets/bosina.png" alt="Card image cap">
			<div class="card-body">
			  <h5 class="card-title">Equipo de reproduccion</h5>
			  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
			</div>
			<div class="card-footer">
			  <small class="text-muted"><h1><a href="llenarSolicitud.php?id=bosina">Solicitar</a></h1></small>
			</div>
		  </div>
		  <div class="card">
			<img class="card-img-top" src="assets/proyector.jpg" alt="Card image cap">
			<div class="card-body">
			  <h5 class="card-title">Proyector</h5>
			  <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
			</div>
			<div class="card-footer">
			  <small class="text-muted"><h1><a href="llenarSolicitud.php?id=proyector">Solicitar</a></h1></small>
			</div>
		  </div>
		  <div class="card">
			<img class="card-img-top" src="assets/cable.png" alt="Card image cap">
			<div class="card-body">
			  <h5 class="card-title">Extencion</h5>
			  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
			</div>
			<div class="card-footer">
			  <small class="text-muted"><h1><a href="llenarSolicitud.php?id=extencion">Solicitar</a></h1></small>
			</div>
		  </div>
		</div>
	</div>-->
	<?php
		$id=$_GET['id'];
		if(empty($id)): header('location:principal.php');
	?>
	<?php
		elseif($id==1):
	?>
	<!--codigo de pruba equipos prestados-->
	<div class="container">
		<?php
			$query="select*from inventarioe where tipoEquipo='EP' and estado=1";
			$result=mysqli_query($con,$query);
			if($result){
			while($row=mysqli_fetch_array($result)) { ?>

					<div class="card">
						<img src="assets/<?php echo $row['img']?>" alt="">
						<a href="llenarSolicitud.php?id=<?php echo $row['nomEquipo']?>&case=2"><?php echo $row['nomEquipo']?></a>
					</div>

		<?php }} ?>
	</div>
	<!--fin del codigo de prueba-->
	
	<!--<div class="container">
		<div class="card">
			<img src="assets/bosina.png" alt="">
			<a href="llenarSolicitud.php?id=bosina&case=2">Reproductor MP3</a>
		</div>
		<div class="card">
			<img src="assets/proyector.png" alt="">
			<a href="llenarSolicitud.php?id=proyector&case=2">Proyector</a>
		</div>
		<div class="card">
			<img src="assets/cable.png" alt="">
			<a href="llenarSolicitud.php?id=extencion&case=2">Extencion</a>
		</div>
	</div>-->
	<?php
		elseif($id==2):
	?>
	<!--codigo de pruba equipos dañados-->
	<div class="container">
		<?php
			$query="select*from inventarioe where tipoEquipo='ED' and estado=1";
			$result=mysqli_query($con,$query);
			if($result){
			while($row=mysqli_fetch_array($result)) { ?>

					<div class="card">
						<img src="assets/<?php echo $row['img']?>" alt="">
						<a href="llenarSolicitud.php?id=<?php echo $row['nomEquipo']?>&case=1"><?php echo $row['nomEquipo']?></a>
					</div>

		<?php }} ?>
	</div>
	
	<!--fin del codigo de prueba-->
	
	<!--<div class="container">
		<div class="card">
			<img src="assets/monitor.png" alt="">
			<a href="llenarSolicitud.php?id=monitor&case=1">Monitor</a>
		</div>
		<div class="card">
			<img src="assets/teclado.png" alt="">
			<a href="llenarSolicitud.php?id=teclado&case=1">Teclado</a>
		</div>
		<div class="card">
			<img src="assets/mouse.png" alt="">
			<a href="llenarSolicitud.php?id=raton&case=1">Raton</a>
		</div>
	</div>-->
	<?php
		endif
	?>
<?php
	//include('header.php');
	include('footer.php');
	//include('NoSession.php');
?>