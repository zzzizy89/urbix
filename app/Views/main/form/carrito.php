<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/carrito.css');?>">
    <script src="<?php echo base_url('assets/js/carrito.js');?>" async></script>
    <title>Catalogo Urbix</title>
</head>
<body>
    <header>
        <h1></h1>
    </header>
    <section class="contenedor">
        <!-- Contenedor de elementos -->
        <div class="contenedor-items">
        <?php foreach ($productos as $producto): ?>
            <div class="item">
            <form method="post" action="<?php echo base_url('compradirca'); ?>" id="carritoForm">
                <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
                <span class="titulo-item"><?php echo $producto['nombre']; ?></span>
                <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
                <img src="<?php echo base_url('uploads/' . $producto['imagen']); ?>" alt="Imagen del teclado" class="img-item">
                <!-- Puedes modificar la lógica de precio y botón según tus necesidades -->
                <span class="titulo-item"><?php echo $producto['descripcion_prod']; ?></span>
                <span class="precio-item">$<?php echo number_format($producto['precio'], 2, ',', '.'); ?></span>
                <input type="number" name="cantidad" value="1" min="1">
                <button type="submit" formmethod="post" class="boton-item" onclick="setFormAction('carrito/guar')">Agregar al Carrito</button>
                <button type="submit" formmethod="post" class="btn btn-success">Comprar</button>
            </form>

            </div>
        <?php endforeach; ?>
    </div>
    <?php echo $pie; ?>
    </section>
    
</body>
<script>
    function setFormAction(action) {
        var form = document.getElementById('carritoForm');
        form.action = "<?php echo base_url(); ?>/" + action;
        form.submit();
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var carritoForm = document.getElementById('carritoForm');

        if (carritoForm) {
            carritoForm.addEventListener('submit', function (event) {
                // Verificar si el usuario está logeado
                var usuarioLogeado = <?php echo json_encode(session('user') !== null); ?>;

                if (!usuarioLogeado) {
                    // Mostrar un mensaje de alerta si el usuario no está logeado
                    alert('Debes estar logeado para agregar productos al carrito.');
                    event.preventDefault(); // Evitar que el formulario se envíe
                }
            });
        }
    });
</script>

</html>