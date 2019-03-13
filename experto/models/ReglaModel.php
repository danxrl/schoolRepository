<?php

class ReglaModel extends Model {
    // Atributos de la clase
    private $idr;
    private $consecuente;
    private $signo;

    // Métodos de la clase
    public function create( $regla_data = array() ){
        //Sentencia insert con los valores del objeto
        foreach ($regla_data as $key => $value) {
            // Variables variable
            $$key = $value;
        }

        $this->query = "INSERT INTO reglas (idr, consecuente, signo)
                        VALUES ('$idr', '$consecuente', '$signo')";
        $this->set_query();
    }

    public function read( $regla_id = '' ){
        $this->query = ($regla_id)
            ? "SELECT * FROM reglas WHERE id = '$regla_id'"
            : "SELECT * FROM reglas";

        $this->get_query();
        $num_rows = count($this->rows);
        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    }
}