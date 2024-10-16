<?php

class Userrep implements ICRUD
{

    /**
     * Saca por id del array
     * @var $id
     */
    static public function getbyId($id)
    {
        $user = '';
        $con = Connection::getConection();
        $rest = $con->query('select nombre, correo, contraseña, apellidos from user where correo ="' . $id . '";');
        while ($row = $rest->fetch()) {

            $user = new User($row['nombre'], $row['apellidos'], $row['correo'], $row['contraseña']);
        }

        return $user;
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
        $stmt->execute($user->nombre, $user->apellido, $user->contraseña, $user->correo);
    }
}
