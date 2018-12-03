<?php 
//0.- Activamos la utilización de sesiones
session_start();
ini_set("display_errors",1);

//1.- Capturamos datos desde el formulario inicial (index.html)
$var_email      = $_POST["txt_email"];
$var_clave      = $_POST["txt_clave"];


//1. Incluimos la clase Seguridad y Usuario
include('clases/Seguridad.class.php');
include('clases/Usuario.class.php');
//2. Creamos un objeto de la clase Seguridad y de la clase Usuario
$obj_seguridad  = new Seguridad();
$obj_usuario    = new Usuario();
//3. Invocamos el método de validación a través del objeto
echo $resultado = $obj_seguridad->verificarUsuarioClave($var_email,$var_clave);


//3.- Comparamos los datos del formulario que hemos recibido con los valores por defecto

if($resultado==1){
    /*Obtenemos los valores del método y lo almacenamos en una variable que 
    contiene el arreglo retornado.*/
    $arrDatosPersonales = $obj_usuario->obtenerDatosPersonales($var_email);
    //echo count($arrDatosPersonales);
    //Almacenamos en una variable local el nombre
    $nombreUsuario      = $arrDatosPersonales[0][1];
    //Almacenamos en una variable local el apellido
    $apellidoUsuario    = $arrDatosPersonales[0][2];
    //Obtenemos el id de usuario
    $idUsuario          = $arrDatosPersonales[0][0]; 

    //En caso de que coincida usuario y clave
    $_SESSION["ses_validado"]   = "si";
    $_SESSION["ses_nombre"]     = $nombreUsuario." ".$apellidoUsuario;
    //Creamos variables de sesión con el id de usuario obtenido
    $_SESSION["ses_id_usuario"] = $idUsuario;
    //Redireccionamos a home.php
    header("Location:home.php");
}else{
    //En caso de que no coincida el usuario y clave
    $_SESSION["ses_validado"]   ="no";
    header("Location:index.html");
}

?>