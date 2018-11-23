<?php

class PedidoController {
    private $model;

    public function __construct() {
        $this->model = new PedidoModel();
    }

    public function create( $pedido_data = array() ) {
        return $this->model->create($pedido_data);
    }

    public function read( $pedido_id = '' ) {
        return $this->model->read($pedido_id);
    }

    public function update( $pedido_data = array() ) {
        return $this->model->update($pedido_data);
    }

    public function delete( $pedido_id = '' ) {
        return $this->model->delete($pedido_id);
    }

    public function modificar_status( $pedido_data = array() ) {
        return $this->model->modificar_status($pedido_data);
    }
}