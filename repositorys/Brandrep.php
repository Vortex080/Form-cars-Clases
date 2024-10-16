<?php

class Brandrep implements ICRUD
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
     * getAll
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
     * create
     *
     * @param  mixed $brand
     * @return void
     */
    static public function create($brand)
    {
        $con = Connection::getConection();
        $sql = 'insert into marcas(id,nombre) values (?, ?)';
        $stmt = $con->prepare($sql);
        $stmt->execute([$brand->id, $brand->name]);
    }


    /**
     * delete
     *
     * @param  mixed $brand
     * @return void
     */
    static public function delete($brand)
    {
        $con = Connection::getConection();
        $sql = 'delete from marcas where id=?';
        $stmt = $con->prepare($sql);
        $stmt->execute([$brand->id]);
    }


    /**
     * update
     *
     * @param  mixed $brand
     * @return void
     */
    static public function update($brand)
    {
        $con = Connection::getConection();
        $sql = 'update marcas set nombre=? where id=?';
        $stmt = $con->prepare($sql);
        $stmt->execute($brand->nombre, $brand->id);
    }
}
