<?php

$dr = $_SERVER['DOCUMENT_ROOT'];

include_once $dr . '/_autoload.php';


LogIn::iniciaSession();

// Recoge el nombre de la sesión del header
$name = $_GET['name'];
// Recoge la marca del header
$marca = $_GET['marca'];

// Recoge todos los coches según la marca
$contenido = Carrep::findbyAllBrand($marca);

echo '
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcas de Coches</title>
    <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" href="../css/style.css">  <!-- Ajusta la ruta si es necesario -->
</head>';

// Escribe el titulo de la marca
Printer::title($marca);

Printer::formato();

$arraycoches = array();
$arraycoches = $_SESSION['carrito'];

if (isset($_GET['coche'])) {
    array_push($arraycoches, $_GET['coche']);
}
$_SESSION['carrito'] = $arraycoches;

echo '<div id="conteiner">';
foreach ($contenido as $element) {
    echo '<form action="coches.php?name=' . $name . '&marca=' . $marca . '&coche=' . $element->name . '" method="POST">
    <input name="coche" value="' . $element->name . '"disabled>    <button type="submit" id="">AÑADIR AL CARRITO</button><BR></BR>
    </form>';
}

// Añade el botón VER CARRITO
Printer::buttonPHP('VER CARRITO', 'carrito.php?name=' . $name . '&marca=' . $marca, 'POST');

// Establece la ruta de vuelta
$ruta = 'marcas.php?name=' . $name;

// Añade el botón de VOLVER
Printer::buttonPHP('VOLVER', $ruta, 'POST');
echo '</div>';
