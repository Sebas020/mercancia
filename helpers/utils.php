<?php

class Utils{
	
	public static function deleteSession($name){
		if(isset($_SESSION[$name])){
			$_SESSION[$name] = null;
			unset($_SESSION[$name]);
		}
		
		return $name;
	}
	
	public static function isAdmin(){
		if(!isset($_SESSION['admin'])){
			header("Location:".base_url);
		}else{
			return true;
		}
	}
	
	public static function isIdentity(){
		if(!isset($_SESSION['identity'])){
			header("Location:".base_url);
		}else{
			return true;
		}
	}
	
	public static function showCategorias(){
		require_once 'models/categoria.php';
		$categoria = new Categoria();
		$categorias = $categoria->getAll();
		return $categorias;
	}

	public static function showTipoP(){
		require_once 'models/producto.php';
		$tipoP = new Producto();
		$tipoProducto = $tipoP->getTipoP();
		return $tipoProducto;
	}
	
	public static function statsCarrito(){
		$stats = array(
			'count' => 0,
			'total' => 0
		);
		
		if(isset($_SESSION['carrito'])){
			$stats['count'] = count($_SESSION['carrito']);
			
			foreach($_SESSION['carrito'] as $producto){
				$stats['total'] += $producto['precio']*$producto['unidades'];
			}
		}
		
		return $stats;
	}
	
	public static function showStatus(){
		require_once 'models/venta.php';
		
		$status = new Venta();
		$estado = $status->showStatus();
		if($estado){
			return $estado;
		}else{
			return false;
		}
	}

	public static function showCiudades(){
		require_once 'models/ciudad.php';
		$ciudad = new Ciudad();
		$ciudades = $ciudad->getAll();
		return $ciudades;
	}

	public static function showPedido(){
		require_once 'models/Venta.php';
		$producto = new Venta();
		$productos = $producto->getAll();
		return $ciudades;
	}

	public static function delete_all(){
		unset($_SESSION['carrito']);
	}
	
}
