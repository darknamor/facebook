<?php session_start();?>

<?php 
//Obtenemos id de publicación
$var_id             = $_GET["id"];
//Creamos una variable de sesion  de la publicacion
$cnt_publicacion    = "publicacion_$var_id";
//Si la variable tiene un valor disminuimos su valor. Si no tiene valores, se aumenta.
if($_SESSION[$cnt_publicacion]==1){
    $_SESSION[$cnt_publicacion]=0;
}else{
    echo "<img src='img/like_20x21.png'> ".$_SESSION["ses_nombre"];
    $_SESSION[$cnt_publicacion]=1;
}

?>