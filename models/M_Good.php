<?php

class M_Good {
    private $table = "goods";

    private $id_good;
    private $name;
    private $price;
    private $id_category;
    private $status;

    public function __construct($name, $price, $id_category, $status)
    {
        $this->name = $name;
        $this->price = $price;
        $this->id_category = $id_category;
        $this->status = $status;
    }

    public function save(){
// сделано в M_Admin
    }

    public function update(){

    }

    public function getById($id){

    }

    public function findByName($name){

    }

    public function getAll(){
        
    }
}