<?php

/**
 * Car repository class
 * @class
 * @name Carrep
 * @implements ICRUD
 */
class Carrep implements ICRUD
{

    /**
     * Saca por id del array
     * @var $id
     */
    static public function getbyId($id)
    {
        $con = Connection::getConection();
        $rest = $con->query('select id, nombre, marca from coches where id ="' . $id . '";');
        while ($row = $rest->fetch()) {

            $car = new Car($row['id'], $row['marca'], $row['nombre']);
        }

        return $car;
    }

    /**
     * Saca el array entero
     */
    static public function getAll()
    {
        $con = Connection::getConection();
        $array = [];
        $rest = $con->query('select id, nombre, marca from coches;');
        while ($row = $rest->fetch()) {
            $car = new car($row['id'], $row['nombre'], $row['id']);
            array_push($array, $car);
        }

        return $array;
    }

    /**
     * Añade el marca al array list
     * @var $car
     */
    static public function create($car)
    {
        $con = Connection::getConection();
        $sql = 'insert into coches(id,nombre,marca) values (?, ?,?)';
        $stmt = $con->prepare($sql);
        $stmt->execute([$car->id, $car->name, $car->brand]);
    }

    /**
     * Elimina el marca del array
     * @var $car
     */
    static public function delete($car)
    {
        $con = Connection::getConection();
        $sql = 'delete from coches where id=?';
        $stmt = $con->prepare($sql);
        $stmt->execute([$car->id]);
    }

    /**
     * Actualiza los campos de marca
     * @var $car
     */
    static public function update($car)
    {
        $con = Connection::getConection();
        $sql = 'update coches set nombre=?, marca=? where id=?';
        $stmt = $con->prepare($sql);
        $stmt->execute($car->nombre, $car->brand, $car->id);
    }

    /**
     * Busca el coche por la marca
     * @var $brand
     */
    static public function findbyAllBrand($brand)
    {
        $con = Connection::getConection();
        $array = [];
        $rest = $con->query('select id, nombre, marca from coches where marca ="' . $brand . '";');
        while ($row = $rest->fetch()) {

            $car = new car($row['id'], $row['marca'], $row['nombre']);
            array_push($array, $car);
        }

        return $array;
    }

    /**
     * Busca el coche por el nombre
     * @var $name
     */
    static public function getbyName($name)
    {
        $con = Connection::getConection();
        $array = [];
        $rest = $con->query('select id, nombre, marca from coches where nombre ="' . $name . '";');
        while ($row = $rest->fetch()) {

            $car = new Car($row['id'], $row['marca'], $row['nombre']);
            array_push($array, $car);
        }

        return $array;
    }
}
