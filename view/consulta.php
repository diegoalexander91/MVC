<?php 

session_start();

if (!isset($_SESSION['rol'])) {
    header('location: ../controller/login.php');
}
else{
    if($_SESSION['rol'] != 2){
        header('location: ../controller/login.php');
    }
}

?>
<a href="../controller/login.php?cerrar_sesion">Cerrar Sesion</a>