<?php

class Producto{
	private $id;
	private $nombre;
	private $estado;
	private $categoria;
	private $descripcion;
	private $talla;
	private $marca;
	private $dimensiones;
	private $color;
	private $precio;
	private $stock;
	private $imagen;

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

	function getEstado() {
		return $this->estado;
	}

	function getCategoria() {
		return $this->categoria;
	}

	function getDescripcion() {
		return $this->descripcion;
	}

	function getTalla() {
		return $this->talla;
	}

	function getMarca() {
		return $this->marca;
	}

	function getDimensiones() {
		return $this->dimensiones;
	}

	function getColor() {
		return $this->color;
	}

	function getPrecio() {
		return $this->precio;
	}

	function getStock() {
		return $this->stock;
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

	function setEstado($estado) {
		$this->estado = $estado;
	}

	function setCategoria($categoria) {
		$this->categoria = $this->db->real_escape_string($categoria);
	}

	function setDescripcion($descripcion) {
		$this->descripcion = $this->db->real_escape_string($descripcion);
	}

	function setTalla($talla) {
		$this->talla = $this->db->real_escape_string($talla);
	}

	function setMarca($marca) {
		$this->marca = $this->db->real_escape_string($marca);
	}

	function setDimensiones($dimensiones) {
		$this->dimensiones = $this->db->real_escape_string($dimensiones);
	}

	function setColor($color) {
		$this->color = $this->db->real_escape_string($color);
	}

	function setPrecio($precio) {
		$this->precio = $this->db->real_escape_string($precio);
	}

	function setStock($stock) {
		$this->stock = $this->db->real_escape_string($stock);
	}

	function setImagen($imagen) {
		$this->imagen = $imagen;
	}

	public function getAll(){
		$productos = $this->db->query("SELECT * FROM tbl_productos ORDER BY id DESC");
		return $productos;
	}
	
	public function getAllCategory(){
		$sql = "SELECT p.id, p.nombre, p.estado, p.categoria, p.descripcion, p.talla, p.marca, p.dimensiones, p.color, i.nombre as 'imagen', p.precio, p.stock , c.nombre AS 'catnombre' FROM tbl_productos p "
				. "LEFT JOIN tbl_imagenes i ON i.id_producto = p.id "
				. "INNER JOIN tbl_categorias c ON c.id = p.categoria "
				. "WHERE p.categoria = {$this->getCategoria()} "
				. "ORDER BY id DESC";
		$productos = $this->db->query($sql);
		return $productos;
	}
	
	public function getRandom($limit){
		$productos = $this->db->query("SELECT p.id, p.nombre, p.estado, p.categoria, p.descripcion, p.talla, p.marca, p.dimensiones, p.color, i.nombre as 'imagen', p.precio, p.stock FROM tbl_productos as p LEFT JOIN tbl_imagenes as i
			ON i.id_producto = p.id 
			ORDER BY RAND() LIMIT $limit;"
		);
		return $productos;
	}
	
	public function getOne(){
		$producto = $this->db->query("SELECT p.id, p.nombre, p.estado, p.categoria, p.descripcion, p.talla, p.marca, p.dimensiones, p.color, i.nombre as 'imagen', p.precio, p.stock FROM tbl_productos as p LEFT JOIN tbl_imagenes as i
			ON i.id_producto = p.id 
			WHERE p.id = {$this->getId()}");
		return $producto->fetch_object();
	}
	
	public function save(){
		$sql = "INSERT INTO tbl_productos VALUES(NULL, '{$this->getNombre()}', {$this->getEstado()}, {$this->getCategoria()}, '{$this->getDescripcion()}', '{$this->getTalla()}', '{$this->getMarca()}', '{$this->getDimensiones()}', '{$this->getColor()}',  {$this->getPrecio()}, {$this->getStock()});";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	public function edit(){
		$sql = "UPDATE tbl_productos SET nombre='{$this->getNombre()}', estado={$this->getEstado()}, categoria={$this->getCategoria()}, descripcion='{$this->getDescripcion()}', talla='{$this->getTalla()}', marca='{$this->getMarca()}', dimensiones='{$this->getDimensiones()}', color='{$this->getColor()}', precio={$this->getPrecio()}, stock={$this->getStock()}";
		
		if($this->getImagen() != null){
			$sql .= ", imagen='{$this->getImagen()}'";
		}
		
		$sql .= " WHERE id={$this->id};";
		
		//var_dump($this->getDescripcion(), $this->getMarca());die();
		$save = $this->db->query($sql);
	
		$result = false;
		if($save){
			$result = true;
		}
		
		return $result;
	}
	
	public function delete(){
		$sql = "DELETE FROM tbl_productos WHERE id={$this->id}";
		$delete = $this->db->query($sql);
		
		$result = false;
		if($delete){
			$result = true;
		}
		return $result;
	}

	public function saveImage(){
		$producto_id = self::getLastIdProducto();
		$sql = "INSERT INTO tbl_imagenes VALUES(NULL, '{$this->getImagen()}', $producto_id);";
		$save = $this->db->query($sql);		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function getLastIdProducto(){
		$sql = "SELECT id as 'producto' FROM tbl_productos ORDER BY id DESC LIMIT 1;";
		$query = $this->db->query($sql);
		$producto_id = $query->fetch_object()->producto;
		return $producto_id;
	}
	
}