<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Parallax Text On Scroll</title>
        <link rel="stylesheet" href="assets/css/primary.css">
        <link rel="stylesheet" href="../assets/css/primary.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>

    </head>
    <body>
    
    <header class="header">
						<a href="#" class="logo">Luiggi</a>
						<!-- Para animacion JS -->
						<div class="bx bx-menu" id="menu-icon"></div>

						<nav class="navbar">
								<a href="#home" class="active">Inicio</a>
								<a href="#acerca">Acerca</a>
								<a href="#catalogo">Catalogo</a>
								<a href="#contacto">Contacto</a>
								<a href="<?=base_url('login')?>">Cuenta</a>
								<span class="active-nav"></span>
								
						</nav>

				</header>
                
                
                <section id="home"> 
        <div class="smooth-scroll-wrapper">
            <div class="content">
                <div class="container">
                    <div class="image-container">
                        <h2 class="text text-dark">
                            <span class="parallax-title">
                            we are the best in the details
                            </span>
                        </h2>
                    </div>

                    <h2 class="text">
                        <span class="parallax-title">
                        we are the best in the details
                        </span>
                    </h2>
                </div>
            </div>
        </div>
        </section>
       



    
			
			<div class="overlay" id="catalogo">
				<div class="images">
					<div class="img img-1"></div>
					<div class="img img-2"></div>
					<div class="img img-3"></div>
					<div class="img img-4"></div>
					<div class="img img-5"></div>
					<div class="img img-6"></div>
					<div class="img img-7"></div>
					<div class="img img-8"></div>
				</div>
			</div>
	

<script src="assets/js/script.js"></script>
<script src="../assets/js/script.js"></script>
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
    </body>
</html>