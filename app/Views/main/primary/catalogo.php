<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Slick Slider</title>
      <link rel="stylesheet" href="../assets/css/catalogo.css">
      <link rel="stylesheet" href="assets/css/catalogo.css">

      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Cinzel&display=swap" rel="stylesheet">

      <!-- Slick -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">

      <!-- icons -->
      <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</head>
<body>

      <div class="text-slider-wrapper">
            <div class="text-slider">
                  <div class="text-slide"><h1>A blessing for <br> every skin.</h1></div>
                  <div class="text-slide"><h1>The perfect mix of <br> old & new.</h1></div>
                  <div class="text-slide"><h1>A journey over borders <br> & generations.</h1></div>
                  <div class="text-slide"><h1>Your are the <br> stylist.</h1></div>
                  <div class="text-slide"><h1>To be on the <br> forerfront.</h1></div>
            </div>
      </div>

      <div class="slider-control">
            <div class="prev"><button type="button"><ion-icon name="arrow-back"></ion-icon></button></div>
            <div class="next"><button type="button"><ion-icon name="arrow-forward"></ion-icon></button></div>
      </div>

      <div class="blocks">
            <div class="block-1"></div>
            <div class="block-2"></div>
            <div class="block-3"></div>
      </div>

      <div class="overlay"></div>

      <div class="image-slider">
            <div class="image-slide" id="one" style="background: url(assets/img/primary/women2.jpg) no-repeat 50% 50%; background-size: cover;"></div>
            <div class="image-slide" id="two" style="background: url(assets/img/primary/women3.jpg) no-repeat 50% 50%; background-size: cover;"></div>
            <div class="image-slide" id="three" style="background: url(assets/img/primary/women4.jpg) no-repeat 50% 50%; background-size: cover;"></div>
            <div class="image-slide" id="four" style="background: url(assets/img/primary/women.jpg) no-repeat 50% 50%; background-size: cover;"></div>
            <div class="image-slide" id="five" style="background: url(assets/img/primary/women2.jpg) no-repeat 50% 50%; background-size: cover;"></div>
      </div>
      
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.js"></script>
<script src="assets/js/slick.js"></script>
<script src="../assets/js/slick.js"></script>
<script>

var sickPrimary = {
      autoplay: true,
      autoplaySpeed: 2400,
      slidesToShow: 2,
      slidesToScroll: 1,
      speed: 1800,
      cssEase: 'cubic-bezier(.84, 0, .08, .99)',
      asNavFor: '.text-slider',
      centerMode: true,
      prevArrow: $('.prev'),
      nextArrow: $('.next')
}

var sickSecondary = {
      autoplay: true,
      autoplaySpeed: 2400,
      slidesToShow: 1,
      slidesToScroll: 1,
      speed: 1800,
      cssEase: 'cubic-bezier(.84, 0, .08, .99)',
      asNavFor: '.image-slider',
      prevArrow: $('.prev'),
      nextArrow: $('.next')
}

$('.image-slider').slick(sickPrimary);
$('.text-slider').slick(sickSecondary);

</script>
</body>
</html>