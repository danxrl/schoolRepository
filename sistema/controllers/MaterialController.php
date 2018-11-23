<?php

class MaterialController {
    private $model;

    public function __construct() {
        $this->model = new MaterialModel();
    }

    public function create( $material_data = array() ) {
        return $this->model->create($material_data);
    }

    public function read( $material_id = '' ) {
        return $this->model->read($material_id);
    }

    public function update( $material_data = array() ) {
        return $this->model->update($material_data);
    }

    public function delete( $material_id = '' ) {
        return $this->model->delete($material_id);
    }
}