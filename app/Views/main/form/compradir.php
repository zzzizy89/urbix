<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <title> Realizar Compra</title>
</head>
<body>
    <header>
        <h1>Realizar compra</h1>
    </header>
    <section class="contenedor">

        <!-- Formulario para la información de envío y compra PayPal -->
        <div class="informacion-envio">
            <h2>Información de Envío</h2>
            <form >

                <label for="pais">País:</label>
                <input type="text" id="pais" name="pais" required>


                <label for="provincia">Provincia:</label>
                <input type="text" id="provincia" name="provincia" required>

                <label for="ciudad">Ciudad:</label>
                <input type="text" id="ciudad" name="ciudad" required>

                <label for="barrio">Barrio:</label>
                <input type="text" id="barrio" name="barrio" required>

                <label for="calle">Calle:</label>
                <input type="text" id="calle" name="calle" required>

                <label for="numero">Número:</label>
                <input type="text" id="numero" name="numero" required>

                <label for="descripcion_casa">Descripción de la Casa:</label>
                <textarea id="descripcion_casa" name="descripcion_casa"></textarea>

                <a href="<?= base_url('cancelar/compra')?>" type="button" class="boton-cancelar">Cancelar Compra</a>
           
            </form>
        </div>
    </section>
</body>
<script src="https://www.paypal.com/sdk/js?client-id=AZQBCaHQ4lHq6OI-mMRoxPv8nHioysdo_lnwAWuXxHgD31c5-3Nvw-fs0_WTL_-ghOvt8WeoipePRltE"></script>

<div id="paypal-button-conteiner"></div>
    
<script>
    paypal.Buttons({
        style: {
            shape: 'pill',
            color: 'blue',
            layout: 'vertical',
            label: 'pay',
        },
        createOrder: function(data, actions) {
            var pais = document.getElementById('pais').value;
            var provincia = document.getElementById('provincia').value;
            var ciudad = document.getElementById('ciudad').value;
            var barrio = document.getElementById('barrio').value;
            var calle = document.getElementById('calle').value;
            var numero = document.getElementById('numero').value;
            var descripcion_casa = document.getElementById('descripcion_casa').value;

            if (
                pais === '' ||
                provincia === '' ||
                ciudad === '' ||
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
                var barrio = document.getElementById('barrio').value;
                var calle = document.getElementById('calle').value;
                var numero = document.getElementById('numero').value;
                var descripcion_casa = document.getElementById('descripcion_casa').value;

                var urlDinamica = "<?= base_url('realizar_compra_dir') ?>/" + encodeURIComponent(pais) + "/" + encodeURIComponent(provincia) + "/" + encodeURIComponent(ciudad) + "/" + encodeURIComponent(barrio) + "/" + encodeURIComponent(calle) + "/" + encodeURIComponent(numero) + "/" + encodeURIComponent(descripcion_casa);

                // Redirige al usuario a la URL basada en los valores del formulario
                window.location.href = urlDinamica;
            });
        }
    }).render('#paypal-button-conteiner');
</script>
</html>
