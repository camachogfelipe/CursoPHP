<?php

!defined(BASE_URL) or exit("No puede acceder directamente al script.");

class Users_model {

	private $db;
	private $result;

	public function login($post) {
		$this->db = new BD();
		$this->db->where_data(array("email=" => $post['usuario']));
		$this->db->where_data(array("password=" => $post['password']));
		$this->db->where_data(array("activo=" => "S"));
		$this->db->select(array("email","nombres", "apellidos", "create_date", "activo", "nombre AS nombre_grupo"));
		$this->db->join("grupos", "usuarios.grupo_id=grupos.id");
		$this->db->set_tabla("usuarios");
		$this->db->select_data();
		$this->result = $this->db->result("assoc", 1);
		return $this->result;
	}
}