<?php

include_once '../helpers/logIn.php';
include_once '../helpers/Connection.php';
include_once '../helpers/printer.php';

iniciaSession();

// Recoge el nombre de la sesión del header
$name = $_GET['name'];

// Recoge la marca del header
$marcasArch = $_GET['marca'];

// Lee el archivo junto a su direccón de ruta
$contenido = readArchive('../BD/' . $marcasArch . '.txt');

// Formatea el contenido del archivo
$marcas = formatArchive($contenido);

// Escribe el titulo de la marca
title($marcasArch);

$_SESSION[$name];

foreach ($marcas as $marcas => $url) {
    echo '<form action="coches.php?name=' . $name . '&marca=' . $marcasArch . '&coche=' . $url . '" method="POST">
    <input name="coche" value="' . $url . '"disabled>    <button type="submit" id="">AÑADIR AL CARRITO</button><BR></BR>
    </form>';
}

// Añade el botón VER CARRITO
buttonPHP('VER CARRITO', 'carrito.php?name=' . $name . '&marca=' . $marcasArch, 'POST');

// Establece la ruta de vuelta
$ruta = 'marcas.php?name=' . $name;

// Añade el botón de VOLVER
buttonPHP('VOLVER', $ruta, 'POST');
