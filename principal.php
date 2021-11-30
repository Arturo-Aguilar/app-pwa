
<?php
	include('header.php');
	
	//include('NoSession.php');
	$_SESSION['warnings']=null;
?>

		
		<!--carrusel-->
		
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner">
			<div class="carousel-item active">
			  <img class="d-block w-100" src="assets/fondo.jpg" alt="First slide">
			</div>
			<div class="carousel-item">
			  <img class="d-block w-100" src="assets/carru2.jpg" alt="Second slide">
			</div>
			<div class="carousel-item">
			  <img class="d-block w-100" src="assets/carru5.jpg" alt="Third slide">
			</div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		  </a>
	</div>
	<h1>videp</h1>
	<video  muted loop id="myVideo">
  <source src="https://www.youtube.com/watch?v=f10mB6fKszU" type="video/mp4">
  Your browser does not support HTML5 video.
</video>

<?php
	include('footer.php');
?>	
