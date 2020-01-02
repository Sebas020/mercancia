<?php
require_once 'models/producto.php';

class productoController{
	
	public function index(){
		$producto = new Producto();
		$productos = $producto->getRandom(6);
	
		// renderizar vista
		require_once 'views/producto/destacados.php';
	}
	
	public function ver(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
		
			$producto = new Producto();
			$producto->setId($id);
			
			$product = $producto->getOne();
			
		}
		require_once 'views/producto/ver.php';
	}
	
	public function gestion(){
		//Utils::isAdmin();
		
		$producto = new Producto();
		$productos = $producto->getAll();
		
		require_once 'views/producto/gestion.php';
	}
	
	public function crear(){
		//Utils::isAdmin();
		require_once 'views/producto/crear.php';
	}
	
	public function save(){
		Utils::isAdmin();
		if(isset($_POST)){
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
			$precio = isset($_POST['precio']) ? $_POST['precio'] : false;
			$stock = isset($_POST['stock']) ? $_POST['stock'] : false;
			$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
			$color = isset($_POST['color']) ? $_POST['color'] : false;
			$dimensiones = isset($_POST['dimensiones']) ? $_POST['dimensiones'] : false;
			$marca = isset($_POST['marca']) ? $_POST['marca'] : false;
			$talla = isset($_POST['talla']) ? $_POST['talla'] : false;
			$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
			$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
			//var_dump($descripcion);die();
			if($nombre && $precio){
				$producto = new Producto();
				$producto->setNombre($nombre);
				$producto->setEstado(1);
				$producto->setCategoria($categoria);
				$producto->setDescripcion($descripcion);
				$producto->setTalla($talla);
				$producto->setMarca($marca);
				$producto->setDimensiones($dimensiones);
				$producto->setColor($color);
				$producto->setPrecio($precio);
				$producto->setStock($stock);
				//Guardar producto
				if(isset($_GET['id'])){
					$id = $_GET['id'];
					$producto->setId($id);
					
					$save = $producto->edit();
				}else{
					
					$save = $producto->save();
				}

				//var_dump($descripcion, $talla);die();
				// Guardar la imagen
				foreach($_FILES['imagen']['tmp_name'] as $key => $tmp_name){
					if(isset($_FILES['imagen']['name'][$key])){
						$filename = 'uploads/images/'.$_FILES['imagen']['name'][$key];
						$source = $_FILES['imagen']['tmp_name'][$key];
						$mimetype =$_FILES['imagen']['type'][$key];

						if($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){

							if(!is_dir('uploads/images')){
								mkdir('uploads/images', 0777, true);
							}
							$producto->setImagen($filename);
							$save_image = $producto->saveImage();
							move_uploaded_file($source, $filename);
						}
					}
				}
				
				if($save){
					$_SESSION['producto'] = "complete";
				}else{
					$_SESSION['producto'] = "failed";
				}
		}else{
			$_SESSION['producto'] = "failed";
		}
		}else{
			$_SESSION['producto'] = "failed";
		}
		header('Location:'.base_url.'producto/gestion');
	}
	
	public function editar(){
		//Utils::isAdmin();
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$edit = true;
			
			$producto = new Producto();
			$producto->setId($id);
			
			$pro = $producto->getOne();
			
			require_once 'views/producto/crear.php';
			
		}else{
			header('Location:'.base_url.'producto/gestion');
		}
	}
	
	public function eliminar(){
		Utils::isAdmin();
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$producto = new Producto();
			$producto->setId($id);
			
			$delete = $producto->delete();
			if($delete){
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
		}else{
			$_SESSION['delete'] = 'failed';
		}
		
		header('Location:'.base_url.'producto/gestion');
	}
	
}