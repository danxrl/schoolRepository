<?php

class PartidaModel extends Model {
    // Atributos de la clase
    private $id;
    private $volumen;
    private $peso;
    private $material_id;
    private $piezas;

    // Métodos privados de la clase
    private function calc_vp( $material_id = '', $piezas = 0 ) {
        $material = new MaterialController(); // Instancia de material
        $material_data = $material->read($material_id); // Metodo read de mateial con el id de material a buscar
        $espesor = $this->get_espesor($material_data[0]['calibre']); // Obtener el espesor del calibre para hacer el calculo
        $peso = ((float) $material_data[0]['peso']); // Conversión a float de peso
        $peso_total = $peso * $piezas; // Obtener el peso total de la partida
        $alto = ($material_data[0]['peralte'] + ($espesor * $piezas)) * 1.05; // Obtener el alto la partida
        $volumen = $material_data[0]['largo'] * $material_data[0]['ancho'] * $alto; //Obtener el volumen de la partida

        return $vp_data = array(
            'peso_total' => $peso_total,
            'volumen_total' => $volumen,
            'alto' => $alto,
            'largo' => (float) $material_data[0]['largo'],
            'ancho' => (float) $material_data[0]['ancho']
        );
    }

    private function get_espesor( $calibre = '' ){
        if ($calibre == '20') return 0.091;
        if ($calibre == '22') return 0.076;
        if ($calibre == '24') return 0.061;
        if ($calibre == '26') return 0.045;
        if ($calibre == '28') return 0.038;    
    }

    // Métodos de la clase
    public function create( $partida_data = array() ) {
        //Sentencia insert con los valores del objeto
        foreach ($partida_data as $key => $value) {
            // Variables variable
            $$key = $value;
        }

        $vp_data = $this->calc_vp($material_id, $piezas);

        $volumen = $vp_data['volumen_total'];
        $peso = $vp_data['peso_total'];

        $this->query = "INSERT INTO partida (volumen, peso, material_id, piezas) 
                        VALUES ($volumen, $peso, '$material_id', $piezas)";
        $this->set_query();
    }

    public function read( $partida_id = '' ) {
        $this->query = ($partida_id)
            ? "SELECT * FROM partida WHERE id = $partida_id"
            : "SELECT * FROM partida";

        $this->get_query();
        $num_rows = count($this->rows);
        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    }

    public function update( $partida_data = array() ) {
        foreach ($partida_data as $key => $value) {
            $$key = $value;
        }

        $vp_data = $this->calc_vp($material_id, $piezas);

        $volumen = $vp_data['volumen_total'];
        $peso = $vp_data['peso_total'];

        $this->query = "UPDATE partida SET 
                            volumen = $volumen,
                            peso = $peso,
                            material_id = '$material_id',
                            piezas = $piezas
                        WHERE id = $id";
        $this->set_query();
    }

    public function delete( $partida_id = '' ) {
        $this->query = "DELETE FROM partida WHERE id = $partida_id";
        $this->set_query();
    }
}