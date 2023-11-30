<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
  <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="<?php echo base_url('assets/js/cookies/cookies.js'); ?>"></script>
    <title>about</title>
    <link rel="website icon" type="png" href="<?php echo base_url('assets/css/img/iconos/logo.png');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/front-main/about.css');?>">
  </head>
  <body>

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
     <div class="section1">

      
 
      <div class="section copy">
        <div class="section-wrapper">
          <div class="content">
            <p>
            "We are not just a company; we are what is missing in the market. We specialize in the marketing of unparalleled products. What are you waiting for? Get them in your hands now."
            </p>
          </div>
        </div>
      </div>

    </div>

    <script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.min.js"></script>
    <script src="https://unpkg.com/gsap@3/dist/ScrollTrigger.min.js"></script>
    <script>
      gsap.registerPlugin(ScrollTrigger);

      const locoScroll = new LocomotiveScroll({
        el: document.querySelector(".smooth-scroll"),
        smooth: true,
        lerp: 0.08,
      });

      locoScroll.on("scroll", ScrollTrigger.update);

      ScrollTrigger.scrollerProxy(".smooth-scroll", {
        scrollTop(value) {
          return arguments.length
            ? locoScroll.scrollTo(value, 0, 0)
            : locoScroll.scroll.instance.scroll.y;
        },
        getBoundingClientRect() {
          return {
            top: 0,
            left: 0,
            width: window.innerWidth,
            height: window.innerHeight,
          };
        },
        pinType: document.querySelector(".smooth-scroll").style.transform
          ? "transform"
          : "fixed",
      });

      const vw = (coef) => window.innerWidth * (coef / 100);
      const vh = (coef) => window.innerHeight * (coef / 100);

      const heroScroller = gsap.timeline({
        paused: true,
        scrollTrigger: {
          trigger: ".hero-header.h-1",
          scroller: ".smooth-scroll",
          pin: ".pin-wrapper",
          start: "top 10%",
          scrub: true,
          end: `${vh(100)}`,
        },
      });

      heroScroller
        .to(
          [".hero-header.h-1", ".hero-header.h-3"],
          {
            scale: 2,
            y: vh(150),
            xPercent: -150,
          },
          "heroScroll"
        )
        .to(
          ".hero-header.h-2",
          {
            scale: 2,
            y: vh(150),
            xPercent: 150,
          },
          "heroScroll"
        )
        .to(
          "#heroImage",
          {
            scaleY: 2.5,
          },
          "heroScroll"
        )
        .to(
          "#heroImage .image",
          {
            scaleX: 2.5,
            xPercent: 50,
          },
          "heroScroll"
        );

      ScrollTrigger.addEventListener("refresh", () => locoScroll.update());
      ScrollTrigger.refresh();
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
  </body>
</html>