<?php session_start();
$_SESSION["ses_contador"]=0;
?>
<html>
<head>
<!-- Incluimos los archivos necesarios (js) -->
<script language="javascript" src="scripts/jquery-3.3.1.min.js"></script>
<script language="javascript" src="scripts/load_content.js"></script>
<script language="javascript" src="js/funciones.js"></script>
</head>
<body>
<h1>Prueba Ajax - <?php echo Date("Y-m-d H:i:s");?> </h1><hr>
<form>
    <label>Nombre</label>
    <input type="text" id="txt_nombre" placeholder="Ingrese nombre">
    <input type="text" id="txt_edad" placeholder="Ingrese edad">
    <input type="text" id="txt_peso_actual" placeholder="Ingrese peso actual">
    <input type="button" value="Enviar" onclick="cargarContenido();">
</form>
<!-- Contenedor para cargar el contenido externo (prueba_contenido.php)-->
<div id="cnt_contenido"></div>
</body>
</html>