<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Parallax Text On Scroll</title>
        <link rel="stylesheet" href="assets/css/primary.css">
        <link rel="stylesheet" href="../assets/css/primary.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
        <style>
      #modelViewer {
    width: 500px;
    height: 500px;
    margin-left: 90rem; /* Ajusta el valor según sea necesario para mover el objeto hacia la izquierda */
    position: absolute; /* Esto probablemente debería ser "relative" o "absolute" en lugar de "center" */
}

    </style>

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
<h6>discuss your ideas-unexpected time-spatial experiencies-best specialists-impulse- independent online store-you can't download the experience-discuss your ideas-unexpected time-spatial experiencies-best specialists-impulse- independent online store-you can't download the experience-discuss your ideas-unexpected time-spatial experiencies-best specialists-impulse- independent online store</h6>
<h6>discuss your ideas-unexpected time-spatial experiencies-best specialists-impulse- independent online store-you can't download the experience-discuss your ideas-unexpected time-spatial experiencies-best specialists-impulse- independent online store-you can't download the experience-discuss your ideas-unexpected time-spatial experiencies-best specialists-impulse- independent online store</h6>
</div>


<model-viewer 
id="modelViewer" 
alt="compu" 
src="./assets/model/compu.glb" 
camera-controls 
camera-orbit="65 deg 55 deg 2.5m"
auto-rotate>

</model-viewer>
         </section>
 

					

						

		

                <section  id=""> 
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
<script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.1.1/model-viewer.min.js"></script>
<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
<script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js"></script>





    </body>
</html>