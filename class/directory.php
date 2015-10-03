<?php
!defined(BASE_URL) or exit("No puede acceder directamente al script.");

require_once("users.php");

class DirectoryManager extends Users {

	function _construct() {
		parent::__construct();
		$this->title = "Directorio";
	}

	public function index() {
		if(isset($_SESSION) and !empty($_SESSION)) return parent::load_view("directorio");
		else return parent::index();
	}
}