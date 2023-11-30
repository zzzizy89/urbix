<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>urbix</title>
		<link rel="website icon" type="png" href="<?php echo base_url('assets/css/img/iconos/logo.png');?>">
		<link rel="stylesheet" href="<?php echo base_url ('assets/css/animation/intro.css')?>" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
	</head>
	<body>
		<!-- section container starts here -->
		<div class="container">
			<!-- section button starts here -->
			<button class="btn">Enter</button>
			<!-- section button ends here -->
			<!-- section text-container starts here -->
			<div class="text-container"></div>
			<!-- section text-container ends here -->
			<!-- section text-wrapper starts here -->
			<div class="text-wrapper">
				<!-- section text starts here -->
				<div class="text">
					quality quality quality quality quality quality quality quality quality quality quality .
				</div>
				<div class="text">
					quality quality quality quality quality quality quality quality quality quality quality .
				</div>
				<div class="text">
					quality quality quality quality quality quality quality quality quality quality quality .
				</div>
				<div class="text">
					quality quality quality quality quality quality quality quality quality quality quality .
				</div>
				<div class="text">
					quality quality quality quality quality quality quality quality quality quality quality .
				</div>
				<div class="text">
					quality quality quality quality quality quality quality quality quality quality quality .
				</div>
				<div class="text">
					quality quality quality quality quality quality quality quality quality quality quality .s
				</div>
				<div class="text">
					quality quality quality quality quality quality quality quality quality quality quality .
				</div>
				<div class="text">
					quality quality quality quality quality quality quality quality quality quality quality .
				</div>
				<div class="text">
					quality quality quality quality quality quality quality quality quality quality quality .
				</div>
				<div class="text">
					quality quality quality quality quality quality quality quality quality quality quality .
				</div>
				<div class="text">
					quality quality quality quality quality quality quality quality quality quality quality .
				</div>
				<div class="text">
					quality quality quality quality quality quality quality quality quality quality quality .
				</div>
				<div class="text">
					quality quality quality quality quality quality quality quality quality quality quality .
				</div>
				<div class="text">
					quality quality quality quality quality quality quality quality quality quality quality .
				</div>
				<!-- section text ends here -->
			</div>
			<!-- section text-wrapper ends here -->
			<div class="header">urbix</div>
		</div>
		<!-- section container ends here -->

		<!-- script para la animacion de los textos -->
		<script>
			// Selecciona el botón con la clase ".btn"
			    const btn = document.querySelector(".btn");
			
			    // Función para redirigir a otra vista
			    function redirectToAnotherView() {
			        // Obtiene la URL absoluta utilizando PHP y redirige a la vista "inicio"
			        var absoluteUrl = "<?php echo site_url('inicio'); ?>";
			        window.location.href = absoluteUrl;
			    }
			
			    // Agrega un evento de escucha al hacer clic en el botón
			    btn.addEventListener("click", function () {
			        // Animaciones utilizando la librería GSAP y Anime.js
			        gsap.to(".btn", 1, {
			            opacity: 0,
			            y: -40,
			            ease: Expo.easeInOut,
			        });
			
			        gsap.to(".text-wrapper > div", 1, {
			            x: "500",
			            ease: Expo.easeInOut,
			            delay: 1,
			            stagger: 0.1,
			        });
			
			        gsap.to(".text-wrapper", 3, {
			            y: -600,
			            scale: 4.5,
			            rotate: -90,
			            ease: Expo.easeInOut,
			            delay: 1.5,
			        });
			
			        gsap.to(".text", 1, {
			            opacity: 1,
			            ease: Expo.easeInOut,
			            delay: 3,
			        });
			
			        gsap.to(".text-wrapper > div", 4, {
			            x: "-3500",
			            ease: Expo.easeInOut,
			            delay: 3.5,
			            stagger: 0.05,
			        });
			
			        gsap.to(".text-container", 2, {
			            bottom: "-100%",
			            ease: Expo.easeInOut,
			            delay: 6,
			        });
			
			        // Obtiene el elemento con la clase "header" para aplicar efectos de animación de texto
			        let textWrapper = document.querySelector(".header");
			
			        // Reemplaza cada carácter del texto con un elemento <span>
			        textWrapper.innerHTML = textWrapper.textContent.replace(
			            /\S/g,
			            "<span class='letter'>$&</span>"
			        );
			
			        // Configura la animación de texto con Anime.js
			        anime.timeline().add({
			            targets: ".header .letter",
			            opacity: [0, 1],
			            translateY: [200, 0],
			            translateZ: 0,
			            easing: "easeOutExpo",
			            duration: 2000,
			            delay: (el, i) => 7000 + 40 * i,
			            complete: function () {
			                // Llama a la función al finalizar la animación
			                redirectToAnotherView();
			            },
			        });
			    });
			
		</script>

	</body>
</html>