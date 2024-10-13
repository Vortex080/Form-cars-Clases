<?php

include_once '../helpers/logIn.php';
include_once '../helpers/Connection.php';
include_once '../helpers/printer.php';

iniciaSession();

// Dirección de las marcas
$marcasArchive = '../BD/marcas.txt';

// Recoge el nombre de la sesión
$name = $_GET['name'];

// Lee el archivo
$contenido = readArchive($marcasArchive);

// Formatea el contenido del archivo
$marcas = formatArchive($contenido);

// Escribe el titulo de la marca
title('MARCAS');

foreach ($marcas as $marcas => $url) {
    echo '<a href="coches.php?name=' . $name . '&marca=' . $url . '">' . $url . '</a> <br>';
}

// Añade el botón VER CARRITO
buttonPHP('VER CARRITO', 'carrito.php?name=' . $name, 'POST');

// Añade el botón LOGOUT
buttonPHP('LOGOUT', '../logout.php?name=' . $name, 'POST');
