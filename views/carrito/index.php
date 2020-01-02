<h1>Carrito de la compra</h1>

<?php if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1): ?>
<table class="table table-hover">
	<tr>
		<th>Imagen</th>
		<th>Nombre</th>
		<th>Precio</th>
		<th>Unidades</th>
		<th>Eliminar</th>
	</tr>
	<?php 
		foreach($carrito as $indice => $elemento): 
		$producto = $elemento['producto'];
	?>
	
	<tr>
		<td>
			<?php if ($producto->imagen != null): ?>
				<img src="<?= base_url ?><?= $producto->imagen ?>" width="100" height="80"/>
			<?php else: ?>
				<img src="<?= base_url ?>assets/img/default.png" width="100" height="80" />
			<?php endif; ?>
		</td>
		<td>
			<a href="<?= base_url ?>producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a>
		</td>
		<td>
			<?=$producto->precio?>
		</td>
		<td>
			<?=$elemento['unidades']?>
			<div class="updown-unidades">
				<a href="<?=base_url?>carrito/up&index=<?=$indice?>" class="btn">+</a>
				<a href="<?=base_url?>carrito/down&index=<?=$indice?>" class="btn">-</a>
			</div>
		</td>
		<td>
			<a href="<?=base_url?>carrito/delete&index=<?=$indice?>" class="btn btn-danger">Quitar producto</a>
		</td>
	</tr>
	
	<?php endforeach; ?>
</table>
<br/>
<div class="delete-carrito">
	<a href="<?=base_url?>carrito/delete_all" class="btn btn-danger mb-3">Vaciar carrito</a>
</div>
<div class="total-carrito">
	<?php $stats = Utils::statsCarrito(); ?>
	<h3>Precio total: <?=$stats['total']?> $</h3>
	<a href="<?=base_url?>venta/hacer" class="btn btn-success mt-3">Hacer pedido</a>
</div>

<?php else: ?>
	<p>El carrito está vacio, añade algun producto</p>
<?php endif; ?>