<?php   
    $dbHost='127.0.0.1';
    $dbName='Prestamo';
    $dbUser='root';
    $dbPass="Benito290496$";
    $con=mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
    try{
        if(isset($con)){
            return $con;
			//echo"conexion yes";
        }
    }catch(Exception $ex){
        echo $ex=getMessage();
        //echo 'error';
    }
?>
<!