<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta información -->
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Parallax Text On Scroll</title>
		<link rel="website icon" type="png" href="../assets/img/primary/urbix.png">

		<!-- Estilos CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/primary.css');?>">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css');?>">

		<!-- Bibliotecas y scripts -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url('assets/js/wow.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/t.min.js');?>"></script>

		<!-- Fuentes -->
		<link href="https://fonts.googleapis.com/css?family=Roboto+Mono:100,100i,300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
	</head>
	<body>
		<!-- Cabecera -->
		<header class="header">
			<a href="#" class="logo">urbix</a>
			<!-- Para animación JS -->
			<div class="bx bx-menu" id="menu-icon"></div>

			<nav class="navbar">
				<a href="#home" class="hover-this"><span>home</span></a>
				<a href="#acerca" class="hover-this"><span>about</span></a>
				<a href="<?=base_url('catalogo')?> " class="hover-this"><span>catalogue</span></a>
				<a href="<?=base_url('contact')?> " class="hover-this"><span>contact</span></a>
				<a href="<?=base_url('login')?> " class="hover-this"><span>Cuenta</span></a>
				<span class="active-nav"></span>
				<div class="cursor"></div>
			</nav>
		</header>

		<!-- Sección de inicio -->
		<section class="home" id="home">
			<div class="home-content">
				<img src="<?php echo base_url('assets/img/primary/urbix.png');?>" alt="" class="floating-image">
			
			</div>
			<div class="scroll-down"></div>
		</section>

		<!-- Sección "Acerca" -->
		<section class="acerca" id="acerca">
			<div class="container-fluid">
				<br><br><br>
				<h6>who we are?</h6>
				<div class="vertical"></div>
				<br>
				<div class="whitespace"></div>
				<div class="whitespace"></div>
				<div class="row">
					<div class="col-lg-8"></div>
					<div class="col-lg-4 project project1 wow fadeInUp" onclick="location.href='project.html'"></div>
				</div>
				<div class="whitespace"></div>
				<div class="row">
					<div class="col-lg-6 project project2 wow fadeInUp" onclick="location.href='project.html'"></div>
					<div class="col-lg-6"></div>
				</div>
				<div class="whitespace"></div>
				<div class="row">
					<div class="col-lg-7"></div>
					<div class="col-lg-4 project project3 wow fadeInUp" onclick="location.href='project.html'"></div>
					<div class="col-lg-1"></div>
				</div>
				<div class="whitespace"></div>
				<div class="row">
					<div class="col-lg-1"></div>
					<div class="col-lg-5 project project4 wow fadeInUp" onclick="location.href='project.html'"></div>
					<div class="col-lg-6"></div>
				</div>
				<div class="whitespace"></div>
			</div>
		</section>

		<!-- Pie de página -->
		<footer>
			<div class="marquee">
				<span>
                &nbsp; discuss your ideas &nbsp; / &nbsp; unexpected time &nbsp; /
                &nbsp; spatial experiencies &nbsp; / &nbsp; best specialists &nbsp; /
                &nbsp; impulse &nbsp; / &nbsp;  independent online store &nbsp; / &nbsp; 
                you can't download the experience &nbsp;   
            </span>
			</div>
		</footer>

		<!-- Scripts adicionales -->
		<script src="<?php echo base_url('assets/js/script-marquee.js');?>"></script>
		<script src="<?php echo base_url('assets/js/script.js');?>"></script>

		<!-- Script para parallax -->
		<script>
			let atScroll = false;
			        let parallaxTitle = document.querySelectorAll(".parallax-title");
			
			        const scrollProgress = () => {
			            atScroll = true;
			        };
			
			        const raf = () => {
			            if (atScroll) {
			                parallaxTitle.forEach((element, index) => {
			                    element.style.transform = "translateX(" + window.scrollY / 8 + "%)";
			                });
			                atScroll = false;
			            }
			            requestAnimationFrame(raf);
			        };
			
			        requestAnimationFrame(raf);
			        window.addEventListener("scroll", scrollProgress);
			
		</script>

		<!-- Script para animación de enlaces -->
		<script>
			(function () {
			            const link = document.querySelectorAll('nav > .hover-this');
			            const cursor = document.querySelector('.cursor');
			
			            const animateit = function (e) {
			                const span = this.querySelector('span');
			                const { offsetX: x, offsetY: y } = e,
			                    { offsetWidth: width, offsetHeight: height } = this,
			
			                    move = 25,
			                    xMove = x / width * (move * 2) - move,
			                    yMove = y / height * (move * 2) - move;
			
			                span.style.transform = `translate(${xMove}px, ${yMove}px)`;
			
			                if (e.type === 'mouseleave') span.style.transform = '';
			            };
			
			            const editCursor = e => {
			                const { clientX: x, clientY: y } = e;
			                cursor.style.left = x + 'px';
			                cursor.style.top = y + 'px';
			            };
			
			            link.forEach(b => b.addEventListener('mousemove', animateit));
			            link.forEach(b => b.addEventListener('mouseleave', animateit));
			            window.addEventListener('mousemove', editCursor);
			        })();
			
		</script>

		<!-- Scripts para animación y efectos -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
		<script type="text/javascript">
			// Script de navegación
			        $("#toggle").click(function() {
			            $(this).toggleClass('on');
			            $("#resize").toggleClass("active");
			        });
			
			        $("#resize ul li a").click(function() {
			            $(this).toggleClass('on');
			            $("#resize").toggleClass("active");
			        });
			
			        $(".close-btn").click(function() {
			            $(this).toggleClass('on');
			            $("#resize").toggleClass("active");
			        });
			
			        // Animación de navegación
			        TweenMax.from("#brand", 1, {
			            delay: 0.4,
			            y: 10,
			            opacity: 0,
			            ease: Expo.easeInOut
			        })
			
			        TweenMax.staggerFrom("#menu li a", 1, {
			            delay: 0.4,
			            opacity: 0,
			            ease: Expo.easeInOut
			        }, 0.1);
			
			        // Inicialización de la biblioteca WOW.js
			        new WOW().init();
			
		</script>
	</body>
</html>