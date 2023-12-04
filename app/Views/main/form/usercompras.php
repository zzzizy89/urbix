<?=$cabecera;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url('assets/js/cookies/cookies.js'); ?>"></script>
    <title>Control</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/css/img/iconos/logo.png');?>">
</head>
<body>

    <div class="container mt-4">
        <h1 class="mb-4">Mis Compras</h1>

        <?php if (!empty($compra)): ?>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Producto</th>
                        <th>Tipo</th>
                        <th>Cantidad</th>
                        <th>PrecioU</th>
                        <th>Subtotal</th>
                        <th>Fecha compra</th>
                        <!-- <th>Total de Compra</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($compra as $item): ?>
                        <tr>
                            <?php if ($item): ?>
                                <td><?= $item->nombre_producto ?></td>
                                <td><?= $item->tipo_prod ?></td>
                                <td><?= $item->cantidad ?></td>
                                <td>$<?= $item->precio_unitario ?></td>
                                <td>$<?= $item->subtotal ?></td>
                                <td><?= $item->fecha_compra ?></td>
                                <!-- <td> //$item->total_compra </td> -->
                            <?php else: ?>
                                <td colspan="7">No hay datos de compras para mostrar.</td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay datos de compras para mostrar.</p>
        <?php endif; ?>
    </div>

    <!-- Agregamos la referencia al archivo JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
<?=$pie;?>
