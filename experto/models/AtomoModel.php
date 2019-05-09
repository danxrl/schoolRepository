<?php

class AtomoModel extends Model {
    // Atributos de la clase
    private $id;
    private $atomo;

    // Métodos de la clase
    public function create( $atomo_data = array() ){
        //Sentencia insert con los valores del objeto
        foreach ($atomo_data as $key => $value) {
            // Variables variable
            $$key = $value;
        }

        $this->query = "INSERT INTO atomos (atomo)
                        VALUES ('$atomo')";
        $this->set_query();
    }

    public function read( $atomo_id = '' ){
        $this->query = ($atomo_id)
            ? "SELECT * FROM atomos WHERE id = '$atomo_id' ORDER BY id ASC"
            : "SELECT * FROM atomos ORDER BY id ASC";

        $this->get_query();
        $num_rows = count($this->rows);
        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    }
}