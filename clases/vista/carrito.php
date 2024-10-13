<?php

include_once '../helpers/logIn.php';
include_once '../helpers/printer.php';

iniciaSession();

if (isset($_GET['coche'])){
    $quitar = $_GET['coche'];
}
$name = $_GET['name'];
if (isset($_GET['marca'])){
    $marca = $_GET['marca'];
}

$modelos = $_SESSION[$name];
if (!empty($quitar)){
    $i = array_search($quitar, $modelos);
    unset($modelos[$i]);
}

foreach($modelos as $model){
    if(isset($_GET['marca'])){
        echo $model. '<form action="carrito.php?name='.$name.'&marca='.$marca.'&coche='.$model.'" method="POST"><button type="submit">BORRAR</button></form><BR></BR> ';
    } else{

        echo $model. '<form action="carrito.php?name='.$name.'&coche='.$model.'" method="POST"><button type="submit">BORRAR</button></form><BR></BR> ';
    }
}

if (isset($_GET['marca'])){
    $ruta = 'coches.php?name='.$name.'&marca='.$marca;
} else {
    $ruta = 'marcas.php?name='.$name;
}

buttonPHP('VOLVER', $ruta, 'POST');
