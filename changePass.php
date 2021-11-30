<?php
	include('header.php');
	
	//include('NoSession.php');
?>

<div class="container">
		<div class="card">
			<h3>Cambiar contraseña</h3>
			<p>La contraseña se cambiara PRECAUCIÓN</p>

	<div class="container">
	  <form action="confirmarPass.php" method="post">
		<label for="psw">Password</label>
		<input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="Contraseña">

		<label for="">Password</label>
		<input type="password" name="psw2"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required placeholder="Repetir contraseña">
		<input type="submit" value="Enviar">
	  </form>
	</div>
	</div>
			<div id="message">
			  <h3>La contraseña debe contener lo siguiente:</h3>
			  <p id="letter" class="invalid">Una <b>letra</b> minuscula</p>
			  <p id="capital" class="invalid">Una <b>letra</b> mayúscula</p>
			  <p id="number" class="invalid">Un <b>numero</b></p>
			  <p id="length" class="invalid">Minimo <b>8 caracteres</b></p>
			</div>
			<?php
				if(!empty($_SESSION['warnings'])):
			?>
				<script>
					confirm("<?php echo $_SESSION['warnings'];?>");
				</script>
			<?php
				
				$_SESSION['warnings']=null;
				endif;
			?>
</div>

<?php
	include('footer.php');
?>	