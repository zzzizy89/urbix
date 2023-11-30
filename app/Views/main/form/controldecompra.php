<!-- En tu vista controldecompra.php -->
<?=$cabecera;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="<?php echo base_url('assets/js/cookies/cookies.js'); ?>"></script>
    <title>control</title>
    <link rel="website icon" type="png" href="<?php echo base_url('assets/css/img/iconos/logo.png');?>">
</head>
<body>

    <h1>Control de Compras</h1>

    <?php if (!empty($compra)): ?>
        <table>
            <thead>
                <tr>
                
                    <th>Usuario</th>
                    
                    <th>Producto</th>

                    <th>Tipo</th>

                    <th>Cantidad</th>

                    <th>PrecioU</th>

                    <th>Subtotal</th>

                    <th>Fecha compra</th>

                    			<!-- 
                    <th>Total de Compra</th>
                    -->

                </tr>
            </thead>
            <tbody>
                        <?php foreach ($compra as $item): ?>
                <tr>
                    <?php if ($item): ?>
                        <td><?= $item->email_usuario ?></td>

                        <td><?= $item->nombre_producto ?></td>

                        <td><?= $item->tipo_prod ?></td>


                        <td><?= $item->cantidad ?></td>

                        <td><?= $item->precio_unitario ?></td>


                        <td><?= $item->subtotal ?></td>

                        <td><?= $item->fecha_compra ?></td>

                        <!-- 
                        <td> //$item->total_compra </td>
                        -->

                    <?php else: ?>
                        <td colspan="6">No hay datos de compras para mostrar.</td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    <?php else: ?>
        <p>No hay datos de compras para mostrar.</p>
    <?php endif; ?>

</body>
</html>
<?=$pie;?>
