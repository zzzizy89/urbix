<?=$cabecera;?>
<br>
<br>

<table class="table table-dark">
        <thead class="thead-light">
                <tr>
                        <th>#</th>
                        <th>imagen</th>
                        <th>nombre</th>
                        <th>precio</th>
                        <th>Acciones</th>
                </tr>
        </thead>
        <tbody>

                <?php foreach($carritos as $car): ?>
                <tr>
                        <td>
                                <?php echo $car['id_carrito'];?>
                        </td>
                        <td>
                                <img class="img-thumbnail" width="100" src="<?=base_url('uploads/'.$car['imagen'])?>" alt="teclado">

                        </td>
                        <td>
                                <?php echo $car ['nombre'];?>
        
                        </td>
                        <td>
                        <?php echo number_format($car['precio'], 2, ',', '.'); ?>
        
                        </td>
                        <td>
                                <a href="<?=base_url('carrito2/eliminarcar/'.$car['id_carrito'])?>" class="btn btn-danger" type="button">Eliminar</a>
                        </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
</table>
<?=$pie;?>