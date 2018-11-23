<?php

class MovimientoModel extends Model {
    // Atributos de la clase
    private $id;
    private $material_id;
    private $almacen_id;
    private $cantidad;
    private $tipo_movimiento;
    private $fecha_movimiento;

    // Métodos de la clase movimiento
    private function movimiento_material( $move_data = array() ) {
        foreach ($move_data as $key => $value) {
            // Variables variable
            $$key = $value;
        }

        $inventario_data = $this->get_inventario($almacen_id, $material_id);

        if(!$inventario_data) {
            $this->query = "INSERT INTO inventario (material_id, almacen_id, cantidad) 
                        VALUES ('$material_id', '$almacen_id', $cantidad)";
            $this->set_query();
        } else {
            $total = $this->get_cantidad($inventario_data, $cantidad, $tipo_movimiento);
            $this->query = "UPDATE inventario SET cantidad = $total WHERE (material_id = '$material_id' AND almacen_id = '$almacen_id')";
            $this->set_query();
        }
    }

    private function get_cantidad( $inventario_data, $cantidad, $tipo_movimiento ){
        if($tipo_movimiento == 'Entrada') {
            return ($inventario_data[0]['cantidad'] + $cantidad);
        } elseif($tipo_movimiento == 'Salida') {
            return ($inventario_data[0]['cantidad'] - $cantidad);
        }
    }

    private function get_inventario( $almacen_id, $material_id ) {
        $this->query = "SELECT cantidad FROM inventario WHERE (almacen_id = '$almacen_id' AND material_id = '$material_id')";

        $this->get_query();
        $num_rows = count($this->rows);
        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    }

    // Métodos de la clase model
    public function create( $movimiento_data = array() ){
        //Sentencia insert con los valores del objeto
        foreach ($movimiento_data as $key => $value) {
            // Variables variable
            $$key = $value;
        }

        $this->query = "INSERT INTO movimiento (material_id, almacen_id, cantidad, tipo_movimiento, fecha_movimiento) 
                        VALUES ('$material_id', '$almacen_id', $cantidad, '$tipo_movimiento', CURRENT_TIMESTAMP)";
        $this->set_query();

        $this->movimiento_material($movimiento_data);
    }

    public function read( $movimiento_id = '' ){
        $this->query = ($movimiento_id)
            ? "SELECT * FROM movimiento WHERE id = '$movimiento_id'"
            : "SELECT * FROM movimiento";

        $this->get_query();
        $num_rows = count($this->rows);
        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    }

    public function mov_por_almacen( $movimiento_id = '' ){
        $this->query = ($movimiento_id)
            ? "SELECT * FROM movimiento WHERE almacen_id = '$movimiento_id'"
            : "SELECT * FROM movimiento";

        $this->get_query();
        $num_rows = count($this->rows);
        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    }

    public function update( $movimiento_data = array() ){
        foreach ($movimiento_data as $key => $value) {
            $$key = $value;
        }

        $this->query = "UPDATE movimiento SET
                            material_id = '$material_id',
                            almacen_id = '$almacen_id',
                            cantidad = $cantidad, 
                            tipo_movimiento = '$tipo_movimiento'
                        WHERE id = $id";
        $this->set_query();
    }

    public function delete( $movimiento_id = '' ){
        $this->query = "DELETE FROM movimiento WHERE id = $movimiento_id";
        $this->set_query();
    }
}