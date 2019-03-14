<?php

class ReglaModel extends Model {
    // Atributos de la clase
    private $idr;
    private $consecuente;
    private $signo;

    // Métodos de la clase
    public function create( $regla_data = array() ){
        $consecuentes = $regla_data['consecuentes'];
        $atomos = $regla_data['atomos'];
        $idr = $regla_data['idr'];

        for ($i=0; $i < sizeof($consecuentes); $i++) { 
            /* $consecuente = $consecuentes[$i];
            $id_atomo = (int) $consecuente[0];
            $signo = (int)$consecuente[1];
            $this->query = "INSERT INTO reglas (regla, consecuente, signo) VALUES ('$idr', $id_atomo, $signo)";
            $this->set_query(); */
        }

        for ($j=0; $j < sizeof($atomos); $j++) { 
            $atomo = $atomos[$j];
            $atomo_id = (int) $atomo[0];
            $signo = (int) $atomo[1];
            $this->query = "INSERT INTO atomos_reglas (idr, atomo_id, signo)
                VALUES ('$idr', $atomo_id, $signo)";
            $this->set_query();
        }
    }

    public function read( $regla_id = '' ) {

        $this->query = "SELECT r.regla, t.atomo, a.signo FROM reglas r
                            INNER JOIN atomos_reglas a ON r.id = a.idr
                            INNER JOIN atomos t ON a.atomo_id = t.id";

        $this->get_query();
        $atomos = $this->rows;
        $this->rows = null;

        $this->query = "SELECT r.regla, t.atomo, r.signo FROM reglas r
                            INNER JOIN atomos t ON r.consecuente = t.id";

        $this->get_query();
        $consecuentes = $this->rows;
        $this->rows = null;

        foreach ($consecuentes as $key => $value) {
            # code...
        }

        var_dump($atomos);
        var_dump($consecuentes);
    }
}