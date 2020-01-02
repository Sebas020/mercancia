<?php

class Venta{
	private $id;
	private $cliente;
	private $estado;
	private $descripcion;
	private $fecha;
	private $hora;
	private $total;

	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}

	function getCliente() {
		return $this->cliente;
	}

	function getEstado() {
		return $this->estado;
	}

	function getDescripcion() {
		return $this->descripcion;
	}

	function getFecha() {
		return $this->fecha;
	}

	function getHora() {
		return $this->hora;
	}

	function getTotal() {
		return $this->total;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setCliente($cliente) {
		$this->cliente = $cliente;
	}

	function setEstado($estado) {
		$this->estado = $this->db->real_escape_string($estado);
	}

	function setDescripcion($descripcion) {
		$this->descripcion = $this->db->real_escape_string($descripcion);
	}

	function setTotal($total) {
		$this->total = $total;
	}

	function setFecha($fecha) {
		$this->fecha = $fecha;
	}

	function setHora($hora) {
		$this->hora = $hora;
	}

	public function getAll(){
		$productos = $this->db->query("SELECT v.id, CONCAT(c.nombre, ' ', c.apellido) as cliente, e.nombre as estado, v.descripcion, v.fecha, v.hora, v.total  FROM tbl_ventas as v INNER JOIN tbl_usuarios as c
		ON c.id = v.cliente
		INNER JOIN tbl_estados as e ON e.id = v.estado
		ORDER BY v.id DESC");
		return $productos;
	}
	
	public function getOne(){
		$producto = $this->db->query("SELECT v.id, v.descripcion, v.fecha, v.hora, v.total, vp.cantidad, vp.valor, e.nombre estado, ci.nombre ciudad, u.telefono, u.celular, u.direccion, dp.nombre departamento, i.nombre imagen FROM tbl_ventas v "
				. "INNER JOIN tbl_usuarios u ON v.cliente = u.id "
				. "INNER JOIN tbl_ciudades ci ON u.ciudad = ci.id "
				. "INNER JOIN tbl_departamentos dp ON ci.departamento = dp.id "
				. "INNER JOIN tbl_venta_productos vp ON vp.id_venta = v.id "
				. "INNER JOIN tbl_estados e ON v.estado = e.id "
				. "INNER JOIN tbl_productos p ON vp.id_producto = p.id "
				. "LEFT JOIN tbl_imagenes i ON p.imagen = i.id "
				. "WHERE v.id = {$this->getId()}");
		return $producto->fetch_object();
	}
	
	public function getOneByUser(){
		$sql = "SELECT v.id, CONCAT(c.nombre, ' ', c.apellido) as cliente, ci.nombre ciudad, dp.nombre departamento, e.nombre, v.descripcion, v.fecha, v.hora, v.total  FROM tbl_ventas as v INNER JOIN tbl_usuarios as c
		ON c.id = v.cliente
		INNER JOIN tbl_estados as e ON e.id = v.estado
		INNER JOIN tbl_ciudades as ci ON c.ciudad = ci.id
		INNER JOIN tbl_departamentos as dp ON ci.departamento = dp.id
		WHERE v.cliente = {$this->getCliente()} ORDER BY v.id DESC LIMIT 1";
			
		$pedido = $this->db->query($sql);
			
		return $pedido->fetch_object();
	}
	
	public function getAllByUser(){
		$sql = "SELECT v.id, CONCAT(c.nombre, ' ', c.apellido) as cliente, e.nombre estado, v.descripcion, v.fecha, v.hora, v.total  FROM tbl_ventas as v INNER JOIN tbl_usuarios as c
		ON c.id = v.cliente
		INNER JOIN tbl_estados as e ON e.id = v.estado
		WHERE v.cliente = {$this->getCliente()} ORDER BY v.id DESC";
			
		$pedido = $this->db->query($sql);
			
		return $pedido;
	}
	
	
	public function getProductosByPedido($id){
//		$sql = "SELECT * FROM productos WHERE id IN "
//				. "(SELECT producto_id FROM lineas_pedidos WHERE pedido_id={$id})";
	
		$sql = "SELECT v.id, p.descripcion, v.fecha, v.hora, v.total, vp.cantidad, vp.valor, e.nombre estado, ci.nombre ciudad, u.telefono, u.celular, u.direccion, dp.nombre departamento, i.nombre imagen FROM tbl_ventas v "
				. "INNER JOIN tbl_usuarios u ON v.cliente = u.id "
				. "INNER JOIN tbl_ciudades ci ON u.ciudad = ci.id "
				. "INNER JOIN tbl_departamentos dp ON ci.departamento = dp.id "
				. "INNER JOIN tbl_venta_productos vp ON vp.id_venta = v.id "
				. "INNER JOIN tbl_estados e ON v.estado = e.id "
				. "INNER JOIN tbl_productos p ON vp.id_producto = p.id "
				. "LEFT JOIN tbl_imagenes i ON p.imagen = i.id "
				. "WHERE vp.id_venta={$id}";
				
		$productos = $this->db->query($sql);
			
		return $productos;
	}
	
	public function save(){
		$sql = "INSERT INTO tbl_ventas VALUES(NULL, {$this->getCliente()}, {$this->getEstado()}, '{$this->getDescripcion()}', CURDATE(), CURTIME(), {$this->getTotal()});";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	public function save_linea(){
		$sql = "SELECT LAST_INSERT_ID() as 'pedido';";
		$query = $this->db->query($sql);
		$pedido_id = $query->fetch_object()->pedido;
		
		foreach($_SESSION['carrito'] as $elemento){
			$producto = $elemento['producto'];
			
			$insert = "INSERT INTO tbl_venta_productos VALUES({$producto->id}, {$pedido_id}, {$elemento['unidades']}, {$elemento['precio']})";
			$save = $this->db->query($insert);
			
//			var_dump($producto);
//			var_dump($insert);
//			echo $this->db->error;
//			die();
		}
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	public function edit(){
		$sql = "UPDATE pedidos SET estado='{$this->getEstado()}' ";
		$sql .= " WHERE id={$this->getId()};";
		
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function showStatus(){
		$status = $this->db->query("SELECT * FROM tbl_estados ORDER BY nombre");
		if($status){
			return $status;
		}else{
			return false;
		}
	}

	public function showClient(){
		$client = $this->db->query("SELECT ci.nombre ciudad, dp.nombre departamento, u.direccion FROM tbl_usuarios u
					INNER JOIN tbl_ciudades ci ON u.ciudad = ci.id
					INNER JOIN tbl_departamentos dp ON ci.departamento = dp.id
					WHERE u.id = {$this->getCliente()}"
				);
		if($client){
			return $client->fetch_object();
		}else{
			false;
		}
	}
}