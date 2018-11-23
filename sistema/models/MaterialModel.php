<?php

class MaterialModel extends Model {
    // Atributos de la clase
    private $id;
    private $descripcion;
    private $calibre;
    private $peso;
    private $largo;
    private $ancho;
    private $peralte;

    // Métodos de la clase
    public function create( $material_data = array() ) {
        //Sentencia insert con los valores del objeto
        foreach ($material_data as $key => $value) {
            // Variables variable
            $$key = $value;
        }

        $this->query = "INSERT INTO material (id, descripcion, calibre, peso, largo, ancho, peralte) 
                        VALUES ('$id', '$descripcion', '$calibre', $peso, $largo, $ancho, $peralte)";
        $this->set_query();
    }

    public function read( $material_id = '' ) {
        $this->query = ($material_id)
            ? "SELECT * FROM material WHERE id = '$material_id'"
            : "SELECT * FROM material";

        $this->get_query();
        $num_rows = count($this->rows);
        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    }

    public function update( $material_data = array() ) {
        foreach ($material_data as $key => $value) {
            $$key = $value;
        }

        $this->query = "UPDATE material SET 
                            descripcion = '$descripcion',
                            calibre = '$calibre',
                            peso = $peso,
                            largo = $largo,
                            ancho = $ancho,
                            peralte = $peralte
                        WHERE id = '$id'";
        $this->set_query();
    }

    public function delete( $material_id = '' ) {
        $this->query = "DELETE FROM material WHERE id = '$material_id'";
        $this->set_query();
    }
}