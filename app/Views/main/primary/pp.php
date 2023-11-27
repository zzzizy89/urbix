<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page Reveal Animation</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/front-main/pp.css');?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</head>
<body>
  
    <div class="container">
        <!-- nav  -->
        <nav class="menu">
            <div class="menu-left menu-item">
                   
                    <span class="menu-link"><a href="<?=base_url('intro_about')?>">about</a></span>
                    <span class="menu-link"><a href="<?=base_url('intro_catalogo')?>">catalogue</a></span>
                    <span class="menu-link">	<a href="<?=base_url('intro_contacto')?>">contact</a></span>
            </div>
            <div class="menu-center menu-item">
                <div class="brand-logo"><a href="<?=base_url('inicio')?>" class="active">urbix</a></div>
            </div>
            <div class="menu-right menu-item">
            <span class="menu-link"><a href="<?= base_url('intro_login') ?>">account</a></span>
                <div class="search-icon"><ion-icon name="search-sharp"></ion-icon>
                </div>
            </div>
        </nav>

        <!-- hero image  -->
        <div class="wrapper-img">
            <div class="box"></div>
            <div>
              <img class="image" src="./assets/css/img/gallery/airph.jpg">
            </div>
          </div>

        <!-- header  -->
        <div class="header">
            <h1 class="header-1">front</h1>
            <h1 class="header-2">back</h1>
        </div>

        <!-- hero-container  -->
       <div class="hero-container">
            <div class="sidebar-text">003</div>
            <div class="projects">projects</div>
            <div class="img-nav">
                <div class="prev">prev</div>
                <div class="next">next</div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
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
</body>
</html>