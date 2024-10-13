<?php


/**
 * Branch class
 * @class
 * @name Branch
 */
class Branch
{
    // ID
    public $id;
    // name
    public $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}
