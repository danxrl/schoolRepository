<?php

class ReglaController {
    private $model;

    public function __construct(){
        $this->model = new ReglaModel();
    }

    public function create( $regla_data = array() ){
        return $this->model->create($regla_data);
    }

    public function read( $regla_id = '' ){
        return $this->model->read($regla_id);
    }

    public function read_one( $id = '' ){
        return $this->model->read_one($id);
    }

    public function obtener_clausulas(){
        return $this->model->obtener_clausulas();
    }
}