<?php 
session_start();
if(isset($_SESSION['ses_validado'])){
    session_destroy();
}

//session_destroy();
header("Location: ../index.html");
?>