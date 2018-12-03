<?php 
class Post{

    //Método para definir cantidad de publicaciones.
    function obtenerNumeroPublicaciones(){
        return 7;
    }
    function obtenerDatosPublicacionesUsuario($idUsuario){
        //PASO 1: Declaramos variable local
        $var_id_usuario     = $idUsuario;
        //PASO 2: Incluimos archivo de conexión
        include("C:/xampp/htdocs/facebook/database/mysqli.inc.php");
        //PASO 3: Definimos sentencia SQL
	    $sentenciaMYSQL="SELECT p.post_id,p.post,p.user_id,p.last_update FROM post p where p.user_id='$var_id_usuario' ORDER BY post_id DESC";
        
        //PASO 4: En caso de obtener correctamente los datos iniciamos el bloque. En caso contratio indicamos el error.
        if($resultado	=	$objetoMySQLi->query($sentenciaMYSQL)){ 
                //PASO 5: Si existen datos de resultado iniciamos la obtención de datos. Si no hay datos enviamos un mensaje.
                if($objetoMySQLi->affected_rows>0){ 
                    $i=0;
                    //PASO 6 : Se efectúa una iteración para incorporar al arreglo los datos obtenidos.
                    while($fila = $resultado->fetch_assoc()){
                        //PASO 7 : Se incorporan los datos al arreglo
                        $arreglo[$i]=array($fila['post_id'],$fila['post'],$fila['user_id'],$fila['last_update']);
                    $i++;
                    }
                    //PASO 8: Retornamos el arreglo.
                    return $arreglo;
                }else{ 
                    echo "La consulta no ha producido ningún resultado"; 
                } 
        }else{ 
            echo "<br>No ha podido realizarse la consulta. Ha habido un error<br>"; 
            echo "<i>Error:</i> ". $objetoMySQLi->error. "<i>Código:</i> ". $objetoMySQLi->errno; 
        } 
	$objetoMySQLi->close(); 

    }
    function obtenerComentariosPublicaciones($id){
        //PASO 1: Declaramos variable local
       // $var_id_usuario     = $idUsuario;
        //PASO 2: Incluimos archivo de conexión
        include("C:/xampp/htdocs/facebook/database/mysqli.inc.php");
        //PASO 3: Definimos sentencia SQL
        $sentenciaMYSQL="SELECT commentario_id,commentario, last_update FROM facebook.commentario where post_id=".$id." ORDER BY commentario_id ASC";
        
        //PASO 4: En caso de obtener correctamente los datos iniciamos el bloque. En caso contratio indicamos el error.
        if($resultado   =   $objetoMySQLi->query($sentenciaMYSQL)){ 
                //PASO 5: Si existen datos de resultado iniciamos la obtención de datos. Si no hay datos enviamos un mensaje.
                if($objetoMySQLi->affected_rows>0){ 
                    $i=0;
                    //PASO 6 : Se efectúa una iteración para incorporar al arreglo los datos obtenidos.
                    while($fila = $resultado->fetch_assoc()){
                        //PASO 7 : Se incorporan los datos al arreglo
                        $arreglo[$i]=array($fila['commentario_id'],$fila['commentario'],$fila['last_update']);
                    $i++;
                    }
                    //PASO 8: Retornamos el arreglo.
                    return $arreglo;
                }else{ 
                    echo "Sin Comentarios..."; 
                } 
        }else{ 
            echo "<br>No ha podido realizarse la consulta. Ha habido un error<br>"; 
            echo "<i>Error:</i> ". $objetoMySQLi->error. "<i>Código:</i> ". $objetoMySQLi->errno; 
        } 
    $objetoMySQLi->close(); 
    }
}
?>