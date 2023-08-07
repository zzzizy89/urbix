<!-- 
 _________   _    ____     ______   _____    ______   _____   _________   _______    ____ 
|___   ___| |_|  / __ \   / _____\ /  _  \  /  ____\ /  _  \ /         \ /  ___  \  / __ \ 
    | |      _  / |__| \ / / ___   | | | |  | |      | | | | |  _   _  | | |___| / / |__| \
    | |     | | |  __  | | ||__ \  | | | |  | |      | | | | | | | | | | |  ___ |  |  __  | 
    | |     | | | |  | | | |___| | | |_| |  | |_____ | |_| | | | | | | | | |___| \ | |  | |
    |_|     |_| |_|  |_| |_______| \_____/  \______/ \_____/ |_| |_| |_| |_______/ |_|  |_| -->

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=devide-width,initial-scale=1.0">
	<title>KeyTech</title>
	<link rel="stylesheet" href="css/style.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>



	<header class="header">
		<a href="#" class="logo">KeyTech</a>
		<div class="bx bx-menu" id="menu-icon"></div>
		<nav class="navbar">
			<a href="#home" class="active">Home</a>
			<a href="#about">About</a>
			<a href="#projects">Catalogo</a>
			<a href="#contact">Contact</a>
            <a href="#contact">Users</a>
			<span class="active-nav"></span>
		</nav>
	</header>

	<section class="home show-animate" id="home">
		<div class="home-content">
			<h1>Bienvenido👋, a <span>KeyTech</span></h1>
			<div class="text-animate">
			<h3>!Las Mejores Marcas!</h3>
			</div>
			
		</div>

        <div class="home-img">

        <img src="img/teclado.png" width= 500rem; height= 500rem; alt="kit.png">

        </div>
       

		<div class="home-sci">
			<a href="#"><i class='bx bxl-github'></i></a>
			<a href="#"><i class='bx bxl-discord-alt' ></i></a>
			<a href="#"><i class='bx bxl-linkedin-square' ></i></i></a>
		</div>
	</section>

	<section class="about" id="about">
		<h2 class="heading">About <span>Me</span></h2>
		<div class="about-img">
			<img src="css/img/me.jpg" alt="">
			<span class="circle-spin"></span>
		</div>

		<div class="about-content">
			<h3><span>Fronted Developer!</span></h3>
			<p>Hola 👋!, soy un estudiante apasionado de la programación y la seguridad informática. Me enfoco en el desarrollo web, especialmente en el front-end. Disfruto creando interfaces atractivas y funcionales utilizando HTML, CSS y JavaScript. También me interesa mucho la seguridad informática y me mantengo actualizado en esta área en constante evolución. Mi objetivo es convertirme en un desarrollador web competente y seguro. Estoy emocionado por lo que el futuro me depara en esta industria y sigo aprendiendo y creciendo en el desarrollo web, con enfoque en el front-end.
		    </p>
		</div>

	</section>

	<section class="projects" id="projects">
		<h2 class=""heading>My <span>Projects</span></h2>
		<div class="projects-row">
			<div class="projects-column">
				<h3 class="title">Project</h3>
				<div class="projects-box">
					<div class="projects-content">
						<div class="content">
							<div class="year"><i class='bx bxs-calendar'></i>2021-2022</div>
							<h3>Alta-Baja-Modificable</h3>
							<p>Es un miniproyecto de un login y register en el cual se trata de una tienda de ropa para niños, donde podes comprar y agregarlo en un carrito de compras, tambien por parte del administrador puede cargar un cliente, modificarlo o eliminarlo, entre otras funciones</p>
						</div>
					</div>

					<div class="projects-content">
						<div class="content">
							<div class="year"><i class='bx bxs-calendar'></i>2022-2023</div>
							<h3>Login y register Only CSS</h3>
							<p>Un login y register bastante vistoso para agregar a tu pagina web y darle ese toque que le falta :)</p>
						</div>
					</div>
		
				</div>
			</div>
		</div>
	</section>
	

	<section class="contact" id="contact">
		<h2 class="heading">Contact <span>Me!</span></h2>
		<form action="#">
			<div class="input-box">
				<div class="input-field">
					<input type="text" placeholder="Full Name" required>
					<span class="focus"></span>
				</div>
				<div class="input-field">
					<input type="text" placeholder="Email Adress" required>
					<span class="focus"></span>
				</div>
			</div>

			<div class="input-box">
				<div class="input-field">
					<input type="number" placeholder="Mobile Number" required>
					<span class="focus"></span>
				</div>
				<div class="input-field">
					<input type="text" placeholder="Email Subject" required>
					<span class="focus"></span>
				</div>
			</div>

			<div class="textarea-field">
				<textarea name="" id="" cols="30" rows="10" placeholder="Your Message" required></textarea>
				<span class="focus"></span>
			</div>

			<div class="btn-box btns">
				<button type="submit" class="btn">Submit</button>
			</div>

		</form>
	</section>

	<footer class="footer">
		<div class="footer-text">
		<p>Copyright &copy; 2023 by KeyTech | All rights Reserved.</p>
	</div>
	<div class="footer-iconTop">
		<a href="#"><i class='bx bx-up-arrow-alt'></i></a>
	</footer>







	<script src="js/script.js"></script>


</body>
</html>