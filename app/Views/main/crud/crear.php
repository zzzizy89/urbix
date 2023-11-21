<?=$cabecera;?>


	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Enter data</h5>
			<p class="card-text">

				<form method="post" action="<?= site_url('/guardar') ?>" enctype="multipart/form-data">

					<!-- Campo de entrada para 'nombre' -->
					<div class="form-group">
						<label for="nombre">name:</label>
						<input id="nombre" value="<?= old('nombre') ?>" class="form-control" type="text" name="nombre">
					</div>

					<!-- Campo de entrada para 'precio' -->
					<div class="form-group">
						<label for="precio">price:</label>
						<input id="precio" value="<?= old('precio') ?>" class="form-control" type="text" name="precio">
					</div>

					<!-- Campo de entrada para 'descripción' -->
					<div class="form-group">
						<label for="descripcion_prod">description:</label>
						<input id="descripcion_prod" value="<?= old('descripcion_prod') ?>" class="form-control" type="text" name="descripcion_prod">
					</div>

					<!-- Campo de entrada para 'imagen' -->
					<div class="form-group">
						<label for="imagen">image:</label>
						<input id="imagen" class="form-control-file" type="file" name="imagen">
					</div>

					<!-- Menú desplegable para 'tipo' -->
					<div class="form-group">
						<label for="tipoprod">type:</label>
						<select id="tipoprod" class="form-control" name="tipoprod">
            <?php foreach ($tipos as $tipo): ?>
              <option value="<?= $tipo['id_tipoprod'] ?>"><?= $tipo['tipo'] ?></option>
            <?php endforeach; ?>
          </select>
					</div>

					<!-- Botón para 'guardar' -->
					<button class="btn btn-success" type="submit">save</button>

					<!-- Enlace para 'cancelar' -->
					<a href="<?= base_url('listar'); ?>" class="btn btn-info">cancel</a>

				</form>

			</p>
		</div>
	</div>


<?=$pie;?>