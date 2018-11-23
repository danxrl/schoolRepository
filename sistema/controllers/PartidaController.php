<?php

class PartidaController {
    private $model;

    public function __construct() {
        $this->model = new PartidaModel();
    }

    public function create( $partida_data = array() ) {
        return $this->model->create($partida_data);
    }

    public function read( $partida_id = '' ) {
        return $this->model->read($partida_id);
    }

    public function update( $partida_data = array() ) {
        return $this->model->update($partida_data);
    }

    public function delete( $partida_id = '' ) {
        return $this->model->delete($partida_id);
    }
}