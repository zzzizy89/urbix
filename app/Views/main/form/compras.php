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
		<div class="cursor"></div>
		<header>
			<h1>Realizar compra</h1>
		</header>
		<div class="user-stats">
			<?php
    foreach ($carritos as $carrito) {
        $nombre[] = $carrito->nombre;
        $cantidad[] = $carrito->cantidad;
         // Calcular el subtotal para cada producto
         $subtotal = $carrito->cantidad * $carrito->precio;
         $subtotales[] = '$' . number_format($subtotal, 2);
        $preciou[] = '$' . number_format($carrito->precio, 2); 

    }
    ?>
				<p><strong>Productos:</strong>
					<?= implode(', ', $nombre); ?>
				</p>
				<p><strong>cantidad:</strong>
					<?= implode(', ', $cantidad); ?>
				</p>
				<p><strong>precio:</strong>
					<?= implode(', ', $preciou); ?>
				</p>
				<p><strong>subtotal:</strong>
					<?= implode(', ', $subtotales); ?>
				</p>
				<p><strong>Total de la compra:</strong> $
					<?= $totalC; ?>
				</p>
		</div>
		<section class="contenedor">
			<!-- Formulario para la información de envío y compra PayPal -->
			<?php if ($userData) : ?>
				<label for="selectAddress">Select Address:</label>
				<select id="selectAddress">
					<?php
					$uniqueAddresses = [];

					foreach ($userData as $address) {
						// Crear una clave única basada en código postal, país y barrio
						$key = $address['codigo_postal'] . '-' . $address['pais'] . '-' . $address['barrio'];

						// Verificar si la clave ya existe en el array temporal
						if (!isset($uniqueAddresses[$key])) {
							// Agregar la dirección al array temporal y generar la opción del select
							$uniqueAddresses[$key] = $address;
							echo '<option value="' . $address['id_direccion_casa'] . '">' . $address['barrio'] . '</option>';
						}
					}
					?>
				</select>
				<button id="autoFillButton">Auto Fill with Selected Address</button>
			<?php endif; ?>
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
		                var totalC = "<?= $totalC ?>";
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
		
		                var urlDinamica = "<?= base_url('realizar_compra') ?>/" + encodeURIComponent(pais) + "/" + encodeURIComponent(provincia) + "/" + encodeURIComponent(ciudad)+ "/" + encodeURIComponent(codigo_postal) + "/" + encodeURIComponent(barrio) + "/" + encodeURIComponent(calle) + "/" + encodeURIComponent(numero) + "/" + encodeURIComponent(descripcion_casa);
		
		                // Redirige al usuario a la URL basada en los valores del formulario
		                window.location.href = urlDinamica;
		            });
		        }
		    }).render('#paypal-button-conteiner');
		
	</script>
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






<script>
    // Agrega este script al final de tu archivo
    $(document).ready(function () {
        $('#autoFillButton').click(function () {
            // Obtiene el ID de la dirección seleccionada
            var selectedAddressId = $('#selectAddress').val();

            // Encuentra la dirección correspondiente en los datos del usuario
            var selectedAddress = <?= json_encode($userData) ?>.find(function (address) {
                return address.id_direccion_casa == selectedAddressId;
            });

            // Llena los campos del formulario con los datos seleccionados
            $('#pais').val(selectedAddress.pais);
            $('#provincia').val(selectedAddress.provincia);
            $('#ciudad').val(selectedAddress.ciudad);
            $('#codigo_postal').val(selectedAddress.codigo_postal);
            $('#barrio').val(selectedAddress.barrio);
            $('#calle').val(selectedAddress.calle);
            $('#numero').val(selectedAddress.numero);
            $('#descripcion_casa').val(selectedAddress.descripcion_casa);
        });
    });
</script>

</html>