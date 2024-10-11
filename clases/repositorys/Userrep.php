<?php

include_once 'CRUDRep.php';

class Userrep implements ICRUD
{

    // Array de Usuario
    private static $userlist = [];

    /**
     * Saca por id del array
     * @var $id
     */
    public function getbyId($id)
    {

        return isset($this->userlist[$id]) ? $this->userlist[$id] : null;
    }

    /**
     * Saca el array entero
     */
    public function getAll()
    {
        return $this->userlist;
    }

    /**
     * Añade el Usuario al array list
     * @var $user
     */
    public function create($user)
    {
        $this->userlist[] = $user;
        return 1;
    }

    /**
     * Elimina el Usuario del array
     * @var $user
     */
    public function delete($user)
    {
        if (isset($this->userlist[$user->id])) {
            unset($this->userlist[array_search($user->id, $this->userlist)]);
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * Actualiza los campos de Usuario
     * @var $user
     */
    public function update($user)
    {
        if (isset($this->userlist[$user->id])) {
            $this->userlist[$user->id];
            return $this->userlist[$user->id];
        }
    }
}
