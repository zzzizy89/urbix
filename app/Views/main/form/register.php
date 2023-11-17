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
				<link rel="stylesheet" href="<?php echo base_url('assets/css/account/login.css')?>">

		</head>
		<body>


				<div class="box">
						<form method="post" action="<?= base_url(" register ");?>" class="form">
						<div class="close-button" id="close-button"><a href="<?=base_url('inicio')?> ">X</a></div>
								<h2>Registrarse</h2>
								<div class="form-inputs">
										<div class="form-label">
												<input name="name" required type="text" class="form-control" id="name" placeholder="Your name">
										</div>
										<div class="form-label">
												<input name="email" required type="email" class="form-control" id="email" placeholder="name@example.com">
										</div>

										<div class="form-label">
										<input name="password" required pattern=".{8,}" type="password" class="form-control" id="password" placeholder="password">
										</div>

								</div>

								<div class="links">
										<a href="<?= base_url(" login ");?>">¿Ya tienes una cuenta?</a>
								</div>
								<input type="submit" value="Register">


						</form>
				</div>




		</body>
</html>
