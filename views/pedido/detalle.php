	<div class="row">
		<div class="col-sm-6">
			<h1>Detalle del pedido</h1>
			<?php if (isset($pedido)): ?>
			<?php if(isset($_SESSION['admin'])): ?>
				<h3>Cambiar estado del pedido</h3>
				<?php $est = Utils::showStatus(); ?>
				<form action="<?=base_url?>pedido/estado" method="POST" class="form-group">
					<input type="hidden" value="<?=$pedido->id?>" name="pedido_id"/>
					<select name="estado" class="form-control mt-3">
					<?php while($estado = $est->fetch_object()): ?>
						<option value="<?=$estado->id?>"<?=isset($pedido) && is_object($pedido) && $pedido->estado == $estado->id ? 'selected' : '' ?>><?=$estado->nombre?></option>
					<?php endwhile; ?>
					</select>
					<input type="submit" class="form-control btn btn-success btn-sm mt-3" value="Cambiar estado" />
				</form>
				<br/>
			<?php endif; ?>

			<h3>Dirección de envio</h3>
			Depatamento: <?= $pedido->departamento ?>   <br/>
			Cuidad: <?= $pedido->ciudad ?> <br/>
			Direccion: <?= $pedido->direccion ?>   <br/><br/>

			<h3>Datos del pedido:</h3>
			Estado: <?=$pedido->estado?> <br/>
			Número de pedido: <?= $pedido->id ?>   <br/>
			Total a pagar: <?= $pedido->total ?> $ <br/>
		</div>
		<div class="col-sm-6">
			Productos:

			<table class="table table-hover">
				<tr>
					<th>Imagen</th>
					<th>Descripción</th>
					<th>Precio</th>
					<th>Unidades</th>
				</tr>
				<?php while ($producto = $pedidos->fetch_object()): ?>
					<tr>
						<td>
							<?php if ($producto->imagen != null): ?>
								<img src="<?= base_url . $producto->imagen ?>" width="100" height="80" />
							<?php else: ?>
								<img src="<?= base_url ?>assets/img/default.png" width="100" height="80" />
							<?php endif; ?>
						</td>
						<td>
							<a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>"><?= $producto->descripcion ?></a>
						</td>
						<td>
							<?= $producto->valor ?>
						</td>
						<td>
							<?= $producto->cantidad ?>
						</td>
					</tr>
				<?php endwhile; ?>
			</table>
		<?php endif; ?>
	</div>
	</div>