<h1 style="text-align: center;">Super ofertas</h1>
		<hr class="mb-5">
		<div class="row">
			<?php while($product = $productos->fetch_object()): ?>
					<figure class="col-md-4 container-img">
					<a class="black-text" href="<?=base_url?>producto/ver&id=<?=$product->id?>">
						<?php if($product->imagen != null): ?>
							<img alt="picture" src="<?=base_url?><?=$product->imagen?>" width="50" height="50" class="img-fluid"/>
						<?php else: ?>
							<img alt="picture" src="<?=base_url?>assets/img/default.png" width="100" height="100" class="img-fluid"/>
						<?php endif; ?>
						<h2><?=$product->nombre?></h2>
					</a>
					<a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="btn btn-success mb-3">Comprar</a>
					</figure>
				<!--<p><?=$product->precio?></p>-->
			<?php endwhile; ?>
		</div>
