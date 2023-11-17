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
        <form method="post" id="carritoForm" action="<?php echo base_url('carrito/guar'); ?>">
            <!-- Campos ocultos para el ID del producto, cantidad y precio -->
            <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
            <input type="hidden" name="precio" value="<?php echo $producto['precio']; ?>">
           
            <span class="titulo-item"><?php echo $producto['nombre']; ?></span>
            <img src="<?php echo base_url('uploads/' . $producto['imagen']); ?>" alt="Imagen del teclado" class="img-item">
            <span class="titulo-item"><?php echo $producto['descripcion_prod']; ?></span>
            <span class="precio-item">$<?php echo number_format($producto['precio'], 2, ',', '.'); ?></span>
            <input type="number" name="cantidad" class="cantidad-input" value="1" min="1">
            <!-- Botón "Agregar al Carrito" -->
            <button type="submit" name="action" value="add_to_cart" class="boton-item">Agregar al Carrito</button>
        </form>

        <!-- Segundo formulario para el botón "Comprar" -->
        <form id="compra" method="post" action="<?php echo base_url('compradirca'); ?>">
            <!-- Campos ocultos para el ID del producto, cantidad y precio (repetidos) -->
            <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
            <input type="hidden" name="precio" value="<?php echo $producto['precio']; ?>">
            <!-- Campo oculto para la cantidad en el segundo formulario -->
            <input type="hidden" name="cantidad" class="cantidad-hidden" value="1">
            <!-- Botón "Comprar" -->
            <button type="submit" name="action" value="buy" class="btn btn-success">Comprar</button>
        </form>
    </div>
<?php endforeach; ?>

    </div>
    <?php echo $pie; ?>
    </section>
    
</body>
<script>
    // Captura todos los campos de cantidad en ambos formularios
    const cantidadInputs = document.querySelectorAll('.cantidad-input');
    const cantidadHiddens = document.querySelectorAll('.cantidad-hidden');
    
    // Escucha el evento de cambio en los campos de cantidad en el primer formulario
    cantidadInputs.forEach(function (cantidadInput, index) {
        cantidadInput.addEventListener('change', function () {
            // Obtén el valor de la cantidad
            const cantidad = cantidadInput.value;
            // Actualiza el campo oculto correspondiente en el segundo formulario
            cantidadHiddens[index].value = cantidad;
        });
    });
</script>


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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var compra = document.getElementById('compra');

        if (compra) {
            compra.addEventListener('submit', function (event) {
                // Verificar si el usuario está logeado
                var usuarioLogeado = <?php echo json_encode(session('user') !== null); ?>;

                if (!usuarioLogeado) {
                    // Mostrar un mensaje de alerta si el usuario no está logeado
                    alert('Debes estar logeado para comprar.');
                    event.preventDefault(); // Evitar que el formulario se envíe
                }
            });
        }
    });
</script>

</html>