<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
	<strong class="alert_green">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
	<strong class="alert_red">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>
<?php Utils::deleteSession('register'); ?>

<div class="row mt-3">
	<?php if(!isset($_SESSION['identity'])): ?>
	<div class="col-sm-6">
		<div class="card bg-light">
		<div class="card-header"><h3>Entrar a la web</h3></div>
		<div class="card-body">
			<form action="<?=base_url?>usuario/login" method="post" class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" class="form-control input-sm" />
				<label for="password">Contraseña</label>
				<input type="password" name="password" class="form-control input-sm" />
				<p></p>
				<input type="submit" value="Enviar" class="btn btn-success input-sm" />
			</form>
		</div>
		<!--<a class="btn btn-primary mb-2 btn-sm" href="<?=base_url?>usuario/registro">Registrate aqui</a>-->
		</div>
	</div>
	<?php endif; ?>
	<div class="col-sm-6">
	<div class="card align-center">
		<div class="card-header"><h1>Registrarse</h1></div>
		<div class="card-body">
		<form action="<?=base_url?>usuario/save" method="POST" class="form-group ml-auto">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" class="form-control" required/>
			
			<label for="apellidos">Apellidos</label>
			<input type="text" name="apellidos" class="form-control" required/>
			
			<label for="email">Email</label>
			<input type="email" name="email" class="form-control" required/>

			<?php $ciudades = Utils::showCiudades(); ?>

			<label for="ciudad">Ciudad</label>
			<select class="form-control" name="ciudad">
				<option value="0">Seleccione...</option>
			<?php while($c = $ciudades->fetch_object()): ?>
				<option value="<?=$c->id?>"><?=$c->nombre?></option>
			<?php endwhile; ?>
			</select>

			<label for="telefono">Teléfono</label>
			<input type="number" name="telefono" class="form-control" required/>

			<label for="celular">celular</label>
			<input type="number" name="celular" class="form-control" required/>

			<label for="direccion">dirección</label>
			<input type="text" name="direccion" class="form-control" required/>

			<label for="password">Contraseña</label>
			<input type="password" name="password" class="form-control" required/>

			<p></p>
			<input type="submit" value="Registrarse" class="btn btn-success" />
		</form>
		</div>
	</div>
	</div>
</div>