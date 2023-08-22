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
				<link rel="stylesheet" href="css/login.css">
				<link rel="stylesheet" href="../css/login.css">
				<title>Login</title>

		</head>
		<body>


				<div class="box">
						<form method="post" action="<?= base_url(" login ");?>" class="form">
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




		</body>
</html>
