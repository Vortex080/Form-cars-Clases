<?php

$dr = $_SERVER['DOCUMENT_ROOT'];

include_once $dr . '/_autoload.php';

LogIn::iniciaSession();

// Recoge el nombre de la sesión
$name = $_GET['name'];

Printer::formato();

// Recoge todas las marcas de la BD
$contenido = Brandrep::getAll();

// Escribe el titulo de la marca
Printer::title('MARCAS');
echo '<div id="container">';
foreach ($contenido as $element) {
    echo '<a href="coches.php?name=' . $name . '&marca=' . $element->name . '">' . $element->name . '</a> <br>';
}
echo '<div>';
// Añade el botón VER CARRITO
Printer::buttonPHP('VER CARRITO', 'carrito.php?name=' . $name, 'POST');

// Añade el botón LOGOUT
Printer::buttonPHP('LOGOUT', $dr . '/clases/helpers/logOut.php?name=' . $name, 'POST');
