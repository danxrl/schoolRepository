<?php

class AtomoController {
    private $model;

    public function __construct(){
        $this->model = new AtomoModel();
    }

    public function create( $atomo_data = array() ){
        return $this->model->create($atomo_data);
    }

    public function read( $atomo_id = '' ){
        return $this->model->read($atomo_id);
    }
}