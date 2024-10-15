<?php

$dr = $_SERVER['DOCUMENT_ROOT'];

include_once 'logIn.php';

include_once $dr . '/clases/repositorys/Userrep.php';
include_once $dr . '/clases/helpers/Connection.php';

iniciaSession();

// Array de datos

$datos = Userrep::getAll();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Variable nombre
    $name = $_POST['name'];
    // Variable apellidos
    $surname = $_POST['surname'];
    // Variable email
    $email = $_POST['email'];
    // Variable password
    $pass = $_POST['password'];
    // Encriptación de contraseña
    $password = password_hash($pass, PASSWORD_DEFAULT);

    $datos = Userrep::getAll();
    if (array_search($email, array_column($datos, 'correo'))) {
  
        echo 'Usuario ya creado <br>';
        // Verificamos si la contraseña es correcta
        foreach ($datos as $element){
            if (!password_verify($pass, $element->pass)) {
                echo 'Contraseña incorrecta <br>';
            } else {
                // Variable guarda el host
                $host = $_SERVER['HTTP_HOST'];
                // Ruta del servidor
                $ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                // Archivo de la ruta
                $html = 'marcas.php';
                // Redirección al html
                header("Location:../vista/marcas.php?name=" . $name);
                logIn($name);
                if (!isset($_SESSION['carrito'])) {
                    $_SESSION['carrito'] = [];
                }
            }
        }
    } else {

        echo 'Usuario inexistente';
    }
} else {
    echo 'ERROR: Se esperaba un metodo POST y se a recibido ' . $_SERVER['REQUEST_METHOD'];
}

