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
            <form method="post" action="<?php echo base_url('realizar_compra'); ?>">

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
                <textarea id="descripcion_casa" name="descripcion_casa" required></textarea>

                <button type="submit" class="boton-comprar">Confirmar Compra</button>
                <a href="<?= base_url('cancelar/compra')?>" type="button" class="boton-cancelar">Cancelar Compra</a>
            </form>
        </div>
    </section>
</body>

</html>
