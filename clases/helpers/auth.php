<?php

include_once 'logIn.php';
include_once 'Connection.php';

iniciaSession();

//Nombre archivo
$nombreArchivo = '../BD/datos.csv';
// Array de datos
$datos = [];

$archivo = verificationFile($nombreArchivo);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

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

    // Rellenamos el array de datos
    while(($datos = fgetcsv($archivo)) !==false){
        // Verificamos si el email existe
        if(array_search($email, $datos)){
            echo 'Usuario ya creado <br>';
            // Verificamos si la contraseña es correcta
            if (!password_verify($pass, $datos[3])){
                echo 'Contraseña incorrecta <br>';
            } else {
                // Variable guarda el host
                $host = $_SERVER['HTTP_HOST'];
                // Ruta del servidor
                $ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                // Archivo de la ruta
                $html = 'marcas.php';
                // Redirección al html
                header("Location:../vista/marcas.php?name=".$name);
                logIn($name);
                if (!isset($_SESSION['carrito'])){
                    $_SESSION['carrito'] = [];
                }
            }
        } else {
            echo 'Usuario inexistente';
        }
    }



} else {
    echo 'ERROR: Se esperaba un metodo POST y se a recibido ' . $_SERVER['REQUEST_METHOD'];
}

fclose($archivo);
