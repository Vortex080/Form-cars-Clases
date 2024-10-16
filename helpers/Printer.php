<?php

class Printer
{
    /**
     * Pinta un h1 con la variable pasada
     * @var $content
     */
    public static function title($content)
    {
        echo `<h1>$content</h1>`;
    }

    /**
     * Añade un botón
     * @var $content Contenido que aparece en el botón
     * @var $redirect Redirecciona hacia la donde se a indicado
     * @var $method metodo del formulario
     */
    public static function buttonPHP($content, $redirect, $method)
    {
        echo '<form action="' . $redirect . '" method="' . $method . '"><button type="submit">' . $content . '</button></form>';
    }


    public static function formato()
    {
        echo '
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Marcas de Coches</title>
            <!-- Enlace al archivo CSS -->
            <link rel="stylesheet" href="../css/style.css">  <!-- Ajusta la ruta si es necesario -->
        </head>';
    }
}
