<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>intro contact</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/animation/intro2.css')?>">

</head>
<body>
    <div class="header">urbix</div>

    <div class="container">
        <div class="text-wrapper">
            <!-- Agrega la clase "text" a cada elemento de texto -->
            <div class="text text-1">excellence.</div>
            <div class="text text-2">excellence.</div>
            <div class="text text-3">excellence.</div>
            <div class="text text-4">excellence.</div>
            <div class="text text-5">excellence.</div>
            <div class="text text-6">excellence.</div>
            <div class="text text-7">excellence.</div>
            <div class="text text-8">excellence.</div>
            <div class="text text-9">excellence.</div>
            <div class="text text-10">excellence.</div>
            <div class="text text-11">excellence.</div>
        </div>
    </div>

    <script>
        // Obtén el último elemento de texto (text-11)
        const lastTextElement = document.querySelector('.text-11');

        // Función para redirigir después de que la animación termine
        function redirectToAnotherView() {
            // Cambia la URL a la que deseas redirigir al usuario
            var absoluteUrl = "<?php echo site_url('contact'); ?>";
            window.location.href = absoluteUrl;
        }

        // Agrega un evento 'animationend' al último elemento de texto
        lastTextElement.addEventListener('animationend', redirectToAnotherView);
    </script>
</body>
</html>