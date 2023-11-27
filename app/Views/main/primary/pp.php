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

				</div>
		</div>
		</nav>

		<!-- hero image  -->
		<div class="wrapper-img">
			<div class="box"></div>
			<div>
				<img class="image" id="heroImage" src="./assets/css/img/gallery/airph.jpg">
			</div>
		</div>

		<!-- header  -->
		<div class="header">
			<h1 class="header-1">front</h1>
			<h1 class="header-2">back</h1>
		</div>

		<!-- hero-container  -->
		<div class="hero-container">
			<div class="sidebar-text">31/07/23</div>
			<div class="change">change?</div>
			<div class="img-nav">
				<div class="prev" id="prevButton">prev</div>
				<div class="next" id="nextButton">next</div>
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

	</body>
</html>