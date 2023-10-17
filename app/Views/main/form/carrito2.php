<?=$cabecera;?>
<br>
<br>

<form action="<?= base_url('carrito2/actualizarcar');?>" method="post">
    <table class="table table-dark">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>imagen</th>
                <th>nombre</th>
                <th>cantidad</th>
                <th>precio</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($carritos as $car): ?>
                <tr>
                    <td><?php echo $car['id_carrito'];?></td>
                    <td>
                        <img class="img-thumbnail" width="100" src="<?= base_url('uploads/'.$car['teclado_imagen']) ?>" alt="teclado">
                    </td>
                    <td><?php echo $car['nombre'];?></td>
                    <td>
                        <input type="number" name="cantidad[<?= $car['id_carrito'];?>]" value="<?= $car['cantidad'];?>" min="1">
                    </td>
                    <td><?php echo number_format($car['precio'], 2, ',', '.'); ?></td>
                    <td><?php echo number_format($car['precio'] * $car['cantidad'], 2, ',', '.'); ?></td>
                    <td>
                        <a href="<?= base_url('carrito2/eliminarcar/'.$car['id_carrito'])?>" class="btn btn-danger" type="button">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <button type="submit" class="btn btn-primary">Actualizar carrito</button>
</form>

<?=$pie;?>
