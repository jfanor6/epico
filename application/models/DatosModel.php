<?php
 class datosModel extends  CI_model{

    public function __construct()
    {
        $this->load->database('datos');        
    }

    public function guardar($nombre,$categoria,$preciocost,$preciounit,$adj)
    {
        return $this->db->insert("epico_items", [
            "name"=>$nombre, 
            "category_id"=>$categoria,
            "cost_price"=>$preciocost,
            "unit_price"=>$preciounit,
            "pic_filename"=>$adj
        ]);
    }

    public function mostrarDatos()
    {
        $query = $this->db->get('epico_items');
        return $query->result_array();  
    }

    public function categorias()
    {
        $query = $this->db->get('epico_categories');
        return $query->result_array(); 
    }

    public function eliminar($id)
    {
        // Eliminar el registro
        return $this->db->delete('epico_items', array('id' => $id));  // Devuelve TRUE o FALSE
    }

    public function editar($id, $nombre, $categoria, $preciocost, $preciounit, $adjunto)
    {
        $datos2 = array(
            'name' => $nombre,
            'category_id' => $categoria,
            'cost_price' => $preciocost,
            'unit_price' => $preciounit,
            'pic_filename' => $adjunto
        );
    
        $this->db->where('id', $id);
        $this->db->update('epico_items', $datos2);
    
        // Depuración: imprime la última consulta SQL para ver si se está ejecutando correctamente.
        log_message('debug', 'Última consulta SQL: ' . $this->db->last_query());
    
        return $this->db->affected_rows() > 0;  // Verifica si se afectaron filas
    }

    public function guardarCateg($nombre)
    {
        return $this->db->insert("epico_categories", [
            "name"=>$nombre
        ]);
    }

}

?>