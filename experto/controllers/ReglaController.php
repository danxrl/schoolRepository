<?php

class ReglaController {
    private $model;

    public function __construct(){
        $this->model = new ReglaController();
    }

    public function create( $regla_data = array() ){
        return $this->model->create($regla_data);
    }

    public function read( $regla_id = '' ){
        return $this->model->read($regla_id);
    }
/*
    public function update( $regla_data = array() ){
        return $this->model->update($regla_data);
    }

    public function delete( $almacen_id = '' ){
        return $this->model->delete($almacen_id);
    }
*/
}