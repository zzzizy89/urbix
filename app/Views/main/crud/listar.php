<?=$cabecera;?>

	<!-- Enlace para 'crear' -->
	<a class="btn btn-success" href="<?= base_url('crear') ?>">create</a>

	<br>
	<br>

	<!-- Tabla de productos -->
	<table class="table table-dark">
		<thead class="thead-light">
			<tr>
				<th>#</th>
				<th>image</th>
				<th>name</th>
				<th>price</th>
				<th>description</th>
				<th>type</th>
				<th>actions</th>
			</tr>
		</thead>
		<tbody>

			<?php foreach ($productos as $producto): ?>
			<tr>
				<td>
					<?php echo $producto['id_producto']; ?>
				</td>
				<td>
					<img class="img-thumbnail" width="100" src="<?= base_url('uploads/' . $producto['imagen']) ?>" alt="teclado">
				</td>
				<td>
					<?php echo $producto['nombre']; ?>
				</td>
				<td>
					<?php echo number_format($producto['precio'], 2, ',', '.'); ?>
				</td>
				<td>
					<?php echo $producto['descripcion_prod']; ?>
				</td>
				<td>
					<?php echo $producto['tipo']; ?>
				</td>
				<td>
					<!-- Enlace para 'editar' -->
					<a href="<?= base_url('editar/' . $producto['id_producto']) ?>" class="btn btn-info" type="button">edit</a>
					<!-- Enlace para 'eliminar' -->
					<a href="<?= base_url('eliminar/' . $producto['id_producto']) ?>" class="btn btn-danger" type="button">delete</a>
				</td>
			</tr>
			<?php endforeach; ?>

		</tbody>
	</table>

<?=$pie;?>