<?php

$dr = $_SERVER['DOCUMENT_ROOT'];

include_once $dr . '/clases/models/User.php';
include_once $dr . '/clases/helpers/Connection.php';
include_once $dr . '/clases/repositorys/CRUDRep.php';


class Userrep implements ICRUD
{

    /**
     * Saca por id del array
     * @var $id
     */
    static public function getbyId($id)
    {
        $con = Connection::getConection();
        $array = [];
        $rest = $con->query('select nombre, correo, contraseña, apellidos from coches where id ="' . $id . '";');
        while ($row = $rest->fetch()) {

            $user = new User($row['nombre'], $row['apellidos'], $row['correo'], $row['contraseña']);
            array_push($array, $user);
        }

        return $array;
    }

    /**
     * Saca el array entero
     */
    static public function getAll()
    {
        $con = Connection::getConection();
        $aray = [];
        $rest = $con->query('select nombre, apellidos, correo, contraseña from user;');
        while ($row = $rest->fetch()) {

            $user = new User($row['nombre'], $row['apellidos'], $row['correo'], $row['contraseña']);
            array_push($aray, $user);
        }

        return $aray;
    }

    /**
     * Añade el Usuario al array list
     * @var $user
     */
    static public function create($user)
    {
        $con = Connection::getConection();
        $sql = 'insert into user(nombre, apellidos, correo, contraseña) values (?, ?, ?, ?)';
        $stmt = $con->prepare($sql);
        $stmt->execute([$user->name, $user->apellidos, $user->correo, $user->password]);
    }

    /**
     * Elimina el Usuario del array
     * @var $user
     */
    static public function delete($user)
    {
        $con = Connection::getConection();
        $sql = 'delete from users where correo=?';
        $stmt = $con->prepare($sql);
        $stmt->execute([$user->correo]);
    }

    /**
     * Actualiza los campos de Usuario
     * @var $user
     */
    static public function update($user)
    {
        $con = Connection::getConection();
        $sql = 'update user set nombre=?, apellido=?, contraseña=? where correo=?';
        $stmt = $con->prepare($sql);
        $stmt->execute($user->correo);
    }
}
