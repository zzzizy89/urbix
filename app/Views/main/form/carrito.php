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
        <?php foreach ($teclados as $teclado): ?>
            <div class="item">
                <span class="titulo-item"><?php echo $teclado['nombre']; ?></span>
                <img src="<?php echo base_url('uploads/' . $teclado['imagen']); ?>" alt="Imagen del teclado" class="img-item">
                <!-- Puedes modificar la lógica de precio y botón según tus necesidades -->
                <span class="precio-item">$<?php echo number_format($teclado['precio'], 2, ',', '.'); ?></span>
                <form method="post" action="<?php echo base_url('carrito/guar'); ?>">
            <input type="hidden" name="id_teclado" value="<?php echo $teclado['id_teclado']; ?>">
            <input type="hidden" name="nombre" value="<?php echo $teclado['nombre']; ?>">
            <input type="hidden" name="precio" value="<?php echo $teclado['precio']; ?>">
            <input type="hidden" name="imagen" value="<?php echo $teclado['imagen']; ?>">
            <button type="submit" class="boton-item">Agregar al Carrito</button>
        </form>
            </div>
        <?php endforeach; ?>
    </div>

    <?php echo $pie; ?>
        <!-- Carrito de Compras -->
        <div class="carrito" id="carrito">
            <div class="header-carrito">
                <h2>Tu Carrito</h2>
            </div>

            <div class="carrito-items">
                <!-- 
                <div class="carrito-item">
                    <img src="img/boxengasse.png" width="80px" alt="">
                    <div class="carrito-item-detalles">
                        <span class="carrito-item-titulo">Box Engasse</span>
                        <div class="selector-cantidad">
                            <i class="fa-solid fa-minus restar-cantidad"></i>
                            <input type="text" value="1" class="carrito-item-cantidad" disabled>
                            <i class="fa-solid fa-plus sumar-cantidad"></i>
                        </div>
                        <span class="carrito-item-precio">$15.000,00</span>
                    </div>
                   <span class="btn-eliminar">
                        <i class="fa-solid fa-trash"></i>
                   </span>
                </div>
                <div class="carrito-item">
                    <img src="img/skinglam.png" width="80px" alt="">
                    <div class="carrito-item-detalles">
                        <span class="carrito-item-titulo">Skin Glam</span>
                        <div class="selector-cantidad">
                            <i class="fa-solid fa-minus restar-cantidad"></i>
                            <input type="text" value="3" class="carrito-item-cantidad" disabled>
                            <i class="fa-solid fa-plus sumar-cantidad"></i>
                        </div>
                        <span class="carrito-item-precio">$18.000,00</span>
                    </div>
                   <button class="btn-eliminar">
                        <i class="fa-solid fa-trash"></i>
                   </button>
                </div>
                 -->
            </div>
            <div class="carrito-total">
                <div class="fila">
                    <strong>Tu Total</strong>
                    <span class="carrito-precio-total">
                     
                    </span>
                </div>
                <button class="btn-pagar">Pagar <i class="fa-solid fa-bag-shopping"></i> </button>
            </div>
        </div>
    </section>
</body>
</html>