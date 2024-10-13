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
    function getbyId($id);

    /**
     * Return an array with all
     */
    function getAll();

    /**
     * Add the obj to an array
     * @var $obj
     */
    function create($obj);

    /**
     * Find the obj and delete from the array
     * @var $obj
     */
    function delete($obj);

    /**
     * Find the obj and replace the fields
     * @var $obj
     */
    function update($obj);
}
