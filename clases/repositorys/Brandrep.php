<?php

$dr = $_SERVER['DOCUMENT_ROOT'];

include_once $dr . '/clases/repositorys/CRUDRep.php';
include_once $dr . '/clases/models/Branch.php';
include_once $dr . '/clases/helpers/Connection.php';

class Branchrep implements ICRUD
{
    /**
     * Saca por id del array
     * @var $id
     */
    static public function getbyId($id)
    {
        $con = Connection::getConection();
        $array = [];
        $rest = $con->query('select id, nombre from marcas where id ="' . $id . '";');
        while ($row = $rest->fetch()) {

            $marca = new Brand($row['id'], $row['nombre']);
            array_push($array, $marca);
        }

        return $array;
    }

    /**
     * Saca el array entero
     */
    static public function getAll()
    {
        $con = Connection::getConection();
        $array = [];
        $rest = $con->query('select id, nombre from marcas;');
        while ($row = $rest->fetch()) {

            $brand = new Brand($row['id'], $row['nombre']);
            array_push($array, $brand);
        }

        return $array;
    }

    /**
     * Añade el marca al array list
     * @var $brand
     */
    static public function create($brand)
    {
        $con = Connection::getConection();
        $sql = 'insert into marcas(id,nombre) values (?, ?)';
        $stmt = $con->prepare($sql);
        $stmt->execute([$brand->id, $brand->name]);
    }

    /**
     * Elimina el marca del array
     * @var $brand
     */
    static public function delete($brand)
    {
        $con = Connection::getConection();
        $sql = 'delete from marcas where id=?';
        $stmt = $con->prepare($sql);
        $stmt->execute([$brand->id]);
    }

    /**
     * Actualiza los campos de marca
     * @var $brand
     */
    static public function update($brand)
    {
        $con = Connection::getConection();
        $sql = 'update marcas set nombre=? where id=?';
        $stmt = $con->prepare($sql);
        $stmt->execute($brand->nombre, $brand->id);
    }
}
