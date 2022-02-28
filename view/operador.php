<?php 

session_start();

if (!isset($_SESSION['rol'])) {
    header('location: login.php');
}
else{
    if($_SESSION['rol'] != 3){
        header('location: login.php');
    }
}

?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Bienvenido <?php $usuario ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/estilos.css" rel="stylesheet" type="text/css">

</head>

<body>
    <h1>Colaborador
</body>