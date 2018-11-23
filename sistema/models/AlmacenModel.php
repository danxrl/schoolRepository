<?php

class AlmacenModel extends Model {
    // Atributos de la clase
    private $id;
    private $nombre;
    private $direccion;
    private $telefono;
    private $correo;

    // Métodos de la clase
    public function create( $almacen_data = array() ){
        //Sentencia insert con los valores del objeto
        foreach ($almacen_data as $key => $value) {
            // Variables variable
            $$key = $value;
        }

        $this->query = "INSERT INTO almacen (id, nombre, direccion, telefono, correo) 
                        VALUES ('$id', '$nombre', '$direccion', '$telefono', '$correo')";
        $this->set_query();
    }

    public function read( $almacen_id = '' ){
        $this->query = ($almacen_id)
            ? "SELECT * FROM almacen WHERE id = '$almacen_id'"
            : "SELECT * FROM almacen";

        $this->get_query();
        $num_rows = count($this->rows);
        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }

        return $data;
    }

    public function update( $almacen_data = array() ){
        foreach ($almacen_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "UPDATE almacen SET
                            nombre = '$nombre',
                            direccion = '$direccion',
                            telefono = '$telefono',
                            correo = '$correo'
                        WHERE id = '$id'";
        $this->set_query();
    }

    public function delete( $almacen_id = '' ){
        $this->query = "DELETE FROM almacen WHERE id = '$almacen_id'";
        $this->set_query();
    }
}