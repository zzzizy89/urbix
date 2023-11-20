<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/form/carrito.css');?>">
    <title>Document</title>
</head>
<body>
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
                <th>imagen</th>
                <th>nombre</th>
                <th>cantidad</th>
                <th>Descripción</th>
                <th>tipo</th>
                <th>precio</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php   $contador = 1;?>
            <?php foreach($carritos as $car): ?>
                <tr>
                <td><?php echo $contador; ?></td> <!-- Mostramos el contador en lugar de id_carrito -->

                    <!--  <td> <?php  echo $car['id_carrito'];?></td> -->
                    <td>
                        <img class="img-thumbnail" width="100" src="<?= base_url('uploads/'.$car['producto_imagen']) ?>" alt="teclado">
                    </td>
                    <td><?php echo $car['nombre'];?></td>
                    <td>
                        <input type="number" name="cantidad[<?= $car['id_carrito'];?>]" value="<?= $car['cantidad'];?>" min="1">
                    </td>
                
                    <td><?php echo $car['descripcion_prod'];?></td>


                    <td>
                        <?php echo $car['tipo_producto'];?>
                    </td>

                    <td><?php echo number_format($car['precio'], 2, ',', '.'); ?></td>
                    <td><?php echo number_format($car['precio'] * $car['cantidad'], 2, ',', '.'); ?></td>
                    <td>
                        <button  class="btn btn-danger" ><a href="<?= base_url('carrito2/eliminarcar/'.$car['id_carrito'])?>">Eliminar</a></button>
                    </td>
                </tr>
                <?php  $contador++;?> 
            <?php endforeach; ?>
        </tbody>
    </table>
  <button  class="btn btn-success" ><a href="<?= base_url('comprar/')?>">Comprar</a></button>
    <button type="submit" class="btn btn-primary">Actualizar carrito</button>
</form>

</body>
</html>



