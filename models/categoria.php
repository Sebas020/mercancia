<?php

class Categoria{
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
		$categorias = $this->db->query("SELECT * FROM tbl_categorias ORDER BY id DESC;");
		return $categorias;
	}
	
	public function getOne(){
		$categoria = $this->db->query("SELECT * FROM tbl_categorias WHERE id={$this->getId()}");
		return $categoria->fetch_object();
	}
	
	public function save(){
		$id = self::getLastCode()->id;
		$id = (int) $id + 1;
		$sql = "INSERT INTO tbl_categorias VALUES($id, '{$this->getNombre()}');";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function getLastCode(){
		$sql = "SELECT id FROM tbl_categorias ORDER BY id DESC;";
		$id = $this->db->query($sql);

		return $id->fetch_object();	
	}

	public function delete(){
		$sql = "DELETE FROM tbl_categorias WHERE id={$this->id}";
		$delete = $this->db->query($sql);
		
		$result = false;
		if($delete){
			$result = true;
		}
		return $result;
	}
	
	
}