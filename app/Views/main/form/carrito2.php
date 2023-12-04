<?=$cabecera;?>
	<br>
	<br>
	<?php
$message = session()->getFlashdata('message');
if (!empty($message)) {
    echo '<div class="alert alert-warning">' . $message . '</div>';
}
?>
		<form action="<?= base_url('carrito2/actualizarcar');?>" method="post">
			<table class="table table-dark">
				<thead class="thead-light">
					<tr>
						<th>#</th>
						<th>image</th>
						<th>name</th>
						<th>amount</th>
						<th>description</th>
						<th>type</th>
						<th>price</th>
						<th>total</th>
						<th>actions</th>
					</tr>
				</thead>
				<tbody>
					<?php   $contador = 1;?>
					<?php foreach($carritos as $car): ?>
					<tr>
						<td>
							<?php echo $contador; ?>
						</td>
						<!-- Mostramos el contador en lugar de id_carrito -->

						<!--  <td> <?php  echo $car['id_carrito'];?></td> -->
						<td>
							<img class="img-thumbnail" width="100" src="<?= base_url('uploads/'.$car['producto_imagen']) ?>" alt="teclado">
						</td>
						<td>
							<?php echo $car['nombre'];?>
						</td>
						<td>
							<input type="number" name="cantidad[<?= $car['id_carrito'];?>]" value="<?= $car['cantidad'];?>" min="1">
						</td>

						<td>
							<?php echo $car['descripcion_prod'];?>
						</td>


						<td>
							<?php echo $car['tipo_producto'];?>
						</td>

						<td>
							$<?php echo number_format($car['precio'], 2); ?>
						</td>
						<td>
							$<?php echo number_format($car['precio'] * $car['cantidad'], 2); ?>
						</td>
						<td>
							<a href="<?= base_url('carrito2/eliminarcar/'.$car['id_carrito'])?>" class="btn btn-danger" type="button">Eliminar</a>
						</td>
					</tr>
					<?php  $contador++;?>
					<?php endforeach; ?>
				</tbody>
			</table>
			<a href="<?= base_url('comprar/')?>" class="btn btn-success" type="button">to purchase</a>


			<button type="submit" class="btn btn-primary">update cart</button>
		</form>

		<?=$pie;?>