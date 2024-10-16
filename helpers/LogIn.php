<?php


class LogIn
{
    /**
     * Inicia la sesión
     */
    public static function iniciaSession()
    {
        session_start();
    }

    /**
     * Cierra la sesión
     */
    public static function cierraSession()
    {
        session_destroy();
    }

    /**
     * Crea la session
     * @var $nombre (para la creacion del $_SESSION)
     */
    public static function creaLogIn($nombre)
    {
        $_SESSION['user'] = $nombre;
    }

    /**
     * Cierra la sesión
     * @var $user (nombre de la sesión)
     */
    public static function logOut($user)
    {
        $_SESSION[$user] = '';
        LogIn::cierraSession();
    }

    /**
     * Devuelve si la sesión sigue iniciada
     */
    public static function statusLogIn()
    {
        return isset($_SESSION['user']);
    }

    /**
     * Description
     * @var $user
     * @var $valor
     */
    public static function escribirSession($user, $valor)
    {
        LogIn::iniciaSession();
        $_SESSION[$user] = $valor;
    }


    public static function leerSession($name)
    {
        return $_SESSION[$name];
    }
}
