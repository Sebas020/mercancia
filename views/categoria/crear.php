<h1>Crear nueva categoria</h1>

<form class="form-group" action="<?=base_url?>categoria/save" method="POST">
	<label for="nombre">Nombre</label>
	<input type="text" name="nombre" class="form-control" required/>
	
	<input type="submit" class="btn btn-success mt-2" value="Guardar" />
</form>