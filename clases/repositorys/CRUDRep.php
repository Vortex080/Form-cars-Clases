<?php

    interface ICRUD {

        function getbyId($id);

        function getAll();

        function create($obj);

        function delete($obj);

        function update($obj);
    }

?>
