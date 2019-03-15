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
            $consecuente = $consecuentes[$i];
            $id_atomo = (int) $consecuente[0];
            $signo = (int)$consecuente[1];
            $this->query = "INSERT INTO reglas (regla, consecuente, signo) VALUES ('$idr', $id_atomo, $signo)";
            $this->set_query();
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
                            INNER JOIN atomos_reglas a ON r.regla = a.idr
                            INNER JOIN atomos t ON a.atomo_id = t.id";

        $this->get_query();
        $atomos = $this->rows;
        $this->rows = null;

        $this->query = "SELECT r.regla, t.atomo, r.signo FROM reglas r
                            INNER JOIN atomos t ON r.consecuente = t.id";

        $this->get_query();
        $consecuentes = $this->rows;
        $this->rows = null;

        $aux_atomos_array = $this->_juntar_atomos($atomos);
        $aux_consec_array = $this->_juntar_atomos($consecuentes);

        $reglas_array = array();
        $rule_siguiente = '';
        foreach ($atomos as $rule) {
            if ($rule['regla'] != $rule_siguiente) {
                $rule_siguiente = $rule['regla'];
                array_push($reglas_array, $rule['regla']);
            }
        }

        return array(
            'reglas' => $reglas_array,
            'antecedentes' => $aux_atomos_array,
            'consecuentes' => $aux_consec_array
        );

    }

    private function _juntar_atomos($data_array) {
        $aux_array = array();
        $string = '';
        $siguiente_regla = $data_array[0]['regla'];
        $regla_actual = '';
        for ($i=0; $i < sizeof($data_array); $i++) {
            if ($regla_actual != $siguiente_regla) {
                array_push($aux_array, $string);
                $string = '';
                $regla_actual = $siguiente_regla;

                if ($data_array[$i]['signo'] == 0) { $string = '~' . $data_array[$i]['atomo']; }
                else { $string = $data_array[$i]['atomo']; }

                if (isset($data_array[$i+1]['regla'])) {
                    $siguiente_regla = $data_array[$i+1]['regla'];
                } else {
                    array_push($aux_array, $string);
                    array_shift($aux_array);
                }

            } else {

                if ($data_array[$i]['signo'] == 0) { $string = $string . ' ^ ~' . $data_array[$i]['atomo']; }
                else { $string = $string . ' ^ ' . $data_array[$i]['atomo']; }

                if (isset($data_array[$i+1]['regla'])) {
                    $siguiente_regla = $data_array[$i+1]['regla'];
                } else {
                    array_push($aux_array, $string);
                    array_shift($aux_array);
                }
            }
        }
        return $aux_array;
    }
}