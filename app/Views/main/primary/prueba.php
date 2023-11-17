<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .home {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100vh;
            background: var(--color-primary);
            position: relative;
            overflow: hidden;
        }

        .matrix-effect {
            font-size: 5vw;
            font-family: "Arial", sans-serif;
            color: var(--color-main);
            white-space: nowrap;
            position: relative;
            overflow: hidden;
            animation: fall 2s linear infinite;
            transform-origin: bottom;
        }

        @keyframes fall {
            0% {
                opacity: 1;
                transform: translateY(0);
            }
            100% {
                opacity: 0;
                transform: translateY(100vh);
            }
        }
    </style>
</head>
<body>

<section class="home">
    <div class="matrix-effect" id="matrixEffect">
        <!-- Contenido generado por JavaScript -->
    </div>

    <script>
        // Función para generar un número aleatorio entre 0 y 9
        function getRandomNumber() {
            return Math.floor(Math.random() * 10);
        }

        // Función para actualizar el contenido del h2 con números aleatorios
        function updateMatrixEffect() {
            var matrixEffect = document.getElementById("matrixEffect");
            var newText = "";

            for (var i = 0; i < 20; i++) {
                newText += getRandomNumber() + " ";
            }

            matrixEffect.textContent = newText;
        }

        // Llama a la función para actualizar el contenido inicial
        updateMatrixEffect();

        // Configura una intervalo para actualizar el contenido cada 2 segundos
        setInterval(updateMatrixEffect, 2000);
    </script>
</section>

</body>
</html>
