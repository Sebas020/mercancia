<?php

class Usuario{
	private $id;
	private $nombre;
	private $apellidos;
	private $email;
	private $ciudad;
	private $telefono;
	private $celular;
	private $direccion;
	private $tipo_usuario;
	private $clave;
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

	function getApellidos() {
		return $this->apellidos;
	}

	function getEmail() {
		return $this->email;
	}

	function getCiudad() {
		return $this->ciudad;
	}

	function getTelefono() {
		return $this->telefono;
	}

	function getCelular() {
		return $this->celular;
	}

	function getDireccion() {
		return $this->direccion;
	}

	function getClave() {
		return password_hash($this->db->real_escape_string($this->clave), PASSWORD_BCRYPT);
	}

	function getRol() {
		return $this->tipo_usuario;
	}

	function getImagen() {
		return $this->imagen;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	function setApellidos($apellidos) {
		$this->apellidos = $this->db->real_escape_string($apellidos);
	}

	function setEmail($email) {
		$this->email = $this->db->real_escape_string($email);
	}

	function setCiudad($ciudad) {
		$this->ciudad = $this->db->real_escape_string($ciudad);
	}

	function setTelefono($telefono) {
		$this->telefono = $this->db->real_escape_string($telefono);
	}

	function setCelular($celular) {
		$this->celular = $this->db->real_escape_string($celular);
	}

	function setDireccion($direccion) {
		$this->direccion = $this->db->real_escape_string($direccion);
	}

	function setClave($clave) {
		$this->clave = $clave;
	}

	function setRol($rol) {
		$this->tipo_usuario = $rol;
	}

	function setImagen($imagen) {
		$this->imagen = $imagen;
	}

	public function save(){
		$id = self::getIdU();
		$sql = "INSERT INTO tbl_usuarios VALUES($id, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getCiudad()}', '{$this->getTelefono()}', '{$this->getCelular()}', '{$this->getDireccion()}', 2 , '{$this->getClave()}');";
		$save = $this->db->query($sql);
		$result = false;
		if($save){
			$result = true;
		}
		//var_dump($this->getClave());die();
		return $result;
	}
	
	public function login(){
		$result = false;
		$email = $this->email;
		$password = $this->clave;
		
		// Comprobar si existe el usuario
		$sql = "SELECT * FROM tbl_usuarios WHERE correo = '$email'";
		$login = $this->db->query($sql);

		if($login && $login->num_rows == 1){
			$usuario = $login->fetch_object();
			// Verificar la contraseña
			$verify = password_verify($password, $usuario->clave);
			
			if($verify){
				$result = $usuario;
			}
		}
		return $result;
	}
	
	public function getIdU(){
		$sql = "SELECT id FROM tbl_usuarios ORDER BY id DESC LIMIT 1";
		$id_u = $this->db->query($sql);
		$id_u = $id_u->fetch_object();
		$id = (int)$id_u->id +1;
		return $id;
	}
	
}