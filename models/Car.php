<?php

/**
 * Car class
 * @class
 * @name Car
 */
class Car
{
    // ID
    public $id;
    // Branch of the car
    public $brand;
    // name
    public string $name;

    public function __construct($id, $brand, $name)
    {
        $this->id = $id;
        $this->brand = $brand;
        $this->name = $name;
    }
}
