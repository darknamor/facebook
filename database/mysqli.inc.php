<?php
ini_set("display_errors",1);
$servername = "localhost";
$username 	= "root";
$password 	= "";
$dbname     = "facebook";

$objetoMySQLi=@new mysqli ($servername,$username,$password,$dbname); 
// Check connection
	if ($objetoMySQLi->connect_error) {
	    die("Error en la conexión" . $objetoMySQLi->connect_error);
	}
?>