<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>home</title>

		<link rel="stylesheet" href="<?php echo base_url('assets/css/front-main/prueba.css');?>">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
	</head>
	<body>

		<div class="container">
      			<!-- menu -->
			<div class="header">
				<div class="header-logo">✸</div>
        

				
	
				<div class="menu-open"></div>
				<div class="nav-container">
					<div class="menu-close">close</div>
					<div class="socials">
						<span>facebook</span>
						<span>instagram</span>
					</div>
					<nav class="menu">
						<div class="menu__item">
							<a class="menu__item-link">Home</a>

							<div class="marquee">
								<div class="marquee__inner">
									<span>Home - Home - Home - Home - Home - Home - Home</span>
								</div>
							</div>
						</div>
						<div class="menu__item">
							<a class="menu__item-link">Catalogue</a>

							<div class="marquee">
								<div class="marquee__inner">
									<span>Catalogue - Catalogue - Catalogue - Catalogue - Catalogue - Catalogue
								- Catalogue</span
							>
						</div>
					</div>
				</div>
				<div class="menu__item">
					<a class="menu__item-link">About</a>

					<div class="marquee">
						<div class="marquee__inner">
							<span>About - About - About - About - About - About - About</span>
								</div>
							</div>
						</div>
						<div class="menu__item">
							<a class="menu__item-link">Contact</a>
							<div class="marquee">
								<div class="marquee__inner">
									<span>Contact - Contact - Contact - Contact - Contact - Contact -
								Contact</span
							>
						</div>
					</div>
				</div>
			</nav>
		</div>
     

  
        <div class="header-hamburger">
          <span></span>
		<span></span>
								</div>
							</div>

                 <!-- menu finish -->
<!-- home -->
							<div class="wrapper">
							<div class="main-title">
									<div class="title">dashboard</div>
								</div>
								<div class="divider"></div>
								<div class="hero-image">
									<div class="hero-title">
										<div>3</div>
									
										<div>1</div>
										<div>J</div>
										<div>2</div>
										<div class="arrow-img"><img src="./assets/css/img/iconos/arrow.png" alt="" /></div>
										<div>3</div>
									</div>
									<div class="hero-copy">
										<div class="copy-left">
											<div class="btns">
												<div class="btn">peripheral</div>
												<div class="btn">maintenance</div>
											</div>
											<div class="copy">
                      Our offering goes beyond cables and lights; it's the essence of urban innovation in your hands.
												<br /> In the digital jungle, be the predator with the most advanced peripherals.
											</div>
										</div>
										<div class="copy-right">
											<div class="copy">
                      Sleepless nights.
												<br /> Impressive peripherals.
											</div>
										</div>
									</div>
								</div>
							</div>
              <!-- home finish -->
						</div>

            <!-- script animacion home -->
						<script>
							gsap.from(
							        ".header > div, .main-title > div, .divider,  .hero-title > div, .btns> div, .hero-copy > div",
							        2,
							        {
							          y: "200",
							          opacity: 0,
							          ease: Expo.easeInOut,
							          delay: 1,
							          stagger: 0.08,
							        }
							      );
							
							      gsap.from(".hero-image", 2, 
							      { scale: 0, x: "-50%", ease: "power3.inOut", delay: 3 });
							
							      gsap.from(".arrow-img img", 1, {
							        scale: 0,
							        ease: Elastic.easeOut,
							        delay: 4,
							      });
							
						</script>

            <!-- script para header -->

						<script>
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
											t1.reversed(!t1.reversed());
										});
										$(document).on("click", ".menu-close", function () {
											t1.reversed(!t1.reversed());
										});
							
						</script>
	</body>
</html>