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
}