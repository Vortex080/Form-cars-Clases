<?php

    include_once 'Branch.php';

    class Car {

        public $id;
        public Branch $branch;
        public string $model;

        public function __construct(Branch $branch, $model){
            $this->branch=$branch;
            $this->model=$model;
        }

    }


?>

