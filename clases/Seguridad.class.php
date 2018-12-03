<?php class Seguridad {
    function verificarUsuarioClave($email,$clave){
    	$v_email 	= $email;
    	$v_clave	= ($clave);
    			
    	//include ("/var/www/html/facebook/database/mysqli.inc.php");
        //include("../facebook/database/mysqli.inc.php");
        
        include("C:/xampp/htdocs/facebook/database/mysqli.inc.php");
        //Definir consulta SQL
        $sentenciaMYSQL="SELECT 1 from user where email='$v_email' and password='$v_clave'"; 
        //Ejecutamos la consulta
        $objetoMySQLi->query($sentenciaMYSQL);
        //Contar las filas de resultado
    	$v_encontrados = $objetoMySQLi->affected_rows;
        //Retornamos el valor
        return $v_encontrados;
        //Cerramos la conexión
    	$objetoMySQLi->close(); 
    }
}
?>