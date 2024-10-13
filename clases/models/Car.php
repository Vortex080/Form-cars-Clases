<?php

include_once 'Branch.php';

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
    public Branch $branch;
    // Model
    public string $model;

    public function __construct(Branch $branch, $model)
    {
        $this->branch = $branch;
        $this->model = $model;
    }
}
