<?php

include_once '../helpers/logIn.php';
include_once '../helpers/Connection.php';
include_once '../helpers/printer.php';

iniciaSession();

$marcasArchive = '../BD/marcas.txt';

$name = $_GET['name'];

$contenido = readArchive($marcasArchive);

$marcas = formatArchive($contenido);

title('MARCAS');

foreach ($marcas as $marcas => $url) {
    echo '<a href="coches.php?name=' . $name . '&marca=' . $url . '">' . $url . '</a> <br>';
}

buttonPHP('VER CARRITO', 'carrito.php?name=' . $name, 'POST');
buttonPHP('LOGOUT', 'logout.php?name=' . $name, 'POST');
