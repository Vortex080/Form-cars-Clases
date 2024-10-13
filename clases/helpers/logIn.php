<?php


/**
 * Inicia la sesión
 */
function iniciaSession()
{
    session_start();
}

/**
 * Cierra la sesión
 */
function cierraSession()
{
    session_destroy();
}

/**
 * Crea la session
 * @var $nombre (para la creacion del $_SESSION)
 */
function logIn($nombre)
{
    $_SESSION['user'] = $nombre;
}

/**
 * Cierra la sesión
 * @var $user (nombre de la sesión)
 */
function logOut($user)
{
    $_SESSION[$user] = '';
    cierraSession();
}

/**
 * Devuelve si la sesión sigue iniciada
 */
function statusLogIn()
{
    return isset($_SESSION['user']);
}

/**
 * Description
 * @var $user
 * @var $valor
 */
function escribirSession($user, $valor)
{
    iniciaSession();
    $_SESSION[$valor] = $user;
}
