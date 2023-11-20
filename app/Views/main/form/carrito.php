<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Configuración del documento HTML -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Enlace a la hoja de estilos de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />

    <!-- Enlace a la hoja de estilos local -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/form/catalogo.css');?>">

    <!-- Enlace al script de JavaScript local NO NECESARIO
    <script src="<?php echo base_url('assets/js/carrito.js');?>" async></script>
    -->
    <!-- Título de la página -->
    <title>Catalogo Urbix</title>
</head>

<body>
    <!-- Encabezado de la página -->
    <div class="container">
    <header>
        <div class="header-left">
            
            <nav>
                <ul>
                    <li>
                        <a href="<?=base_url('intro_inicio')?>" >Home</a>
                    </li>
                    <li>
                        <a href="<?=base_url('intro_about')?>">about</a>
                    </li>
                    <li>
                        <a href="<?=base_url('carrito')?>" class="active">catalogue</a>
                    </li>
                    <li>
                        <a href="#">contact</a>
                    </li>

                    <li>
                        <a href="#">account</a>
                    </li>
                    
            
                  
                </ul>
             
            </nav>
           
        </div>
        <div class="header-right">
            <div class="hamburger">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </header>
</div>
<!-- Agrega este código donde desees mostrar el botón de filtro -->
<div>
<button class="cart-button">
        <span class="cart-icon"><a href="<?=base_url('carrito2')?>">&#128722;</a></span>
    </button>
    <label for="tipo"></label>
    <!-- this.value estaria guardando el value de cada uno
    ejemplo en todos no tiene un value por lo que en el script
    se estaria cumpliento la condicion de idTipo === ""
    encambio en el foreach se estaria guardando la id_tipoprod
    por lo que se cumple el else que pasa por parametros esa id
    a routes luego al controlador y de ahi hace las operaciones con esa id
-->
    <select id="tipo" onchange="filtrarPorTipo(this.value)"> 

    <option value="">Tipo</option>
    
    <option value="">Todos</option>
    <?php foreach ($tipos as $tipo): ?>
        <option value="<?php echo $tipo['id_tipoprod']; ?>" <?php echo ($tipo_actual == $tipo['id_tipoprod']) ? 'selected' : ''; ?>>
            <?php echo $tipo['tipo']; ?>
        </option>
    <?php endforeach; ?>
</select>

</div>
    <!-- Sección principal de la página -->
    <section class="contenedor">
        <!-- Contenedor de elementos -->
        <div id="bfor" class="contenedor-items">
            <?php foreach ($productos as $producto): ?>
                <div class="item">
                    <!-- Primer formulario para agregar al carrito -->
                    <form method="post" id="carritoForm" action="<?php echo base_url('carrito/guar'); ?>">
                        <!-- Campos ocultos para el ID del producto, cantidad y precio -->
                        <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
                        <input type="hidden" name="precio" value="<?php echo $producto['precio']; ?>">
                        <input type="hidden" name="tipo_actual" value="<?php echo isset($tipo_actual) ? $tipo_actual : ''; ?>">

                        <!-- Visualización de información del producto -->
                        <span class="titulo-item"><?php echo $producto['nombre']; ?></span>
                        <img src="<?php echo base_url('uploads/' . $producto['imagen']); ?>" alt="Imagen del teclado" class="img-item">
                        <span class="titulo-item"><?php echo $producto['descripcion_prod']; ?></span>
                        <span class="precio-item">$<?php echo number_format($producto['precio'], 2, ',', '.'); ?></span>

                        <!-- Entrada de cantidad y botón "Agregar al Carrito" -->
                        <input type="number" name="cantidad" class="cantidad-input" value="1" min="1">
                        <button type="submit" name="action" value="add_to_cart" class="boton-item">Agregar al Carrito</button>
                    </form>

                    <!-- Segundo formulario para comprar -->
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

        <!-- Inclusión de un fragmento HTML llamado $pie -->
        <?php echo $pie; ?>
    </section>
</body>

<!-- Script para el filtrado por tipo -->
<script>
    function filtrarPorTipo(idTipo) {
        if (idTipo === "") {
            window.location.href = "<?php echo base_url('carrito'); ?>";
        } else {
            window.location.href = "<?php echo base_url('productof/'); ?>" + idTipo;
        }
    }
</script>


<!-- Script para sincronizar campos de cantidad entre formularios -->
<script>
    const cantidadInputs = document.querySelectorAll('.cantidad-input');
    const cantidadHiddens = document.querySelectorAll('.cantidad-hidden');
    
    cantidadInputs.forEach(function (cantidadInput, index) {
        cantidadInput.addEventListener('change', function () {
            const cantidad = cantidadInput.value;
            cantidadHiddens[index].value = cantidad;
        });
    });
</script>

<!-- Script para cambiar la acción del formulario no es necesario
<script>
    function setFormAction(action) {
        var form = document.getElementById('carritoForm');
        form.action = "<?php echo base_url(); ?>/" + action;
        form.submit();
    }
</script>
-->
<!-- Script para verificar si el usuario está logeado antes de enviar el formulario -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var carritoForm = document.getElementById('bfor');

        if (carritoForm) {
            carritoForm.addEventListener('submit', function (event) {
                var usuarioLogeado = <?php echo json_encode(session('user') !== null); ?>;

                if (!usuarioLogeado) {
                    alert('Debes estar logeado para realizar esta operación');
                    event.preventDefault();
                }
            });
        }
    });
</script>

</html>