<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Contact</title>

		<!-- Incluye los archivos CSS de Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<!-- Agrega tu archivo de estilos personalizado -->
		<link rel="stylesheet" href="<?php echo base_url(" assets/css/front-main/contact.css ") ?>">
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="<?php echo base_url('assets/js/cookies/cookies.js'); ?>"></script>
	</head>
	<body>
		<div class="cursor"></div>
		<div class="alert">
			<?php if (session()->has('success')) : ?>
			<div class="alert-success">
				<?= session('success') ?>
			</div>
			<?php endif ?>
			<?php if (session()->has('error')) : ?>
			<div class="alert-error">
				<?= session('error') ?>
			</div>
			<?php endif ?>
		</div>


		<div class="container">

			<header>
				<div class="header-left">

					<nav>
						<ul>
							<li>
								<a href="<?=base_url('intro_inicio')?>">Home</a>
							</li>
							<li>
								<a href="<?=base_url('intro_about')?>">about</a>
							</li>
							<li>
								<a href="<?=base_url('intro_catalogo')?>">catalogue</a>
							</li>
							<li>
								<a href="<?=base_url('contact')?>" class="active">contact</a>
							</li>


							<?php if (session('user') && session('user')->name): ?>
							<li><a href="<?= base_url('intro_dashboard') ?>"><?= session('user')->name ?></a></li>
							<?php else: ?>
							<li><a href="<?= base_url('intro_login') ?>">account</a></li>
							<?php endif; ?>



						</ul>

					</nav>

				</div>
				<div class="header-right">
					<div class="hamburger">
						<div></div>
						<div></div>
						<div></div>
					</div>
				</div>
			</header>
		</div>
		<section class="contact" id="contacto">
			<form id="form_enviar_email" method="post" action="<?php echo base_url(" enviar__email ") ?>">

				<h2 class="heading"><span>queries</span></h2>


				<div class="input-box">

					<div class="input-field">

						<input type="text" name="nombrecom" class="form-control" id="nombrecom" placeholder="full name" required/>
						<span class="focus"></span>

					</div>

					<div class="input-field">
						<?php if (session('user') && session('user')->email): ?>
						<input class="form-control" required readonly value="<?= session('user')->email ?>">
						<span class="focus"></span>
						<?php else: ?>
						<input type="email" name="correo1" class="form-control" id="correo1" placeholder="email" required>
						<span class="focus"></span>
						<?php endif; ?>
					</div>

				</div>

				<div class="input-box">

					<div class="input-field">

						<input type="number" name="numtel" class="form-control" id="numtel" placeholder="phone number" required>
						<span class="focus"></span>

					</div>

					<div class="input-field">

						<input type="text" name="asuntoco" class="form-control" id="asuntoco" placeholder="subject" required/>
						<span class="focus"></span>

					</div>

				</div>

				<div class="textarea-field">

					<textarea name="mensaje1" id="mensaje1" cols="30" rows="10" placeholder="your message" required></textarea>
					<span class="focus"></span>

				</div>

				<div class="btn-box btns">

					<button type="submit" class="btn" id="contactButton">send</button>

				</div>

			</form>

	</body>
	<script>
		document.getElementById('form_enviar_email').addEventListener('submit', function (event) {
		        // Verificar si el usuario está autenticado antes de enviar el formulario
		        if (!<?php echo json_encode(session('user')) ?>) {
		            alert('Necesitas estar logeado para mandar una consulta');
		            event.preventDefault(); // Evitar que el formulario se envíe
		        }
		    });
		
	</script>


	</section>

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

</html>