<?php

class TransporteModel extends Model {
    // Atributos de la clase
    private $id;
    private $marca;
    private $ejes;
    private $capacidad;
    private $largo;
    private $ancho;
    private $alto;
    private $caja;

    // Métodos de la clase
    public function create( $transporte_data = array() ){
        //Sentencia insert con los valores del objeto
        foreach ($transporte_data as $key => $value) {
            // Variables variable
            $$key = $value;
        }

        $this->query = "INSERT INTO transporte (id, descripcion, marca, ejes, capacidad, ancho, largo, alto, caja) 
                        VALUES ('$id', '$descripcion', '$marca', $ejes, $capacidad, $largo, $ancho, $alto, '$caja')";
        $this->set_query();
    }

    public function read( $transporte_id = '' ){
        $this->query = ($transporte_id)
            ? "SELECT * FROM transporte WHERE id = '$transporte_id'"
            : "SELECT * FROM transporte";

        $this->get_query();
        $num_rows = count($this->rows);
        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    }

    public function update( $transporte_data = array() ){
        foreach ($transporte_data as $key => $value) {
            $$key = $value;
        }

        $this->query = "UPDATE transporte SET
                            descripcion = '$descripcion',
                            marca = '$marca',
                            ejes = $ejes,
                            capacidad = $capacidad,
                            largo = $largo,
                            ancho = $ancho,
                            alto = $alto,
                            caja = '$caja'
                        WHERE id = '$id'";
        $this->set_query();
    }

    public function delete( $transporte_id = '' ){
        $this->query = "DELETE FROM transporte WHERE id = '$transporte_id'";
        $this->set_query();
    }
}