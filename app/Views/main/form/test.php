<!DOCTYPE html>
<html>
<head>
    <title>Test View</title>
</head>
<body>
    <?php echo $cabecera; ?>

    <h1>Test View</h1>

    <ul>
        <?php foreach ($teclados as $teclado): ?>
            <li>
                <?php echo $teclado['nombre']; ?>
                <img src="<?php echo base_url('uploads/' . $teclado['imagen']); ?>" alt="Imagen del teclado">
            </li>
        <?php endforeach; ?>
    </ul>

    <?php echo $pie; ?>
</body>
</html>