<?php 
class Postear{

    function crearPublicacion(){
        //echo 'gato';
        $var_id_usuario = $_POST['id_usuario']; 
        $var_contenido_post =$_POST['contenido_post']; 
        //PASO 2: Incluimos archivo de conexión
        include("C:/xampp/htdocs/facebook/database/mysqli.inc.php");
        //PASO 3: Definimos sentencia SQL
	    $sentenciaMYSQL="INSERT INTO `facebook`.`post` (`post`, `user_id`) VALUES ('".$var_contenido_post."', '".$var_id_usuario."')";
        //PASO 4: En caso de obtener correctamente los datos iniciamos el bloque. En caso contratio indicamos el error.
        if($objetoMySQLi->query($sentenciaMYSQL)=== TRUE){ 
            echo "New record created successfully";
        }else{ 
            echo "<br>No ha podido realizarse la consulta. Ha habido un error<br>"; 
            echo $objetoMySQLi."<i>Error:</i> ". $objetoMySQLi->error. "<i>Código:</i> ". $objetoMySQLi->errno; 
        } 
	$objetoMySQLi->close();
    }

}
$obj_post = new Postear();
$obj_post->crearPublicacion();
?>