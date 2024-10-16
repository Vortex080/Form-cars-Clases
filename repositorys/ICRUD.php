<?php

/**
 * Interface for create, read, update and delete
 * @interface
 * @name ICRUD
 */
interface ICRUD
{

    /**
     * Search by Id
     * @var $id
     */
    static function  getbyId($id);

    /**
     * Return an array with all
     */
    static function getAll();

    /**
     * Add the obj to an array
     * @var $obj
     */
    static function create($obj);

    /**
     * Find the obj and delete from the array
     * @var $obj
     */
    static function delete($obj);

    /**
     * Find the obj and replace the fields
     * @var $obj
     */
    static function update($obj);
}
