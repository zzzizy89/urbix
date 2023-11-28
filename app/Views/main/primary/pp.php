<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/front-main/pp.css');?>">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
  <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="<?php echo base_url('assets/js/cookies/cookies.js'); ?>"></script>
 </head>
 <body>

<!-- Cursor Body -->

  <div class="cursor"></div>

  <!-- CONTAINER section starts here -->

  <div class="container">

  <!-- NAV section starts here -->

   <nav class="menu">
   <button class="hamburger">
    <div></div>
    <div></div>
    <div></div>
</button>
    <div class="menu-left menu-item">

     <span class="menu-link"><a href="<?=base_url('intro_about')?>">about</a></span>
     <span class="menu-link"><a href="<?=base_url('intro_catalogo')?>">catalogue</a></span>
     <span class="menu-link">	<a href="<?=base_url('intro_contacto')?>">contact</a></span>
    </div>
    <div class="menu-center menu-item">
     <div class="brand-logo"><a href="<?=base_url('inicio')?>" class="active">urbix</a></div>
    </div>
    <div class="menu-right menu-item">
     <?php if (session('user') && session('user')->name): ?>
     <span class="menu-link"><a href="<?= base_url('intro_dashboard') ?>"><?= session('user')->name ?></a></span>
     <?php else: ?>
     <span class="menu-link"><a href="<?= base_url('intro_login') ?>">account</a></span>
     <?php endif; ?>

    </div>
   </nav>

     <!-- NAV section ends here -->

<!-- WRAPPER-IMG section starts here -->

   <div class="wrapper-img">
    <div class="box"></div>
    <div>
     <img class="image" id="heroImage" src="./assets/css/img/gallery/airph.jpg">
    </div>
   </div>

   <!-- WRAPPER-IMG section ends here -->

<!-- HEADER section starts here -->

   <div class="header">
    <h1 class="header-1">front</h1>
    <h1 class="header-2">back</h1>
   </div>

   <!-- HEADER section ends here -->

<!-- HERO-CONTAINER section starts here -->

   <div class="hero-container">
    <div class="sidebar-text">31/07/23</div>
    <div class="change">change?</div>
    <div class="img-nav">
     <div class="prev" id="prevButton">prev</div>
     <div class="next" id="nextButton">next</div>
    </div>
   </div>

   <!-- HERO-CONTAINER section ends here -->

  </div>

  <!-- CONTAINER section ends here -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

  <!-- SCRIPT animaciones GSAP -->
  
  <script>
   var textWrapper = document.querySelector('.header-1');
   						    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
   						
   						    anime.timeline()
   						    .add({
   						        targets: '.header-1 .letter',
   						        translateY: [200,0],
   						        translateZ: 0,
   						        opacity: [0,1],
   						        easing: "easeOutExpo",
   						        duration: 2000,
   						        delay: (el, i) => 800 + 50 * i
   						    });
   						
   						    var textWrapper = document.querySelector('.header-2');
   						    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
   						
   						    anime.timeline()
   						    .add({
   						        targets: '.header-2 .letter',
   						        translateY: [200,0],
   						        translateZ: 0,
   						        opacity: [0,1],
   						        easing: "easeOutExpo",
   						        duration: 2000,
   						        delay: (el, i) => 800 + 50 * i
   						    });
   						
   						    TweenMax.to(".box", 2.4, {
   						    y: "-100%",
   						    ease: Expo.easeInOut,
   						    delay: 1,
   						    });
   						
   						    var tl = new TweenMax.staggerFrom(".menu > div", 2, {
   						        opacity: 0,     
   						        y: 30,
   						        ease: Expo.easeInOut,
   						        delay: 1
   						    }, 0.1);
   						
   						    var tl = new TweenMax.staggerFrom(".hero-container > div", 2, {
   						        opacity: 0,     
   						        y: 30,
   						        ease: Expo.easeInOut,
   						        delay: 1
   						    }, 0.1);
   						
   			
   
  </script>

  <!-- SCRIPT preview, next Images -->

  <script>
   document.addEventListener("DOMContentLoaded", function () {
   						        var prevButton = document.getElementById("prevButton");
   						        var nextButton = document.getElementById("nextButton");
   						        var heroImage = document.getElementById("heroImage");
   						
   						        var imageUrls = [
   						            "./assets/css/img/gallery/airph.jpg",
   						            "./assets/css/img/gallery/key.jpg",
   						            "./assets/css/img/gallery/mouse.jpg",
   						            "./assets/css/img/gallery/parlante.jpg",
   						           
   						        ];
   						
   						        var currentIndex = 0;
   						
   						        function changeImage(index) {
   						            gsap.to(heroImage, {y: 100, opacity: 0, duration: 1, onComplete: function() {
   						                heroImage.src = imageUrls[index];
   						                gsap.fromTo(heroImage, {y: -100, opacity: 0}, {y: 0, opacity: 1, duration: 1});
   						            }});
   						        }
   						
   						        prevButton.addEventListener("click", function () {
   						            currentIndex = (currentIndex - 1 + imageUrls.length) % imageUrls.length;
   						            changeImage(currentIndex);
   						        });
   						
   						        nextButton.addEventListener("click", function () {
   						            currentIndex = (currentIndex + 1) % imageUrls.length;
   						            changeImage(currentIndex);
   						        });
   						    });
   						
   			
   
  </script>

  <!-- SCRIPT cursor -->

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
document.querySelector(".hamburger").addEventListener("click", function() {
    var menu = document.querySelector(".menu-left");
    var menuCenter = document.querySelector(".menu-center");
    if (menu.style.display === "none") {
        menu.style.display = "flex";
        menu.style.position = "fixed";
        menu.style.top = "0";
        menu.style.left = "0";
        menu.style.height = "10vh"; // Cubre toda la altura de la pantalla
        menu.style.width = "10vw"; // Cubre la mitad de la anchura de la pantalla

    } else {
        menu.style.display = "none";
        menu.style.position = "";
        menu.style.top = "";
        menu.style.left = "";
        menu.style.height = "";
        menu.style.width = "";
        menu.style.backgroundColor = "";
        menuCenter.style.position = "";
        menuCenter.style.transform = "";
    }
});
  </script>
 </body>
</html>
