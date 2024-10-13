<?php

/**
 * Pinta un h1 con la variable pasada
 * @var $content
*/
function title($content)
{
    echo `<h1>$content</h1>`;
}

/**
 * Añade un botón
 * @var $content Contenido que aparece en el botón
 * @var $redirect Redirecciona hacia la donde se a indicado
 * @var $method metodo del formulario
*/
function buttonPHP($content, $redirect, $method)
{
    echo '<form action="' . $redirect . '" method="' . $method . '"><button type="submit">' . $content . '</button></form>';
}
