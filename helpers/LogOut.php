<?php

class LogOut
{
    public $host = $_SERVER['HTTP_HOST'];
    // Ruta del servidor
    public $ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    // Archivo de la ruta
    public $html = 'index.php';

    public static function redirect($host, $ruta, $html)
    {
        // Redirección al html
        header("Location:http://$host$ruta/$html");
    }
}
