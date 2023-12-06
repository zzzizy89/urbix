<!DOCTYPE html>
<html lang="es">

  <head>
    <!-- Configuración del documento HTML -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Enlace a la hoja de estilos de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Enlace a la hoja de estilos local -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/form/catalogo.css');?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
    <!-- Enlace al script de JavaScript local NO NECESARIO
    <script src="<?php echo base_url('assets/js/carrito.js');?>" async></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url('assets/js/cookies/cookies.js'); ?>"></script>
    <!-- Título de la página -->
    <title>catalogue</title>
    <link rel="website icon" type="png" href="<?php echo base_url('assets/css/img/iconos/logo.png');?>">
  </head>

  <body>
    <div class="cursor"></div>
    <!-- Encabezado de la página -->

    <!-- Agrega este código donde desees mostrar el botón de filtro -->
    <div>



      <!-- NAV section starts here -->

      <div class="container2">
        <div class="menu-open">menu</div>
        <div class="nav-container">
          <div class="menu-close">close</div>

          <nav class="menu">
            <div class="menu__item">
              <a class="menu__item-link" href="<?php echo base_url('inicio')?>">Home</a>

              <div class="marquee">
                <div class="marquee__inner">
                  <span>Home - Home - Home - Home - Home - Home - Home</span>
                </div>
              </div>
            </div>
            <div class="menu__item">
              <a class="menu__item-link" href="<?php echo base_url('intro_about')?>">About</a>

              <div class="marquee">
                <div class="marquee__inner">
                  <span>About - About - About - About - About - About
								- About</span
							>
						</div>
					</div>
				</div>
				<div class="menu__item">
					<a class="menu__item-link" href="<?php echo base_url('intro_catalogo')?>">Catalogue</a>
			
					<div class="marquee">
						<div class="marquee__inner">
							<span>Catalogue - Catalogue - Catalogue - Catalogue - Catalogue - Catalogue - Catalogue</span>                  
                </div>
              </div>
            </div>
            <div class="menu__item">
              <a class="menu__item-link" href="<?php echo base_url('intro_contacto')?>">Contact</a>

              <div class="marquee">
                <div class="marquee__inner">
                  <span>Contact - Contact - Contact - Contact - Contact - Contact -
								Contact</span
							>
						</div>
					</div>
				</div>
				<?php if (session('user') && session('user')->name): ?>
				<div class="menu__item">
					<a class="menu__item-link" href="<?php echo base_url('intro_dashboard')?>"><?= session('user')->name ?></a>

					<div class="marquee">
						<div class="marquee__inner">
							<span><?= session('user')->name ?> - <?= session('user')->name ?> - <?= session('user')->name ?> - <?= session('user')->name ?> - <?= session('user')->name ?> - <?= session('user')->name ?> -
								Account</span>

                </div>
              </div>
              <?php else: ?>
              <div class="menu__item">
                <a class="menu__item-link" href="<?php echo base_url('intro_login')?>">Account</a>
                <div class="marquee">
                  <div class="marquee__inner">
                    <span>Account - Account - Account - Account - Account - Account -
									Account</span>
                  </div>
                </div>
              </div>
              <?php endif; ?>
            </div>


          </nav>
        </div>
      </div>
      <!-- NAV section ends here -->
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

    <option value="">type</option>
    
    <option value="">all</option>
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
            <span class="descp-item"><?php echo $producto['descripcion_prod']; ?></span>
            <span class="precio-item">$<?php echo number_format($producto['precio'], 2); ?></span>            

            <!-- Entrada de cantidad y botón "Agregar al Carrito" -->
            <input type="number" name="cantidad" class="cantidad-input" value="1" min="1">
            <button type="submit" name="action" value="add_to_cart" class="boton-item">add to cart</button>            
          </form>

          <!-- Segundo formulario para comprar -->
          <form id="compra" method="post" action="<?php echo base_url('compradirca'); ?>">
            <!-- Campos ocultos para el ID del producto, cantidad y precio (repetidos) -->
            <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
            <input type="hidden" name="precio" value="<?php echo $producto['precio']; ?>">


            <!-- Campo oculto para la cantidad en el segundo formulario -->
            <input type="hidden" name="cantidad" class="cantidad-hidden" value="1">

            <!-- Botón "Comprar" -->
            <button type="submit" name="action" value="buy" class="btn btn-success">to purchase</button>

          </form>
        </div>
        <?php endforeach; ?>
      </div>

      <!-- Inclusión de un fragmento HTML llamado $pie -->

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

  <!-- script para el cursor -->

  <script>
    document.addEventListener("DOMContentLoaded", function () {
    		    const cursor = document.querySelector(".cursor");
    		
    		    document.addEventListener("mousemove", function (e) {
    		        const x = e.pageX - cursor.offsetWidth / 2;
    		        const y = e.pageY - cursor.offsetHeight / 2;
    		
    		        cursor.style.transform = `translate(${x}px, ${y}px)`;
    		    });
    		});
    		
    		
    
  </script>

  <script>
	$(document).ready(function() {
    var t1 = new TimelineMax({ paused: true });

    t1.to(".nav-container", 1, {
        left: 0,
        ease: Expo.easeInOut,
    });

    t1.staggerFrom(
        ".menu > div",
        0.8,
        { y: 100, opacity: 0, ease: Expo.easeOut },
        "0.1",
        "-=0.4"
    );

    t1.staggerFrom(
        ".socials",
        0.8,
        { y: 100, opacity: 0, ease: Expo.easeOut },
        "0.4",
        "-=0.6"
    );

    t1.reverse();

    $(document).on("click", ".menu-open", function () {
        // Deshabilitar desplazamiento vertical
        $("body").css("overflow-y", "hidden");

        t1.reversed(!t1.reversed());
    });

    $(document).on("click", ".menu-close", function () {
        // Restablecer desplazamiento vertical
        $("body").css("overflow-y", "auto");

        t1.reversed(!t1.reversed());
    });
});
    
  </script>

</html>