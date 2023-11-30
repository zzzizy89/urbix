<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/form/compradir.css');?>">
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="<?php echo base_url('assets/js/cookies/cookies.js'); ?>"></script>
		<title>urbix</title>
		<link rel="website icon" type="png" href="<?php echo base_url('assets/css/img/iconos/logo.png');?>">
	</head>
	<body>

		<div class="user-stats">
			<p><strong>product:</strong>
				<?= session('nombre'); ?>
			</p>
			<p><strong>quantity:</strong>
				<?= session('cantidad'); ?>
			</p>
			<p><strong>price:</strong> $
				<?= session('precio'); ?>
			</p>
			<p><strong>Total:</strong> $
				<?= session( 'totalCompra'); ?>
			</p>

		</div>
		<section class="contenedor">
			<!-- Formulario para la información de envío y compra PayPal -->
			<div class="informacion-envio">
				<h2>Shipping Information</h2>
				<form>

					<label for="pais">country:</label>
					<input type="text" id="pais" name="pais" required>


					<label for="provincia">province:</label>
					<input type="text" id="provincia" name="provincia" required>

					<label for="ciudad">city:</label>
					<input type="text" id="ciudad" name="ciudad" required>

					<label for="codigo_postal">postal code:</label>
					<input type="number" id="codigo_postal" name="codigo_postal" required>

					<label for="barrio">neighborhood:</label>
					<input type="text" id="barrio" name="barrio" required>

					<label for="calle">street:</label>
					<input type="text" id="calle" name="calle" required>

					<label for="numero">adress number:</label>
					<input type="number" id="numero" name="numero" required>

					<label for="descripcion_casa">house description:</label>
					<textarea id="descripcion_casa" name="descripcion_casa"></textarea>
					<div id="paypal-container">

						<div id="paypal-button-conteiner"></div>
						<a href="<?= base_url('cancelcompradir')?>" type="button" class="boton-cancelar">cancel purchase</a>
					</div>





				</form>
			</div>
		</section>
	</body>
	<script src="https://www.paypal.com/sdk/js?client-id=AZQBCaHQ4lHq6OI-mMRoxPv8nHioysdo_lnwAWuXxHgD31c5-3Nvw-fs0_WTL_-ghOvt8WeoipePRltE"></script>



	<script>
		paypal.Buttons({
		        style: {
		            shape: 'pill',
		            color: 'blue',
		            layout: 'vertical',
		            label: 'pay',
		           
		        },
		        fundingSource: paypal.FUNDING.PAYPAL,
		        createOrder: function(data, actions) {
		            var pais = document.getElementById('pais').value;
		            var provincia = document.getElementById('provincia').value;
		            var ciudad = document.getElementById('ciudad').value;
		            var codigo_postal = document.getElementById('codigo_postal').value;
		            var barrio = document.getElementById('barrio').value;
		            var calle = document.getElementById('calle').value;
		            var numero = document.getElementById('numero').value;
		            var descripcion_casa = document.getElementById('descripcion_casa').value;
		
		            if (
		                pais === '' ||
		                provincia === '' ||
		                ciudad === '' ||
		                codigo_postal === '' ||
		                barrio === '' ||
		                calle === '' ||
		                numero === '' ||
		                descripcion_casa === ''
		            ) {
		                alert('Completa todos los campos antes de proceder.');
		            } else {
		                // Aquí puedes obtener el valor dinámico de totalC y asignarlo a 'value'
		                var totalC = <?= $totalC ?>;
		                return actions.order.create({
		                    purchase_units: [{
		                        amount: {
		                            value: totalC.toString() // Convierte el valor a cadena
		                        }
		                    }]
		                });
		            }
		        },
		        onCancel: function(data) {
		            alert('Pago cancelado');
		        },
		        onApprove: function(data, actions) {
		            actions.order.capture().then(function(details) {
		                // Construye la URL dinámica con separadores ("/")
		                var pais = document.getElementById('pais').value;
		                var provincia = document.getElementById('provincia').value;
		                var ciudad = document.getElementById('ciudad').value;
		                var codigo_postal = document.getElementById('codigo_postal').value;
		                var barrio = document.getElementById('barrio').value;
		                var calle = document.getElementById('calle').value;
		                var numero = document.getElementById('numero').value;
		                var descripcion_casa = document.getElementById('descripcion_casa').value;
		
		                var urlDinamica = "<?= base_url('realizar_compra_dir') ?>/" + encodeURIComponent(pais) + "/" + encodeURIComponent(provincia) + "/" + encodeURIComponent(ciudad) + "/" + encodeURIComponent(codigo_postal) + "/" + encodeURIComponent(barrio) + "/" + encodeURIComponent(calle) + "/" + encodeURIComponent(numero) + "/" + encodeURIComponent(descripcion_casa);
		
		                // Redirige al usuario a la URL basada en los valores del formulario
		                window.location.href = urlDinamica;
		            });
		        }
		    }).render('#paypal-button-conteiner');
		
	</script>


</html>