<?php
!defined(BASE_URL) or exit("No puede acceder directamente al script.");

class Error {
	private $error_msg = array();
	var $type;

	function __construct($msg = "") {
		$this->error_msg['msg'] = $msg;
	}

	public function show_error() {
		$this->error_msg['type'] = "danger";
		return $this->error_msg;
	}

	public function show_warning() {
		$this->error_msg['type'] = "warning";
		return $this->error_msg;
	}

	public function show_success() {
		$this->error_msg['type'] = "success";
		return $this->error_msg;
	}

	public function show_info() {
		$this->error_msg['type'] = "info";
		return $this->error_msg;
	}
}