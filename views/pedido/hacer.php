	<div class="row">
		<div class="col-sm-12">
			<div class="card mt-3">
				<?php if (isset($_SESSION['identity'])): ?>
				<div class="card-header"><h1>Confirmar datos de envio para el pedido</h1></div>
				<div class="card-body">
					<p>
						<a class="btn btn-primary" href="<?= base_url ?>carrito/index">Ver los productos y el precio del pedido</a>
					</p>
					<?php if($details): ?>
					<h3>Dirección para el envio:</h3>
					<h2>Departamento: <?=$details->departamento?></h2>
					<h2>Ciudad: <?=$details->ciudad?></h2>
					<h2>Dirección: <?=$details->direccion?></h2>
					<h2 class="mt-5">Nota:</h2>
					<p>Si los datos de envio no coincide por favor actualícelos</p>
					<a class="btn btn-success" href="<?= base_url ?>venta/add">Hacer el pedido</a>
					<?php endif; ?>
				<?php else: ?>
					<h1>Necesitas estar identificado</h1>
					<p>Necesitas estar logueado en la web para poder realizar tu pedido.</p>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div>