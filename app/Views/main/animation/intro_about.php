<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>intro about</title>
		<link rel="website icon" type="png" href="<?php echo base_url('assets/css/img/iconos/logo.png');?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/animation/intro2.css')?>">
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="<?php echo base_url('assets/js/cookies/cookies.js'); ?>"></script>

	</head>
	<body>
		<!-- sector header starts here -->
		<div class="header">urbix</div>
		<!-- sector header ends here -->

		<!-- sector container starts here -->
		<div class="container">
			<!-- sector tex-wrapper starts here -->
			<div class="text-wrapper">
				<div class="text text-1">perfection.</div>
				<div class="text text-2">perfection.</div>
				<div class="text text-3">perfection.</div>
				<div class="text text-4">perfection.</div>
				<div class="text text-5">perfection.</div>
				<div class="text text-6">perfection.</div>
				<div class="text text-7">perfection.</div>
				<div class="text text-8">perfection.</div>
				<div class="text text-9">perfection.</div>
				<div class="text text-10">perfection.</div>
				<div class="text text-11">perfection.</div>
			</div>
			<!-- sector text-wrapper ends here -->
		</div>
		<!-- sector container ends here -->





		<!-- script para recorrer los textos -->

		<script>
			// Obtiene el ultimo elemento de texto (text-11)
						        const lastTextElement = document.querySelector('.text-11');
						
						        // Función para redirigir después de que la animación termine
						        function redirectToAnotherView() {
						            // url donde lo redirige
						            var absoluteUrl = "<?php echo site_url('about'); ?>";
						            window.location.href = absoluteUrl;
						        }
						
						        // Agrega un evento 'animationend' al último elemento de texto
						        lastTextElement.addEventListener('animationend', redirectToAnotherView);
						
			
		</script>
	</body>
</html>