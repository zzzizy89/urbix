<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/intro.css">
    
    <title>Intro</title>
</head>
<body>
  
  <div class="loader">
        <div class="img">
              <img src="img/intro/1.jpg" alt="">
        </div>
        <div class="img">
              <img src="img/intro/2.jpg" alt="">
        </div>
        <div class="img">
              <img src="img/intro/3.png" alt="">
        </div>
        <div class="img">
              <img src="img/intro/4.jpg" alt="">
        </div>
        <div class="img">
              <img src="img/intro/5.png" alt="">
        </div>
        <div class="img">
              <img src="img/intro/6.png" alt="">
        </div>
        <div class="img">
              <img src="img/intro/7.jpg" alt="">
        </div>
  </div>
  
  <div class="overlay">
        <div class="col">
              <h2><div>One enterprise</div></h2>
              <h2><div>Top Global</div></h2>
              <h2><div>We won't let you down</div></h2>
        </div>
        <div class="col">
              <h2><div><span>click</span> anywhere to continue</div></h2>
        </div>
  </div>
  
  <script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
      <script>
            gsap.from("h2 div", 1.5, {
                  yPercent: 100,
                  ease: "power4.inOut",
                  stagger: {
                        amount: 0.5,
                  },
            });

            gsap.to("h2", 1.5, {
                  clipPath: "polygon(0 0, 100% 0, 100% 100%, 0 100%)",
                  ease: "power4.inOut",
                  stagger: {
                        amount: 0.5,
                  },
            });

            document.addEventListener("DOMContentLoaded", function () {
                        let overlay = document.querySelector(".overlay"); 
                        overlay.addEventListener("click", function () {
                        gsap.to("h2 div", 1.5, {
                              yPercent: -100,
                              ease: "power4.inOut",
                              stagger: {
                                    amount: 0.5,
                              },
                        });
                        gsap.to("h2", 1.5, {
                              clipPath: "polygon(0 85%, 100% 85%, 100% 100%, 0 100%)",
                              ease: "power4.inOut",
                              stagger: {
                                    amount: 0.5,
                              },
                        }, 
                        0
                        );
                        gsap.to(".overlay", 2, {
                              clipPath: "polygon(0% 0%, 100% 0%, 100% 0%, 0% 0%)",
                              ease: "power4.inOut",
                        });
                        gsap.to(".img", 2, {
                              clipPath: "polygon(0 100%, 100% 100%, 100% 0%, 0% 0%)",
                              ease: "power4.inOut",
                              stagger: {
                                    amount: 1.5,
                              },
                        });
                        gsap.to(".loader", 2, {
                              clipPath: "polygon(0% 0%, 100% 0%, 100% 0%, 0% 0%)",
                              ease: "power4.inOut",
                              delay: 2,
                        });
                        setTimeout(function () {
    // Genera la URL absoluta utilizando site_url()
    var absoluteUrl = "<?php echo site_url('inicio'); ?>";
    
    // Redirige a la URL absoluta
    window.location.href = absoluteUrl;
}, 3000);

                  });
            });
      </script>
    
</body>
</html>