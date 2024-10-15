<?php

/**
 * User class
 * @class
 * @name User
 */
class User
{
    // Name
    public $name;

    public $apellido;

    public $correo;

    public $pass;

    public function __construct($name, $apellido, $correo, $pass)
    {
        $this->name = $name;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->pass = $pass;
    }
}
