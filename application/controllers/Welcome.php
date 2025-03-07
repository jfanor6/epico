<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('DatosModel');
    }

	public function index()
	{
		$data['datos'] = $this->DatosModel->mostrarDatos();
		$data['categorias'] = $this->DatosModel->categorias();
		$this->load->view('welcome_message', $data);
	}


	public function guardar() {

		$nombre = $this->input->post('nombre');
		$categoria = $this->input->post('categoria');
		$preciocost = $this->input->post('preciocost');
		$preciounit = $this->input->post('preciounit');
		$adjunto = $this->input->post('adjunto'); // Si necesitas este campo

		$this->DatosModel->guardar($nombre, $categoria, $preciocost, $preciounit, $adjunto);
		echo "Datos guardados correctamente!";
	}

	public function eliminar()
	{
		$id = $this->input->post('id');
	
		// Verificar si el id es válido
		if ($id) {
			$result = $this->DatosModel->eliminar($id);
			
			// Verificar si la eliminación fue exitosa
			if ($result) {
				echo "Datos eliminados correctamente!";
			} else {
				echo "Error al eliminar los datos.";
			}
		} else {
			echo "ID no proporcionado.";
		}
	}

	public function editar()
	{
		// Verifica si los datos están siendo recibidos correctamente
		$id = $this->input->post('id');
		$nombre = $this->input->post('nombre');  
		$categoria = $this->input->post('categoria');
		$preciocost = $this->input->post('preciocost');
		$preciounit = $this->input->post('preciounit');
		$adjunto = $this->input->post('adjunto');
	
		// Depuración de los valores recibidos
		echo "<pre>";
		echo "id: " . print_r($id, true) . "<br>";
		echo "nombre: " . print_r($nombre, true) . "<br>";
		echo "categoria: " . print_r($categoria, true) . "<br>";
		echo "preciocost: " . print_r($preciocost, true) . "<br>";
		echo "preciounit: " . print_r($preciounit, true) . "<br>";
		echo "adjunto: " . print_r($adjunto, true) . "<br>";
		echo "</pre>";
	
		$this->load->model('DatosModel');
		$actualizado = $this->DatosModel->editar($id, $nombre, $categoria, $preciocost, $preciounit, $adjunto);
	
		if ($actualizado) {
			echo "Datos se editaron correctamente...!";
		} else {
			echo "Error al editar los datos.";
		}
	}

	public function guardarCateg() {

		$nombre = $this->input->post('nombre');

		$this->DatosModel->guardarCateg($nombre);
		echo "Datos guardados correctamente!";
	}



}
