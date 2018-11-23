<?php

class AlmacenController {
    private $model;

    public function __construct(){
        $this->model = new AlmacenModel();
    }

    public function create( $almacen_data = array() ){
        return $this->model->create($almacen_data);
    }

    public function read( $almacen_id = '' ){
        return $this->model->read($almacen_id);
    }

    public function update( $almacen_data = array() ){
        return $this->model->update($almacen_data);
    }

    public function delete( $almacen_id = '' ){
        return $this->model->delete($almacen_id);
    }

}