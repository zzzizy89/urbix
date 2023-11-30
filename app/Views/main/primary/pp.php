<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>
  <link rel="website icon" type="png" href="<?php echo base_url('assets/css/img/iconos/logo.png');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/front-main/pp.css');?>">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
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

<div class="container2">
  <div class="menu-open">menu</div>
		<div class="nav-container">
			<div class="menu-close">close</div>
		
			<nav class="menu">
				<div class="menu__item">
					<a class="menu__item-link" href="<?php echo base_url('inicio')?>">Home</a>
				
					<div class="marquee">
						<div class="marquee__inner">
							<span>Home - Home - Home - Home - Home - Home - Home</span>
						</div>
					</div>
				</div>
				<div class="menu__item">
					<a class="menu__item-link" href="<?php echo base_url('intro_about')?>">About</a>

					<div class="marquee">
						<div class="marquee__inner">
							<span
								>About - About - About - About - About - About
								- About</span
							>
						</div>
					</div>
				</div>
				<div class="menu__item">
					<a class="menu__item-link" href="<?php echo base_url('intro_catalogo')?>">Catalogue</a>
			
					<div class="marquee">
						<div class="marquee__inner">
							<span>Catalogue - Catalogue - Catalogue - Catalogue - Catalogue - Catalogue - Catalogue</span>
						</div>
					</div>
				</div>
				<div class="menu__item">
					<a class="menu__item-link" href="<?php echo base_url('intro_contacto')?>">Contact</a>

					<div class="marquee">
						<div class="marquee__inner">
							<span
								>Contact - Contact - Contact - Contact - Contact - Contact -
								Contact</span
							>
						</div>
					</div>
				</div>
				<?php if (session('user') && session('user')->name): ?>
				<div class="menu__item">
					<a class="menu__item-link" href="<?php echo base_url('intro_dashboard')?>"><?= session('user')->name ?></a>

					<div class="marquee">
						<div class="marquee__inner">
							<span><?= session('user')->name ?> - <?= session('user')->name ?> - <?= session('user')->name ?> - <?= session('user')->name ?> - <?= session('user')->name ?> - <?= session('user')->name ?> -
								Account</span>

								</div>
					</div>
								<?php else: ?>
										<div class="menu__item">
										<a class="menu__item-link" href="<?php echo base_url('intro_login')?>">Account</a>
										<div class="marquee">
										<div class="marquee__inner">
										<span>Account - Account - Account - Account - Account - Account -
									Account</span>
									</div>
									</div>
	</div>
									  <?php endif; ?>
						</div>
				
				
			</nav>
		</div>
        </div>
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

  <!-- script para el Nav -->
<script>
		$(document).ready(function() {
    var t1 = new TimelineMax({ paused: true });

    t1.to(".nav-container", 1, {
        left: 0,
        ease: Expo.easeInOut,
    });

    t1.staggerFrom(
        ".menu > div",
        0.8,
        { y: 100, opacity: 0, ease: Expo.easeOut },
        "0.1",
        "-=0.4"
    );

    t1.staggerFrom(
        ".socials",
        0.8,
        { y: 100, opacity: 0, ease: Expo.easeOut },
        "0.4",
        "-=0.6"
    );

    t1.reverse();

    $(document).on("click", ".menu-open", function () {
        // Deshabilitar desplazamiento vertical
        $("body").css("overflow-y", "hidden");

        t1.reversed(!t1.reversed());
    });

    $(document).on("click", ".menu-close", function () {
        // Restablecer desplazamiento vertical
        $("body").css("overflow-y", "auto");

        t1.reversed(!t1.reversed());
    });
});
		</script>
</html>
