<?php
	include("conection.php");
    session_start();
	if(isset($con)){
		$psw=$_POST['psw'];
		$psw2=$_POST['psw2'];
		if(!empty($psw) && !empty($psw2)){//verifica si los campos estan vacios
			if($psw == $psw2){
				if($psw!=null){
					$Pass=password_hash("$psw", PASSWORD_DEFAULT);//

					$usu=$_SESSION['USUARIO'];
					$query="update usuarios set pasword='$Pass' where usuarioutp='$usu'";

					$result=mysqli_query($con,$query);
					if(!$result){
						die('Query fallido');
					}
					else{
						$_SESSION['warnings']='Se guardo con exito la contraseña:';
						//$_SESSION['errorcar']='Guardado';
						//header('location:changePass.php');
					}
				}

			}
			elseif($psw != $psw2){
				$_SESSION['warnings']='No coincide la contraseña vuelve a intentarlo';
			}
		}else
			$_SESSION['warnings']='Los campos se encuentran vacíos';
		header('location:changePass.php');
	}
?>
