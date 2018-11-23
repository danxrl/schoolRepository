<?php

class TransporteController {
    private $model;

    public function __construct() {
        $this->model = new TransporteModel();
    }

    public function create( $transporte_data = array() ) {
        return $this->model->create($transporte_data);
    }

    public function read( $transporte_id = '' ) {
        return $this->model->read($transporte_id);
    }

    public function update( $transporte_data = array() ) {
        return $this->model->update($transporte_data);
    }

    public function delete( $transporte_id = '' ) {
        return $this->model->delete($transporte_id);
    }

}