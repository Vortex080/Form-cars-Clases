<?php

/**
 * User class
 * @class
 * @name User
 */
class User
{
    // ID
    public $id;
    // Name
    public $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}
