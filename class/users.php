<?php

!defined(BASE_URL) or exit("No puede acceder directamente al script.");

require_once BASE_PATH."models/users.php";

class Users {

	private $title;
	private $post;
	private $get;
	private $model;

	function __construct() {
		$this->title = "Ingreso de usuarios";
		$this->load_vars();
		$this->model = new Users_model();
	}

	public function index() {
		if(!isset($_SESSION) || empty($_SESSION)) :
			return $this->load_view('login');
		else :
			$this->result = $_SESSION;
			$this->load_view("data_user", $this->result);
		endif;
	}

	public function login() {
		if(!empty($this->post['usuario']) and !empty($this->post['password'])) :
			$this->result = $this->model->login($this->post);
			if(!empty($this->result)) :
				$_SESSION = $this->result;
				header("Location: ".BASE_URL);
			else :
				$error = new Error("El usuario y/o contraseña estan erroneos");
				$error = $error->show_error();
				$this->load_view(array("login", "error"), $error);
			endif;
		else :
			$error = new Error("El usuario y/o contraseña estan erroneos");
			$error = $error->show_error();
			$this->load_view(array("login", "error"), $error);
		endif;
	}

	public function load_view($vista = array(), $parameters = array()) {
		require_once(BASE_PATH."views/header.php");
		if(is_array($vista)) :
			foreach($vista as $view) :
				require_once(BASE_PATH."views/".$view.".php");
			endforeach;
		else :
			require_once(BASE_PATH."views/".$vista.".php");
		endif;
		require_once(BASE_PATH."views/footer.php");
		exit;
	}

	private function load_vars() {
		if(!empty($_POST)) :
			foreach($_POST as $k => $v) $this->post[$k] = trim(htmlentities($v));
		endif;
		if(!empty($_GET)) :
			foreach($_GET as $k => $v) $this->get[$k] = trim(htmlentities($v));
		endif;
	}

	public function salir() {
		session_destroy();
		unset($_SESSION);
		$this->index();
	}
}