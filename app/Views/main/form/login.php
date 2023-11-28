<!DOCTYPE html>

<html lang="e">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" contable="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale:1.0">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/account/login.css')?>">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/EasePack.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="<?php echo base_url('assets/js/cookies/cookies.js'); ?>"></script>
		<title>Login</title>

	</head>

	<body>



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



		<div class="box">

			<form method="post" action="<?= base_url(" login ");?>" class="form">

				<div class="close-button" id="close-button"><a href="<?=base_url('inicio')?>">←</a></div>

				<h2>log in</h2>
				<div class="form-inputs">

					<div class="form-label">
						<input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
					</div>
					<div class="form-label">
						<input name="password" type="password" class="form-control" id="password" placeholder="password">
					</div>
				</div>

				<div class="links">
					<a href="#" target="_blank">forgot your password?</a>
					<a href="<?= base_url(" register ");?>">sign up</a>
				</div>
				<input type="submit" value="Login">


			</form>
		</div>




	</body>


</html>