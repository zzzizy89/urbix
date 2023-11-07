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

<section class="about">
<div class="parallax" id="parallax">
            <!-- Agrega imágenes de fondo aquí -->
            <div class="background-image" style="background-image: url('assets/css/img/front-main/teclado.jpg');"></div>
            <div class="background-image" style="background-image: url('assets/css/img/front-main/mouse.jpg');"></div>
            <div class="background-image" style="background-image: url('assets/css/img/front-main/pink.jpg');"></div>
            <div class="background-image" style="background-image: url('assets/css/img/front-main/white.png');"></div>
            <div class="background-image" style="background-image: url('assets/css/img/front-main/mic.jpg');"></div>
            <div class="background-image" style="background-image: url('assets/css/img/front-main/white.png');"></div>
            <div class="background-image" style="background-image: url('assets/css/img/front-main/black.png');"></div>
            <div class="background-image" style="background-image: url('assets/css/img/front-main/black.png');"></div>

            <!-- Agrega más imágenes de fondo si es necesario -->
        </div>
        
</section>





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
setFixedPosition(images[2], 60, 20);
setFixedPosition(images[3], 70, 50);
setFixedPosition(images[4], 10, 10);
setFixedPosition(images[5], 80, 70);
setFixedPosition(images[6], 30, 80);
setFixedPosition(images[7], 50, 10);
setFixedPosition(images[8], 90, 40);

const parallax = document.querySelector(".parallax");

parallax.addEventListener("mousemove", (e) => {
    const { clientX, clientY } = e;

    images.forEach((image, index) => {
        const speed = (index + 1) * 2; // Ajusta la velocidad del paralaje
        const xOffset = (window.innerWidth / 2 - clientX) * speed / 100;
        const yOffset = (window.innerHeight / 2 - clientY) * speed / 100;

        image.style.transform = `translate(${xOffset}px, ${yOffset}px)`;
    });
});



    </script>
</body>
</html>