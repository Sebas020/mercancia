<?php

class Ciudad{
	private $id;
	private $nombre;
	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}

	function getNombre() {
		return $this->nombre;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	public function getAll(){
		$categorias = $this->db->query("SELECT * FROM tbl_ciudades ORDER BY id DESC;");
		return $categorias;
	}
	
	public function getOne(){
		$categoria = $this->db->query("SELECT * FROM tbl_ciudades WHERE id={$this->getId()}");
		return $categoria->fetch_object();
	}
	
	public function save(){
		$sql = "INSERT INTO tbl_ciudades VALUES(NULL, '{$this->getNombre()}');";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	
}