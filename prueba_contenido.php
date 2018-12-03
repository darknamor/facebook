<?php session_start();
ini_set("display_errors",1);?>
<?php
//Capturamos valores recibidos por GET(Querystring)
$nombre                 = $_GET['p_nombre'];
$edad                   = $_GET['p_edad'];
$pesoActual             = $_GET['p_peso_actual'];

//Incluimos clase Salud
include('clases/Salud.class.php');
//Instanciamos la clase Salud
$obj_salud = new Salud();
//Asignamos valores a las propiedades
$obj_salud->nombre      = $nombre;
$obj_salud->edad        = $edad;
$obj_salud->pesoActual  = $pesoActual;
//Invocamos el método calcular peso ideal a través del objeto
$pesoIdeal          = $obj_salud->calcularPesoIdeal();
$estadoPeso         = $obj_salud->determinarEstadoPeso();

?>

<h1>
<?php 
//Asignamos a una variable local el valor de variable de sesión
$contador                   = $_SESSION["ses_contador"];
//Aumentamos el contador
$contador++;
//Asignamos el contador a la variable de sesión
$_SESSION["ses_contador"]   = $contador;
//Mostramos el valor de la variable de sesión (actualizada).
echo $_SESSION["ses_contador"];
?>
<br>
<div id="cnt_nombre"> Nombre : <?php echo $nombre?></div>
<div id="cnt_nombre">Edad : <?php echo $edad?></div>
<div id="cnt_peso_ideal">Peso Ideal  <?php echo $pesoIdeal;?></div>
<div id="cnt_estado_peso">Estado <?php echo $estadoPeso;?></div>
</h1>