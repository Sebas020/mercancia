<h1>Gestionar categorias</h1>

<a href="<?=base_url?>categoria/crear" class="btn btn-success btn-sm mb-2">
	Crear categoria
</a>

<table class="table table-hover">
	<tr>
		<th>ID</th>
		<th>NOMBRE</th>
		<th>Estado</th>
	</tr>
	<?php while($cat = $categorias->fetch_object()): ?>
		<tr>
			<td><?=$cat->id;?></td>
			<td><?=$cat->nombre;?></td>
			<td>Activo</td>
		</tr>
	<?php endwhile; ?>
</table>
