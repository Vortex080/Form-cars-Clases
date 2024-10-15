<?php

$dr = $_SERVER['DOCUMENT_ROOT'];

include_once $dr . '/clases/helpers/logIn.php';
include_once $dr . '/clases/helpers/printer.php';
include_once $dr . '/clases/repositorys/Brandrep.php';

iniciaSession();

// Recoge el nombre de la sesión
$name = $_GET['name'];

// Lee el archivo
$contenido = Branchrep::getAll();

// Escribe el titulo de la marca
title('MARCAS');

foreach ($contenido as $element) {
    echo '<a href="coches.php?name=' . $name . '&marca=' . $element->name . '">' . $element->name . '</a> <br>';
}

// Añade el botón VER CARRITO
buttonPHP('VER CARRITO', 'carrito.php?name=' . $name, 'POST');

// Añade el botón LOGOUT
buttonPHP('LOGOUT', $dr . '/clases/helpers/logOut.php?name=' . $name, 'POST');
