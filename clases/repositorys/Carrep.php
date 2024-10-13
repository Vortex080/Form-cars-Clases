<?php

include_once 'CRUDRep.php';

/**
 * Car repository class
 * @class
 * @name Carrep
 * @implements ICRUD
*/
class Carrep implements ICRUD
{

    // Array de coches
    private static $carlist = [];

    /**
     * Saca por id del array
     * @var $id
    */
    public function getbyId($id)
    {

        return isset($this->carlist[$id]) ? $this->carlist[$id] : null;
    }

    /**
     * Saca el array entero
     */
    public function getAll()
    {
        return $this->carlist;
    }

    /**
     * Añade el coche al array list
     * @var $car
     */
    public function create($car)
    {
        $this->carlist[] = $car;
        return 1;
    }

    /**
     * Elimina el coche del array
     * @var $car
     */
    public function delete($car)
    {
        if (isset($this->carlist[$car->id])) {
            unset($this->carlist[array_search($car->id, $this->carlist)]);
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * Actualiza los campos de coche
     * @var $car
     */
    public function update($car)
    {
        if (isset($this->carlist[$car->id])) {
            $this->carlist[$car->id];
            return $this->carlist[$car->id];
        }
    }
}
