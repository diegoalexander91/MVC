<?php
include_once '../model/database.php';

session_start();

if (isset($_GET['cerrar_sesion'])) {
    session_unset();
    session_destroy();
    header('location: login.php');
}
/* */
if (isset($_SESSION['rol'])) {
    switch ($_SESSION['rol']) {
        case 1:
            header('location: ../view/admin.php');
            break;
        case 2:
            echo "Este es un usuario de consulta";
            header('location: ../view/consulta.php');
            break;
        case 3:
            header('location: ../view/operador.php');
            break;
        default:
            header('location: login.php');
            break;
    }
}
/* */

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = new DB();
    $query = $db->connect()->prepare('SELECT * FROM accesos WHERE username = :username AND password = :password');
    $query->execute(['username' => $username, 'password' => $password]);

    $row = $query->fetch(PDO::FETCH_NUM);

    if ($row == true) {

        // initialize session variables
        $_SESSION['logged_in_user_id'] = '1';
        $_SESSION['logged_in_user_name'] = 'Diego';

        $username = $row[1];
        $rol = $row[3];
        $_SESSION['username'] = $username;
        $_SESSION['rol'] = $rol;
        switch ($rol) {
            case 1:
                header('location: ../view/admin.php');
                break;
            case 2:
                header('location: ../view/consulta.php');
                break;
            case 3:
                header('location: ../view/operador.php');
                break;
            default:
                header('location: login.php');
                break;
        }
    } else {
        echo "No existe el usuario o contraseña. " . $row . "" . $username . ":" . $password;
    }
}
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/estilos.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="container">
        <div class="centrado">

            <head class="centrado">Binvenido al sistema de asignación de claves para llamadas a celular</head>
        </div>
        <div class="row">
            <div class="col">

            </div>
            <div class="col-6">
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Introduzca su usuario">
                        <small id="emailHelp" class="form-text text-muted">Introduzca el usuario de inicio de sesión asignado.</small>
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col">

            </div>

        </div>

    </div>
</body>

<!-- Importación de jquery, popper y js de bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>