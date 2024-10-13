<?php

include_once 'logIn.php';

$host = $_SERVER['HTTP_HOST'];
// Ruta del servidor
$ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
// Archivo de la ruta
$html = 'index.html';
logOut($_GET['name']);

// Redirección al html
header("Location:http://$host$ruta/$html");
