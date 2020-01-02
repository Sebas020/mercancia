<?php if (isset($gestion)): ?>
	<h1>Gestionar pedidos</h1>
<?php else: ?>
	<h1>Mis pedidos</h1>
<?php endif; ?>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-hover">
			<tr>
				<th>Nº Pedido</th>
				<th>Coste</th>
				<th>Fecha</th>
				<th>Estado</th>
			</tr>
			<?php
			while (@$ped = @$pedidos->fetch_object()):
				?>

				<tr>
					<td>
						<a href="<?= base_url ?>venta/detalle&id=<?= $ped->id ?>"><?= $ped->id ?></a>
					</td>
					<td>
						<?= @$ped->total ?> $
					</td>
					<td>
						<?= @$ped->fecha ?>
					</td>
					<td>
						<?=$ped->estado?>
					</td>
				</tr>

			<?php endwhile; ?>
	</table>
	</div>
</div>