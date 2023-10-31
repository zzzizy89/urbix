<!-- 
                                                         
,--. ,--.                ,--------.            ,--.      
|  .'   / ,---. ,--. ,--.'--.  .--',---.  ,---.|  ,---.  
|  .   ' | .-. : \  '  /    |  |  | .-. :| .--'|  .-.  | 
|  |\   \\   --.  \   '     |  |  \   --.\ `--.|  | |  | 
`--' '--' `----'.-'  /      `--'   `----' `---'`--' `--' 
                `---'                                     -->

                <!DOCTYPE html>
<html lang="e">
		<head>
				<meta charset="UTF-8">
				<meta http-equiv="X-UA-Compatible" contable="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale:1.0">
				<link rel="stylesheet" href="<?php echo base_url('assets/css/account/login.css')?>"
				<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/EasePack.min.js"></script>
				<title>Login</title>

		</head>
		<style>
			.marquee {
    overflow: hidden;
 
    box-sizing: border-box;
    border: 1px solid #ccc;
    height: 50px; /* Ajusta la altura según sea necesario */
	color:#fff;
}

.marquee__inner {
    width: 100%;
    position: absolute;
    white-space: nowrap;
    display: flex;
    align-items: center;
    animation: marquee 15s linear infinite; /* Ajusta la duración según sea necesario */
}

@keyframes marquee {
    0% {
        transform: translateX(-100%);
    }
    100% {
        transform: translateX(50%);
    }
}

		</style>
		<body>


		
		<div class="alert">
    <?php if (session()->has('success')) : ?>
        <div class="alert-success"><?= session('success') ?></div>
    <?php endif ?>
    <?php if (session()->has('error')) : ?>
        <div class="alert-error"><?= session('error') ?></div>
    <?php endif ?>
</div>

				<div class="box">
						<form method="post" action="<?= base_url(" login ");?>" class="form">
						<div class="close-button" id="close-button"><a href="<?=base_url('inicio')?> ">X</a></div>
								<h2>Iniciar Sesión</h2>
								<div class="form-inputs">
										<div class="form-label">
												<input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
										</div>
										<div class="form-label">
												<input name="password" type="password" class="form-control" id="password" placeholder="password">
										</div>
								</div>

								<div class="links">
										<a href="#" target="_blank">Olvidaste tu contraseña?</a>
										<a href="<?= base_url(" register ");?>">Registrarse</a>
								</div>
								<input type="submit" value="Login">


						</form>
				</div>
				<div class="marquee">
			<div class="marquee__inner" id="marqueeInner">
				<!-- Coloca aquí el texto que deseas que se desplace -->
				<span>Iniciar Sesión - Bienvenido a nuestro sitio web - Ingrese sus credenciales para continuar</span>
			</div>
		</div>

		<script>
			// Este es un script de ejemplo para animar la marquesina
// Puedes personalizarlo según tus necesidades
// Este script puede ser colocado en la sección <script> al final de tu archivo HTML

const marqueeInner = document.getElementById('marqueeInner');

// Ajusta la velocidad de desplazamiento de la marquesina
const scrollSpeed = 2; // Ajusta este valor para cambiar la velocidad de desplazamiento

let distance = 0;
let marqueeId;

function startMarquee() {
    marqueeId = requestAnimationFrame(startMarquee);
    distance -= scrollSpeed;
    marqueeInner.style.transform = `translateX(${distance}px)`;
}

startMarquee();

		</script>

		</body>
</html>
