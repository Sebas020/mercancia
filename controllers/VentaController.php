<?php
require_once 'models/venta.php';

class ventaController{
	
	public function hacer(){
		
		$venta = new Venta();
		$usuario_id = $_SESSION['identity']->id;
		$venta->setCliente($usuario_id);
		$details = $venta->showClient();
		require_once 'views/pedido/hacer.php';
	}
	
	public function add(){
		if(isset($_SESSION['identity'])){
			$usuario_id = $_SESSION['identity']->id;
			
			$stats = Utils::statsCarrito();
			$coste = $stats['total'];
				
			// Guardar datos en bd
			$pedido = new Venta();
			$pedido->setCliente($usuario_id);
			$pedido->setEstado(1);
			$pedido->setTotal($coste);
				
			$save = $pedido->save();
			
			// Guardar linea pedido
			$save_linea = $pedido->save_linea();
			if($save && $save_linea){
				$_SESSION['pedido'] = "complete";
			}else{
				$_SESSION['pedido'] = "failed";
			}
			
			header("Location:".base_url.'venta/confirmado');			
		}else{
			// Redigir al index
			header("Location:".base_url);
		}
	}
	
	public function confirmado(){
		if(isset($_SESSION['identity'])){
			$identity = $_SESSION['identity'];
			$pedido = new Venta();
			$pedido->setCliente($identity->id);
			
			$pedido = $pedido->getOneByUser();
			
			$pedido_productos = new Venta();
			$productos = $pedido_productos->getProductosByPedido($pedido->id);
		}
		require_once 'views/pedido/confirmado.php';
	}
	
	public function mis_pedidos(){
		Utils::isIdentity();
		$usuario_id = $_SESSION['identity']->id;
		$pedido = new Venta();
		
		// Sacar los pedidos del usuario
		$pedido->setCliente($usuario_id);
		$pedidos = $pedido->getAllByUser();
		
		require_once 'views/pedido/mis_pedidos.php';
	}
	
	public function detalle(){
		Utils::isIdentity();
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			
			// Sacar el pedido
			$pedido = new Venta();
			$pedido->setId($id);
			$pedido = $pedido->getOne();
			
			// Sacar los poductos
			$pedido_productos = new Venta();
			$pedidos = $pedido_productos->getProductosByPedido($id);
			require_once 'views/pedido/detalle.php';
		}else{
			header('Location:'.base_url.'venta/mis_pedidos');
		}
	}
	
	public function gestion(){
		Utils::isAdmin();
		$gestion = true;
		
		$pedido = new Venta();
		$pedidos = $pedido->getAll();
		require_once 'views/pedido/mis_pedidos.php';
	}
	
	public function estado(){
		Utils::isAdmin();
		if(isset($_POST['pedido_id']) && isset($_POST['estado'])){
			// Recoger datos form
			$id = $_POST['pedido_id'];
			$estado = $_POST['estado'];
			
			// Upadate del pedido
			$pedido = new Venta();
			$pedido->setId($id);
			$pedido->setEstado($estado);
			$pedido->edit();
			
			header("Location:".base_url.'venta/detalle&id='.$id);
		}else{
			header("Location:".base_url);
		}
	}
	
	
}