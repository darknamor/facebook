<?php 
class Usuario{

    /** Obtención de datos personales del usuario */
    function obtenerDatosPersonales($email){
        //Declaramos una variable local con el parámetro de entrada
        $v_email = $email;
        //Incluimos archivo de conexión
        include("C:/xampp/htdocs/facebook/database/mysqli.inc.php");
        //Obtenemos los datos del usuario (id, nombre, apellido y género)
        $sentenciaMYSQL="SELECT user_id,first_name,last_name,genre_id from user where email='$v_email'"; 
         //ejecutamos la consulta
		$resultado	=	$objetoMySQLi->query($sentenciaMYSQL);
		//Obtenemos los valores de manera asociativa (Podemos utilizar el nombre de columna para acceder al dato)
        $fila = $resultado->fetch_assoc();
        //Incorporamos los valores a un arreglo. En este caso la estructura de bd nos entregará sólo 1 registro.
		$arreglo[0]=array($fila['user_id'],$fila['first_name'],$fila['last_name'],$fila['genre_id']);
	     //Retornamos el arreglo
        return $arreglo;
        //Cerramos la conexión
		$objetoMySQLi->close(); 


    }
}
?>