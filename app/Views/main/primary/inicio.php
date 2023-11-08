<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/front-main/inicio.css');?>">
  
</head>
<body>

<!-- navbar section starts here -->
    <div class="container">
    <header>
        <div class="header-left">
            
            <nav>
                <ul>
                    <li>
                        <a href="#" class="active">Home</a>
                    </li>
                    <li>
                        <a href="#">about</a>
                    </li>
                    <li>
                        <a href="#">catalogue</a>
                    </li>
                    <li>
                        <a href="#">contact</a>
                    </li>

                    <li>
                        <a href="#">account</a>
                    </li>
                 
                </ul>
             
            </nav>
        </div>
        <div class="header-right">
            <div class="hamburger">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </header>
</div>
   
<!-- navbar section ends here -->

<!-- home section starts here -->

<section class="home">
    <div class="phrase">
        <h2 id="typing-text">what you were looking for</h2>
    </div>
</section>

<!-- home section ends here -->

<!-- about section starts here -->

<section class="about" id="about">

<div class="parallax" id="parallax">
            <!-- Agrega imágenes de fondo aquí -->
            <div class="background-image" style="background-image: url('assets/css/img/gallery/8.jpg'); width: 400px; height:"></div>
            <div class="background-image" style="background-image: url('assets/css/img/gallery/7.jpg'); width: 300px; height: 300px;"></div>
            <div class="background-image" style="background-image: url('assets/css/img/gallery/6.jpg'); width: height:"></div>
            <div class="background-image" style="background-image: url('assets/css/img/gallery/5.jpg'); width:300px; height:500px;"></div>
            <div class="background-image" style="background-image: url('assets/css/img/gallery/4.jpg'); width:300px; height:300px;"></div>
            <div class="background-image" style="background-image: url('assets/css/img/gallery/1.jpg'); width:400px; height: 500px;"></div>
            <div class="background-image" style="background-image: url('assets/css/img/gallery/2.jpg'); width:500px; height:200px;"></div>
            <div class="background-image" style="background-image: url('assets/css/img/gallery/3.jpg'); width: 400px; height: 200px;"></div>

            <!-- Agrega más imágenes de fondo si es necesario -->
        </div>

        <div class="text">
        <h2>something never seen</h2>
    </div>
        
</section>

<button class="fixed-button" onclick="toggleMode()">Cambiar modo</button>









<!-- script for navbar -->
    <script>
        hamburger = document.querySelector(".hamburger");
        nav = document.querySelector("nav");
        hamburger.onclick = function() {
            nav.classList.toggle("active");
        }
    </script>

    <!-- script para el h2 de home -->

    <script>
        const phrases = ["unique", "quality", "essential"];
const textElement = document.getElementById("typing-text");
let phraseIndex = 0;

function changeText() {
    textElement.textContent = phrases[phraseIndex];
    phraseIndex = (phraseIndex + 1) % phrases.length;
}

textElement.addEventListener("animationiteration", changeText);

    </script>

    <!-- script para about images -->
    <script>
const images = document.querySelectorAll(".background-image");

function setFixedPosition(image, x, y) {
    image.style.left = x + "%";
    image.style.top = y + "%";
}

// Establece coordenadas X e Y fijas para cada imagen de fondo
setFixedPosition(images[0], 20, 30);
setFixedPosition(images[1], 40, 60);
setFixedPosition(images[2], 40, 10);
setFixedPosition(images[3], 70, 50);
setFixedPosition(images[4], 10, 10);
setFixedPosition(images[5], 80, 70);
setFixedPosition(images[6], 30, 80);
setFixedPosition(images[7], 90, 10);
setFixedPosition(images[8], 90, 40);
    </script>

<!-- script para boton fijo -->



<script>
let isDarkMode = true;

function toggleMode() {
    const button = document.querySelector('.fixed-button');
    const body = document.querySelector('body');

    if (isDarkMode) {
        body.classList.remove('dark-mode');
        body.classList.add('light-mode');
        button.textContent = 'Modo Oscuro';
        isDarkMode = false;
    } else {
        body.classList.remove('light-mode');
        body.classList.add('dark-mode');
        button.textContent = 'Modo Claro';
        isDarkMode = true;
    }
}


</script>
</body>
</html>