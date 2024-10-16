<?php

spl_autoload_register(function ($clase) {
    // Directorio raíz del proyecto
    $rootDir = $_SERVER['DOCUMENT_ROOT'];

    // Rutas de las carpetas donde están las clases
    $directories = [
        '/helpers/',
        '/models/',
        '/repositorys/',
        '/vista/',
    ];

    // Recorremos los directorios para buscar la clase
    foreach ($directories as $directory) {
        $fichero = $rootDir . $directory . $clase . '.php';
        // Si el archivo existe, lo incluimos
        if (file_exists($fichero)) {
            require_once $fichero;
            return;
        }
    }

    // Si no se encuentra el archivo, se lanza una excepción
    throw new UnexpectedValueException("No se pudo cargar la clase: $clase");
});
