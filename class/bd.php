<?php
!defined(BASE_URL) or exit("No puede acceder directamente al script.");

class BD {

	private $bd;
	private $campos;
	private $where;
	private $join;
	private $result;

	function __construct() {
		$this->db = new mysqli("localhost", "root", "", "directorio");

		if($this->db->connect_errno) :
			$msg = "No se pudo conectar a la base de datos.";
			$msg .= " Error #: ".$this->db->connect_errno;
			$obj = new Error($msg);
			$obj = $obj->show_error();
			Users::load_view(array("login", "error"), $obj);
		endif;
	}

	public function set_tabla($tabla) {
		$this->table = trim($tabla);
	}

	public function where_data($where = array()) {
		if(is_array($where)) :
			foreach($where as $k => $v) $this->where[] = $k."'".$v."'";
		else :
			$this->where[] = $where;
		endif;
	}

	public function select($campos = array()) {
		if(is_array($campos)) :
			foreach($campos as $v) $this->select[] = $v;
		else :
			$this->select[] = $campos;
		endif;
	}

	public function select_data() {
		$sql = "SELECT ".implode(",", $this->select)." FROM ".$this->table;
		$sql .= (!empty($this->join)) ? " ".implode(" ", $this->join) : "";
		$sql .= (!empty($this->where)) ? " WHERE ".implode(" AND ", $this->where) : "";
		//exit($sql);
		if(!$this->result = $this->db->query($sql)) :
			$msg = " Error #: ".$this->db->connect_errno;
			$msg .= "<br>".$this->db->connect_error;
			$obj = new Error($msg);
			$obj = $obj->show_error();
			Users::load_view(array("login", "error"), $obj);
		endif;
	}

	public function insert_data() {}

	public function delete_data() {}

	public function update_data() {}

	public function result($tipo, $cant) {
		if($this->result->num_rows > 0) :
			switch($tipo) :
				case 'assoc' :
					$res = array();
					while($lin = $this->result->fetch_assoc()) :
						$res[] = $lin;
					endwhile;
					break;
				case 'array' :
					$res = array();
					while($lin = $this->result->fetch_array(MYSQLI_NUM)) :
						$res[] = $lin;
					endwhile;
					break;
				case 'object'	 :
					$res = array();
					while($lin = $this->result->fetch_object()) :
						$res[] = $lin;
					endwhile;
					break;
				default		 :
					$res = $this->result->fetch_all(MYSQLI_ASSOC);
					break;
			endswitch;
			if($cant == 1) return $res[0];
			else return $res;
		else : return "";
		endif;
	}

	public function join($table, $condition, $type = NULL) {
		if(!is_null($type)) : $this->join[] = mb_strtoupper($type)." JOIN ".$table." ON ".$condition;
		else : $this->join[] = "INNER JOIN ".$table." ON ".$condition;
		endif;
	}

	function __destruct() {
		unset($this->bd);
	}
}