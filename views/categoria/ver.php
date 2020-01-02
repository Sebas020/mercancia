<?php if (isset($categoria)): ?>
	<h1><?= $categoria->nombre ?></h1>
	<?php if ($productos->num_rows == 0): ?>
		<p>No hay productos para mostrar</p>
	<?php else: ?>
		<div class="row mt-3">
		<?php while ($product = $productos->fetch_object()): ?>
			<div class="col-sm-4 container-img">
				<a href="<?= base_url ?>producto/ver&id=<?= $product->id ?>">
					<?php if ($product->imagen != null): ?>
						<img src="<?= base_url.$product->imagen ?>" width="50" height="50" class="img-fluid"/>
					<?php else: ?>
						<img src="<?= base_url ?>assets/img/default.png" width="50" height="50" class="img-fluid"/>
					<?php endif; ?>
					<h2><?= $product->nombre ?></h2>
				</a>
				<p><?= $product->precio ?></p>
				<a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="btn btn-success">Comprar</a>
			</div>
		<?php endwhile; ?>
		</div>
	<?php endif; ?>
<?php else: ?>
	<h1>La categoría no existe</h1>
<?php endif; ?>
