<?php

class ClienteController {
    private $model;

    public function __construct(){
        $this->model = new ClienteModel();
    }

    public function create( $cliente_data = array() ){
        return $this->model->create($cliente_data);
    }

    public function read( $cliente_id = '' ){
        return $this->model->read($cliente_id);
    }

    public function update( $cliente_data = array() ){
        return $this->model->update($cliente_data);
    }

    public function delete( $cliente_id = '' ){
        return $this->model->delete($cliente_id);
    }

}