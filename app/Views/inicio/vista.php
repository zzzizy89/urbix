<!-- 
                                                         
,--. ,--.                ,--------.            ,--.      
|  .'   / ,---. ,--. ,--.'--.  .--',---.  ,---.|  ,---.  
|  .   ' | .-. : \  '  /    |  |  | .-. :| .--'|  .-.  | 
|  |\   \\   --.  \   '     |  |  \   --.\ `--.|  | |  | 
`--' '--' `----'.-'  /      `--'   `----' `---'`--' `--' 
                `---'                                     -->

<!DOCTYPE html>
<html lang="en">

		<head>

				<meta charset="UTF-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=devide-width,initial-scale=1.0">
				<title>KeyTech</title>
				<link rel="stylesheet" href="css/style.css">
				<link rel="stylesheet" href="css/about.css">
				<link rel="stylesheet" href="../css/style.css">
				<link rel="stylesheet" href="../css/about.css">
				<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

		</head>

		<body>


				<!-- Navbar section start here -->

				<header class="header">
						<a href="#" class="logo">KeyTech</a>
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

				<!-- Navbar section ends here -->

				<!-- Inicio section start here -->

				<section class="home show-animate" id="home">

						<div class="home-content">

								<h1>Bienvenido a <span>KeyTech 👋</span></h1>

								<div class="text-animate">

										<h3>!Las Mejores Marcas!</h3>

								</div>

						</div>


						<div class="home-sci">

								<a href="#"><i class='bx bxl-github'></i></a>
								<a href="#"><i class='bx bxl-discord-alt' ></i></a>
								<a href="#"><i class='bx bxl-linkedin-square' ></i></i></a>

						</div>

				</section>

				<!-- Inicio section ends here -->

				<!-- About section start here -->

				<section class="about" id="acerca">

						<h2 class="heading">Sobre <span>Nosotros</span></h2>


						<div class="wrap animate pop">
		<div class="overlay">
			<div class="overlay-content animate slide-left delay-2">
				<h1 class="animate slide-left pop delay-4">KeyTech</h1>
				
			</div>
			<div class="image-content animate slide delay-5"></div>
					<div class="dots animate">
						<div class="dot animate slide-up delay-6"></div>
						<div class="dot animate slide-up delay-7"></div>
						<div class="dot animate slide-up delay-8"></div>
					</div>
		</div>
			<div class="text">
				<p><img class="inset" src="img/productos/rojo.png" alt="Keytech" />En <span>KeyTech</span>, no solo vendemos productos, creamos <span>experiencias</span>. 
				Nuestro compromiso con la <span>calidad</span> y la <span>satisfacción</span> del cliente nos ha permitido ganar la <span>confianza</span> y <span>lealtad</span> de innumerables entusiastas de la tecnología y gamers <span>apasionados</span>. 
				Ofrecemos una amplia gama de teclados, desde los mecánicos de respuesta táctil hasta los suaves y silenciosos de membrana, garantizando que cada usuario encuentre la opción perfecta para su <span>estilo</span> y <span>preferencias</span>.
				Lo que nos <span>distingue</span> es nuestra dedicación implacable a la <span>excelencia</span>. Trabajamos incansablemente para mantenernos a la vanguardia de las últimas <span>tendencias</span> y avances <span>tecnológicos</span> en el mundo de los teclados. 
				Nuestro <span>compromiso</span> con la <span>innovación</span> y la <span>calidad</span> nos ha permitido ganar la posición privilegiada de ser el <span>número</span> uno en el mercado.
				Ya sea que busques mejorar tu experiencia de juego, optimizar tu flujo de trabajo o simplemente desees un teclado que se adapte a tu estilo, en KeyTech encontrarás soluciones que superarán tus expectativas. 
				<span>Únete a nosotros</span> en nuestra misión de definir el futuro de los teclados y descubre por qué somos la elección preferida de quienes buscan lo mejor.

<span>KeyTech: donde la tecnología y la comodidad se encuentran para ofrecerte una experiencia de teclado excepcional.</span></p>
			</div>
	</div>



				</section>

				<!-- About section ends here -->

				<!-- Catalogo section start here -->

				<section class="catalogo" id="catalogo">

						<h2 class="" heading>Nuestro <span>Catalogo</span></h2>

						<div class="grid-container">

								<div class="product">

										<img src="../img/productos/blue.png" alt="Teclado 1">
										

								</div>

								<div class="product">

										<img src="../img/productos/neg.png" alt="Teclado 2">

								</div>

								<div class="product">

										<img src="../img/productos/yellow.png" alt="Teclado 3">

								</div>
								<div class="product">

										<img src="../img/productos/rosa.png" alt="Teclado 4">

								</div>

								<div class="product">

										<img src="../img/productos/negro.png" alt="Teclado 5">

								</div>

								<div class="product">

										<img src="../img/productos/gris.png" alt="Teclado 6">

								</div>


								<div class="btn-box btns">

										<button type="submit" class="btn" id="catalogButton">Catalogo</button>

								</div>

						</div>

				</section>

				<!-- Catalogo section ends here -->

				<!-- Contact section start here -->

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

				

				<!-- Contact section ends here -->

				<!-- Footer section start here -->

				<footer class="footer">

						<div class="footer-text">

								<p>Copyright &copy; 2023 by KeyTech | All rights Reserved.</p>

						</div>

						<div class="footer-iconTop">

								<a href="#"><i class='bx bx-up-arrow-alt'></i></a>

						</div>

				</footer>

				<!-- Footer section ends here -->

				<!-- Scripts section start here -->

				<script src="js/script.js"></script>

				<script>
						document.getElementById('catalogButton').addEventListener('click', function() {
						        alert('Se necesita tener una cuenta para proceder.');
						        
						    });
						
				</script>

				<script>
						document.getElementById('contactButton').addEventListener('click', function() {
						        alert('Se necesita tener una cuenta para proceder.');
						       
						    });
						
				</script>

				<script>
					
				</script>
				

				<!-- Scripts section ends here -->
		</body>

</html>
