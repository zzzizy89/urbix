<?php
// Verifica si hay una sesión activa y si existe la información del usuario
$is_admin = false;  // Por defecto, no es administrador si no hay sesión

if (session()->has('user')) {
    $user = session('user');
    $is_admin = ($user->rol == 1);
}

?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>urbix</title>
		<link rel="website icon" type="png" href="<?php echo base_url('assets/css/img/iconos/logo.png');?>">
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="<?php echo base_url('assets/js/cookies/cookies.js'); ?>"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	</head>
	<body>

		<style>
			body {
			        background: #000000;
			        color: white;   
			    }
			
			    .card {
			        background: #000000;
			        color: white;
			    }
			    .maintenance-message {
			        background-color: #ffd700; /* Amarillo */
			        padding: 10px;
			        text-align: center;
			        font-size: 18px;
			        color: #000000; /* Texto negro en amarillo para mayor contraste */
			    }
			
		</style>

		<div class="maintenance-message">
			<strong>Under maintenance!</strong> We are working to improve the experience. We apologize for the inconvenience..
		</div>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="#">urbix</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="<?=base_url('inicio')?>">Inicio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url('carrito')?>">Catálogo</a>
					</li>
					<?php if ($is_admin): ?>
					<li class="btn-box btns">
						<a class="nav-link" href="<?= base_url('listar') ?>">Listar Periféricos</a>
					</li>

					<li class="btn-box btns">

						<a class="nav-link" href="<?= base_url('gencompras/')?>">Control Compras</a>
					</li>

					<?php endif;?>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('intro_dashboard') ?>">Dashboard</a>
					</li>
				

				</ul>
			</div>
		</nav>

		<div class="container">

			<?php if(session('mensaje')):?>

			<div class="alert alert-danger" role="alert">
				<?php echo session('mensaje') ?>
			</div>

			<?php endif;?>