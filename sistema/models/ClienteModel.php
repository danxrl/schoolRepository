<?php

class ClienteModel extends Model {
    // Atributos de la clase
    private $id;
    private $nombre;
    private $direccion;
    private $telefono;
    private $correo;
    private $rfc;

    // Métodos de la clase
    public function create( $cliente_data = array() ){
        //Sentencia insert con los valores del objeto
        foreach ($cliente_data as $key => $value) {
            // Variables variable
            $$key = $value;
        }

        $this->query = "INSERT INTO cliente (nombre, direccion, telefono, correo, rfc) 
                        VALUES ('$nombre', '$direccion', '$telefono', '$correo', '$rfc')";
        $this->set_query();
    }

    public function read( $cliente_id = '' ){
        $this->query = ($cliente_id)
            ? "SELECT * FROM cliente WHERE id = $cliente_id"
            : "SELECT * FROM cliente";

        $this->get_query();
        $num_rows = count($this->rows);
        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    }

    public function update( $cliente_data = array() ){
        foreach ($cliente_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "UPDATE cliente SET
                            nombre = '$nombre',
                            direccion = '$direccion',
                            telefono = '$telefono',
                            correo = '$correo',
                            rfc = '$rfc'
                        WHERE id = $id";
        $this->set_query();
    }

    public function delete( $cliente_id = '' ){
        $this->query = "DELETE FROM cliente WHERE id = $cliente_id";
        $this->set_query();
    }

}