<?php

$dr = $_SERVER['DOCUMENT_ROOT'];

include_once $dr . '/clases/helpers/logIn.php';
include_once $dr . '/clases/helpers/Connection.php';
include_once $dr . '/clases/helpers/printer.php';
include_once $dr . '/clases/repositorys/Carrep.php';

iniciaSession();

// Recoge el nombre de la sesión del header
$name = $_GET['name'];

// Recoge la marca del header
$marca = $_GET['marca'];

$contenido = Carrep::findbyBrand($marca);

// Escribe el titulo de la marca
title($marca);


foreach ($contenido as $element) {
    echo '<form action="coches.php?name=' . $name . '&marca=' . $marca . '&coche=' . $element->name . '" method="POST">
    <input name="coche" value="' . $element->name . '"disabled>    <button type="submit" id="">AÑADIR AL CARRITO</button><BR></BR>
    </form>';
}

$arraycoches = array();
$arraycoches = $_SESSION['carrito'];

if (isset($_GET['coche'])) {
    array_push($arraycoches, $_GET['coche']);
}
$_SESSION['carrito'] = $arraycoches;

// Añade el botón VER CARRITO
buttonPHP('VER CARRITO', 'carrito.php?name=' . $name . '&marca=' . $marca, 'POST');

// Establece la ruta de vuelta
$ruta = 'marcas.php?name=' . $name;

// Añade el botón de VOLVER
buttonPHP('VOLVER', $ruta, 'POST');
