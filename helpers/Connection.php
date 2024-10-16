<?php

class Connection
{
    // Objeto connection para conectarse a base de datos
    public static $con = null;


    /**
     * Crea la conexión con la base de datos
     * introduciendo los campos solicitados por el PDO
     */
    public static function getConection()
    {
        if (self::$con == null) {

            $host = 'mysql:localhost;port=3306;dbname=cars';
            $user = 'root';
            $pass = '';
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

            try {
                self::$con = new PDO($host, $user, $pass, $opciones);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        return self::$con;
    }
}
