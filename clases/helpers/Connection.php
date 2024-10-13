<?php

/**
 * Clase connection parseada para el uso de archivos txt
 * @class
 * @name Connection
*/

/**
 * Verificación del archivo si existe
 * @var $name
 */
function verificationFile($name)
{
    if (file_exists($name)) {
        return fopen($name, 'r+');
    } else {
        return fopen($name, 'w');
    }
}

function readArchive($name)
{
    return file_get_contents($name);
}

function formatArchive($name)
{
    return array_unique(array_map('trim', explode(';', $name)));
}
