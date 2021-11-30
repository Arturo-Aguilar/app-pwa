<?php
	include('header.php');
	//include('footer.php');
	//include('NoSession.php');
 $to= $from= $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["comment"]) && !empty($_POST["To"]) && !empty($_POST["from"]) ) {
  $to = test_input($_POST["To"]);
  $from = test_input($_POST["from"]);
  $comment = test_input($_POST["comment"]);
	
  $para      = $to;
  $titulo    = 'Invenatrio UTP';
  $mensaje   = $comment;
  $cabeceras = 'From:'.$from . "\r\n" .
    'Reply-To: utp0005600@alumno.utpuebla.edu.mx' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

  mail($para, $titulo, $mensaje, $cabeceras);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
 
  return $data;
}
?>
	
	<form class="gmail-form"method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	  <div class="form-group row">
		<label for="staticEmail" class="col-sm-2 col-form-label">De:</label>
		<div class="col-sm-10">
		  <input type="text" name="from" readonly class="form-control-plaintext" id="staticEmail" value="atolex68@gmail.com">
		</div>
	  </div>
	 <div class="form-group row">
		<label for="staticEmail" class="col-sm-2 col-form-label">Para:</label>
		<div class="col-sm-10">
		  <input type="text" name="To" readonly class="form-control-plaintext" id="staticEmail" value="atolex69@gmail.com">
		</div>
	  </div>
	
	  <div class="form-group">
		<label for="exampleFormControlTextarea1">Example textarea</label>
		<textarea name="comment"class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
	  </div>
	  <button type="submit" class="btn btn-primary">Enviar</button>
	</form>
	
		
<?php
	if(!empty($mensaje) && !empty($para)){
		echo '<h1>El mensaje se envio';
		//echo $para .$from. $titulo.$mensaje.$cabeceras;
	}
	//include('header.php');
	include('footer.php');
	//include('NoSession.php');
?>
