<?=$cabecera;?>

	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Enter data</h5>
			<p class="card-text">

				<form method="post" action="<?= site_url('/actualizar') ?>" enctype="multipart/form-data">

					<!-- Campo oculto para 'id_producto' -->
					<input type="hidden" name="id_producto" value="<?= $producto['id_producto'] ?>">

					<!-- Campo de entrada para 'nombre' -->
					<div class="form-group">
						<label for="nombre">name:</label>
						<input id="nombre" value="<?= $producto['nombre'] ?>" class="form-control" type="text" name="nombre">
					</div>

					<!-- Campo de entrada para 'precio' -->
					<div class="form-group">
						<label for="precio">price:</label>
						<input id="precio" value="<?= $producto['precio'] ?>" class="form-control" type="text" name="precio">
					</div>

					<!-- Campo de entrada para 'descripción' -->
					<div class="form-group">
						<label for="descripcion_prod">description:</label>
						<input id="descripcion_prod" value="<?= $producto['descripcion_prod'] ?>" class="form-control" type="text" name="descripcion_prod">
					</div>

					<!-- Campo de entrada para 'imagen' -->
					<div class="form-group">
						<label for="imagen">image:</label>
						<br>
						<img class="img-thumbnail" width="100" src="<?= base_url('uploads/' . $producto['imagen']) ?>" alt="teclado">
						<input id="imagen" class="form-control-file" type="file" name="imagen">
					</div>

					<!-- Menú desplegable para 'tipo' -->
					<div class="form-group">
						<label for="tipoprod">type:</label>
						<select id="tipoprod" class="form-control" name="tipoprod">
                        <?php foreach ($tipos as $tipo): ?>
                            <option value="<?= $tipo['id_tipoprod'] ?>" <?= ($tipo['id_tipoprod'] == $producto['id_tipoprod']) ? 'selected' : '' ?>><?= $tipo['tipo'] ?></option>
                        <?php endforeach; ?>
                    </select>
					</div>

					<!-- Botón para 'actualizar' -->
					<button class="btn btn-success" type="submit">update</button>

					<!-- Enlace para 'cancelar' -->
					<a href="<?= base_url('listar'); ?>" class="btn btn-info">cancel</a>

				</form>

			</p>
		</div>
	</div>


<?=$pie;?>