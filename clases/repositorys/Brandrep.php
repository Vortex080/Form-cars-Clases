<?php

include_once 'CRUDRep.php';

class Branchrep implements ICRUD
{

    // Array de marcas
    private static $branchlist = [];

    /**
     * Saca por id del array
     * @var $id
     */
    public function getbyId($id)
    {

        return isset($this->branchlist[$id]) ? $this->branchlist[$id] : null;
    }

    /**
     * Saca el array entero
     */
    public function getAll()
    {
        return $this->branchlist;
    }

    /**
     * Añade el marca al array list
     * @var $branch
     */
    public function create($branch)
    {
        $this->branchlist[] = $branch;
        return 1;
    }

    /**
     * Elimina el marca del array
     * @var $branch
     */
    public function delete($branch)
    {
        if (isset($this->branchlist[$branch->id])) {
            unset($this->branchlist[array_search($branch->id, $this->branchlist)]);
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * Actualiza los campos de marca
     * @var $branch
     */
    public function update($branch)
    {
        if (isset($this->branchlist[$branch->id])) {
            $this->branchlist[$branch->id];
            return $this->branchlist[$branch->id];
        }
    }
}
