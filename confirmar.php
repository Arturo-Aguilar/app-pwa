<?php
    include("conection.php");
    session_start();
    if(isset($con)){
        $usu=$_POST["USU"];
        $pas=$_POST["PASS"];
        if($usu!=null && $pas!=null){
			$query="select*from datospersonales as dp inner join usu_per as up on dp.id_dp=up.id_dp inner join usuarios as u on u.id_u=up.id_u where dp.estado=1 and u.usuarioutp='$usu'";//esta consulat verifica si el usuario existe
			$result=mysqli_query($con,$query);
			
			if($result){//si la variabale result es diferente a vacio traera toda la informacion de usuario
				$NewPass;
				while($row=mysqli_fetch_array($result)) {
					 $NewPass=$row['pasword'];//en esta parte se recorre los datos hasta adquirir la contraseña hasheada
				}

				//echo $_SESSION['nombreCompleto'];
			}
			if(!empty($NewPass) && password_verify("$pas", $NewPass)){
				$query="SELECT*FROM usuarios WHERE usuarioutp='$usu' and pasword='$NewPass'";
				$result=mysqli_query($con,$query);
				if($row=mysqli_num_rows($result)>0){

					$_SESSION['USUARIO']=$usu;

					$query="select *from datospersonales as dp inner join usu_per as up on dp.id_dp=up.id_dp
					inner join usuarios as u on u.id_u=up.id_u inner join rolesu as r on u.id_r=r.id_r where u.usuarioutp='{$_SESSION['USUARIO']}'";
					$result=mysqli_query($con,$query);
					if($result){
						$nomCom="";
						while($row=mysqli_fetch_array($result)) {
							$nomCom=$row['nombre']." ".$row['apellidoP']." ".$row['apellidoM'];
							//echo $row['nombre'].'<br/>';
							$sexo=$row['sexo'];
							$correo=$row['correo'];
							$division=$row['division'];
							$rol=$row['id_r'];
							$img=$row['foto'];
							$matricula=$row['usuarioutp'];
						}

						//echo $_SESSION['nombreCompleto'];
					}
					$_SESSION['imgPer']=$img;
					$_SESSION['nombreCompleto']=$nomCom;
					$_SESSION['sexo']=$sexo;
					$_SESSION['correo']=$correo;
					$_SESSION['division']=$division;
					$_SESSION['rol']=$rol;
					$_SESSION['matricula']=$matricula;
					header("location:principal.php");
					//$_SESSION['USUARIO'];
				}
				else{
					header("location: index.php");
				}
			}
			else{
				echo "<script> confirm('Usuario o Contraseña no validos'); </script>";
				echo "<script type='text/javascript'>window.location='index.php';</script>";
            	//header("location:index.php");
        	}
        }
        else{
			echo "<script> confirm('Usuario o Contraseña no validos'); </script>";
			echo "<script type='text/javascript'>window.location='index.php';</script>";
            //header("location:index.php");
        }
    }
?>