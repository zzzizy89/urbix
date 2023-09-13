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
						<a href="#" class="logo">urbix</a>
						<!-- Para animacion JS -->
						<div class="bx bx-menu" id="menu-icon"></div>

						<nav class="navbar">
								<a href="#home" class="hover-this"><span>Inicio</span></a>
								<a href="#acerca" class="hover-this"><span>Acerca</span></a>
								<a href="#catalogo" class="hover-this"><span>Catalogo</span></a>
								<a href="#contacto" class="hover-this"><span>Contacto</span></a>
								<a href="<?=base_url('login')?> "class="hover-this"><span>Cuenta</span></a>
								<span class="active-nav" ></span>
                                <div class="cursor"></div>
								
						</nav>

				</header>


                
         <section class="home" id="home">
         <div class="home-content">


<h2>URBIX89.STUDIO</h2>


</div>
<div class="scroll-down"></div>


         </section>
 
<section class="acerca" id="acerca">
<div class="wrapper">
      <figure class="card">
        <img
          src="../assets/img/primary/women.jpg"
          width="640"
          height="640"
          alt=""
        />
        <figcaption>
          <blockquote>
            We shape our tools and then the tools shape us.
          </blockquote>
          <cite> "In our company, we lead the way."</cite>
          <p class="credit">
            <strong>Urbix -</strong>
            <a href="https://www.logitechg.com/es-ar" target="_blank">Logitech</a>
          </p>
        </figcaption>
      </figure>
    </div>
   
</section>
					
      
		
		

<section class="catalogo" id="catalogo">

						<h2 class="" heading>Nuestro <span>Catalogo</span></h2>

						<div class="grid-container">

								<div class="product">

										<img src="../assets/img/productos/blue.png" alt="Teclado 1">
										

								</div>

								<div class="product">

										<img src="../assets/img/productos/neg.png" alt="Teclado 2">

								</div>

								<div class="product">

										<img src="../assets/img/productos/yellow.png" alt="Teclado 3">

								</div>
								<div class="product">

										<img src="../assets/img/productos/rosa.png" alt="Teclado 4">

								</div>

								<div class="product">

										<img src="../assets/img/productos/negro.png" alt="Teclado 5">

								</div>

								<div class="product">

										<img src="../assets/img/productos/gris.png" alt="Teclado 6">

								</div>


								<div class="btn-box btns">

										<button type="submit" class="btn" id="catalogButton">Catalogo</button>

								</div>

						</div>

				</section>

            <section class="contact" id="contacto">
						
                        <form>
                                                <h2 class="heading"><span>Consultas</span></h2>
                                            
                        
                                                        <div class="input-box">
                        
                                                                <div class="input-field">
                        
                                                                <input type="text" name= "nombrecom"class="form-control" id="nombrecom" placeholder="Nombre Completo" required/>												
                                                                <span class="focus"></span>
                        
                                                                </div>
                        
                                                                <div class="input-field">
                        
                                                                        <input type="email" name="correo1" class="form-control" id="correo1" placeholder="Dirrecion de Correo" required>
                                                                        <span class="focus"></span>
                        
                                                                </div>
                        
                                                        </div>
                        
                                                        <div class="input-box">
                        
                                                                <div class="input-field">
                        
                                                                        <input type="number"  name="numtel" class="form-control" id="numtel" placeholder="Numero de Telefono" required>
                                                                        <span class="focus"></span>
                        
                                                                </div>
                        
                                                                <div class="input-field">
                        
                                                                <input type="text" name= "asuntoco"class="form-control" id="asuntoco" placeholder="Asunto del Correo" required/>
                                                                        <span class="focus"></span> 
                        
                                                                </div>
                        
                                                        </div>
                        
                                                        <div class="textarea-field">
                        
                                                                <textarea name="mensaje1" id="mensaje1" cols="30" rows="10" placeholder="Su Mensaje" required></textarea>
                                                                <span class="focus"></span>
                        
                                                        </div>
                        
                                                        <div class="btn-box btns">
                        
                                                                <button type="submit" class="btn" id="contactButton">Enviar</button>
                        
                                                        </div>
                        
                        </form>
                        
                                        </section>
                        
            



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
         
         
    <script src="assets/js/script-marquee.js"></script>
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






    </body>
</html>