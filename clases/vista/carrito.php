<?php

$dr = $_SERVER['DOCUMENT_ROOT'];

include_once $dr . '/clases/helpers/logIn.php';
include_once $dr . '/clases/helpers/printer.php';

iniciaSession();

// Verifica si en el header existe la variable coche
if (isset($_GET['coche'])) {
    // Recoge la variable del header
    $quitar = $_GET['coche'];
}

// Recoge el nombre de la sessión del header
$name = $_GET['name'];

// Verifica si existe la variable marca del header
if (isset($_GET['marca'])) {
    // Recoge la variable
    $marca = $_GET['marca'];
}

// Recoge los modelos de la sesión
$modelos = $_SESSION['carrito'];

// Verifica si la variable quitar estar llena
if (!empty($quitar)) {
    // Saca el indice de las variables que hay que quitar
    $i = array_search($quitar, $modelos);
    // Elimina los modelos del indice
    unset($modelos[$i]);
    $_SESSION['carrito'] = $modelos;
}

foreach ($modelos as $model) {
    // Verifica si la marca existe para redireccionar hacia una pagina u otra
    if (isset($_GET['marca'])) {
        if (isset($model) != '') {
            echo $model . '<form action="carrito.php?name=' . $name . '&marca=' . $marca . '&coche=' . $model . '" method="POST"><button type="submit">BORRAR</button></form><BR></BR> ';
        }
    } else {
        if (isset($mode) != '') {
            echo $model . '<form action="carrito.php?name=' . $name . '&coche=' . $model . '" method="POST"><button type="submit">BORRAR</button></form><BR></BR> ';
        }
    }
}

// Verifica si la variable marc aesta rellena en el header
if (isset($_GET['marca'])) {
    $ruta = 'coches.php?name=' . $name . '&marca=' . $marca;
} else {
    $ruta = 'marcas.php?name=' . $name;
}

// Añade un botón volver, con la ruta señalizada antes y con el metodo post
buttonPHP('VOLVER', $ruta, 'POST');
