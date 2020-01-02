<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
	<?php $titulo = "<h1>Editar producto $pro->nombre</h1>"?>
	<?php $url_action = base_url."producto/save&id=".$pro->id; ?>
	
<?php else: ?>
	<?php $titulo = "<h1>Crear nuevo producto</h1>" ?>
	<?php $url_action = base_url."producto/save"; ?>
<?php endif; ?>
	
<div class="form_container">
	<div class="row mt-2">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header"><?=$titulo?></div>
				<div class="card-body">
				<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data" class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>" class="form-control" />

					<label for="precio">Precio</label>
					<input type="number" name="precio" value="<?=isset($pro) && is_object($pro) ? $pro->precio : ''; ?>" class="form-control" />

					<label for="stock">Stock</label>
					<input type="number" name="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock : ''; ?>" class="form-control" />

					<label for="categoria">Categoria</label>
					<?php $categorias = Utils::showCategorias(); ?>
					<select name="categoria" class="form-control">
							<option value="0">Seleccione...</option>
							<?php while ($cat = $categorias->fetch_object()): ?>
							<option value="<?= $cat->id ?>" <?=isset($pro) && is_object($pro) && $cat->id == $pro->categoria ? 'selected' : ''; ?>>
								<?= $cat->nombre ?>
							</option>
						<?php endwhile; ?>
					</select>
					<label for="color">Color Producto</label>
					<input type="text" name="color" value="<?=isset($pro) && is_object($pro) ? $pro->color : ''; ?>" class="form-control" />
					
					<label for="dimensiones">Dimensiones producto</label>
					<textarea name="dimensiones" class="form-control"><?=isset($pro) && is_object($pro) ? $pro->dimensiones : ''; ?></textarea>

					<label for="marca">Marca Producto</label>
					<input type="text" name="marca" value="<?=isset($pro) && is_object($pro) ? $pro->marca : ''; ?>" class="form-control" />

					<label for="talla">Talla Producto</label>
					<input type="text" name="talla" value="<?=isset($pro) && is_object($pro) ? $pro->talla : ''; ?>" class="form-control" />

					<label for="descripcion">Descripción Producto</label>
					<textarea name="descripcion" class="form-control"><?=isset($pro) && is_object($pro) ? $pro->descripcion : ''; ?></textarea>
					
					<label for="imagen">Imagen</label>
					<?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
						<img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" class="thumb"/> 
					<?php endif; ?>
					<input type="file" name="imagen[]" multiple="" class="form-control" />
					<p class="dropdown-divider"></p>
					<input type="submit" value="Guardar" class="btn btn-success" />
				</form>
				</div>
			</div>
		</div>
	</div>
</div>