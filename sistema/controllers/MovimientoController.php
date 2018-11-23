<?php

class MovimientoController {
    private $model;

    public function __construct() {
        $this->model = new MovimientoModel();
    }

    public function create( $movimiento_data = array() ) {
        return $this->model->create($movimiento_data);
    }

    public function read( $movimiento_id = '' ) {
        return $this->model->read($movimiento_id);
    }

    public function mov_por_almacen( $movimiento_id = '' ) {
        return $this->model->mov_por_almacen($movimiento_id);
    }

    public function update( $movimiento_data = array() ) {
        return $this->model->update($movimiento_data);
    }

    public function delete( $movimiento_id = '' ) {
        return $this->model->delete($movimiento_id);
    }

}