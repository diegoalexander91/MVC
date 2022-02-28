<!-- Small modal -->
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/estilos.css" rel="stylesheet" type="text/css">

</head>

<body>
    <h1>Bienvenido <?php echo $usuario;?></h1>
    <a href="../controller/login.php?cerrar_sesion">Cerrar Sesion</a>
</body>
