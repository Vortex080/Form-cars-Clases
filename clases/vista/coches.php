<?php

include_once '../helpers/logIn.php';
include_once '../helpers/Connection.php';
include_once '../helpers/printer.php';

iniciaSession();

$name = $_GET['name'];
$marcasArch = $_GET['marca'];

$contenido = readArchive('../BD/' . $marcasArch . '.txt');

$marcas = formatArchive($contenido);

title($marcasArch);

foreach ($marcas as $marcas => $url) {
    echo '<form action="coches.php?name=' . $name . '&marca=' . $marcasArch . '&coche=' . $url . '" method="POST">
    <input name="coche" value="' . $url . '"disabled>    <button type="submit" id="">AÑADIR AL CARRITO</button><BR></BR>
    </form>';
}

buttonPHP('VER CARRITO', 'carrito.php?name=' . $name . '&marca=' . $marcasArch, 'POST');
$ruta = 'marcas.php?name=' . $name;
buttonPHP('VOLVER', $ruta, 'POST');
