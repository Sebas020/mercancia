<?php if (isset($product)): ?>
	<h1><?= $product->nombre ?></h1>
	<div class="row">
		<div class="col-sm-4 container-img">
			<?php if ($product->imagen != null): ?>
				<img class="img-fluid detalle" src="<?= base_url ?><?= $product->imagen ?>"/>
				<?php else: ?>
					<img class="img-fluid detalle" src="<?= base_url ?>assets/img/default.png"/>
				<?php endif; ?>
				<a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="btn btn-success mt-3 mb-3">Comprar</a>
				
			</div>
			<div class="col-sm-8">
				<strong><p>Precio: <?= $product->precio ?>$</p></strong>
				<strong><p>Talla: <?= $product->talla ?></p></strong>
				<strong><p>Marca: <?= $product->marca ?></p></strong>
				<strong><p>Dimensiones: <?= $product->dimensiones ?></p></strong>
				<strong><p>Color: <?= $product->color ?></p></strong>
				<h3>Descripción: </h3>
				<p><?= $product->descripcion ?></p>
			</div>
		</div>
		<?php else: ?>
			<h1>El producto no existe</h1>
		<?php endif; ?>
