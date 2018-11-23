<?php

class PedidoModel extends Model {
    // Atributos de la clase
    private $id;
    private $cliente_id;
    private $direccion;
    private $almacen_id;
    private $transporte_id;
    private $fecha_solicitud;
    private $fecha_envio;
    private $fecha_entrega;
    private $status;
    private $observaciones;

    // Métodos de la clase
    public function create( $pedido_data = array() ) {
        //Sentencia insert con los valores del objeto
        foreach ($pedido_data as $key => $value) {
            // Variables variable
            $$key = $value;
        }

        $this->query = "INSERT INTO pedido (cliente_id, direccion, almacen_id, transporte_id, fecha_envio, fecha_entrega, status, observaciones) 
                        VALUES ($cliente_id, '$direccion', '$almacen_id', '$transporte_id', null, null, '$status', '$observaciones')";
        $this->set_query();
    }

    public function read( $pedido_id = '' ) {
        $this->query = ($pedido_id)
            ? "SELECT * FROM pedido WHERE id = '$pedido_id'"
            : "SELECT * FROM pedido ORDER BY id DESC";

        $this->get_query();
        $num_rows = count($this->rows);
        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    }

    public function update( $pedido_data = array() ) {
        foreach ($pedido_data as $key => $value) {
            $$key = $value;
        }

        $this->query = "UPDATE pedido SET
                            cliente_id = $cliente_id,
                            direccion = '$direccion',
                            almacen_id = '$almacen_id',
                            transporte_id = '$transporte_id',
                            status = '$status',
                            observaciones = '$observaciones'
                        WHERE id = $id";
        $this->set_query();
    }

    public function delete( $pedido_id = '' ) {
        $this->query = "DELETE FROM pedido WHERE id = $pedido_id";
        $this->set_query();
    }

    public function modificar_status( $pedido_data = array() ) {
        foreach ($pedido_data as $key => $value) {
            $$key = $value;
        }

        if ($status == 'Enviado')   $this->query = "UPDATE pedido SET fecha_envio = CURRENT_TIMESTAMP, status = '$status' WHERE id = $id";
        if ($status == 'Entregado') $this->query = "UPDATE pedido SET fecha_entrega = CURRENT_TIMESTAMP, status = '$status' WHERE id = $id";
        if ($status == 'Cancelado') $this->query = "UPDATE pedido SET fecha_entrega = CURRENT_TIMESTAMP, status = '$status' WHERE id = $id";
        if ($status == 'Devuelto') $this->query  = "UPDATE pedido SET fecha_envio = null, fecha_entrega = null, status = '$status' WHERE id = $id";

        $this->set_query();
    }
}