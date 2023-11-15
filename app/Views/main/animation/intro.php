<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KeyTech</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/animation/intro.css')?>">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="js/pace.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-bez@1.0.11/src/jquery.bez.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>
</head>
<body>
        <h1 class="title">KEYTECH</h1>

        <div id="preloader">
            <div class="p">LOADING</div>
        </div>

        <script>

        paceOptions = {
        ajax: true,
        document: true,
        eventLag: false
        };

        Pace.on('done', function() {
        $('.p').delay(500).animate({top: '30%', opacity: '0'}, 3000, $.bez([0.19,1,0.22,1]));


        $('#preloader').delay(1500).animate({top: '-100%'}, 2000, $.bez([0.19,1,0.22,1]));

        TweenMax.from(".title", 2, {
             delay: 1.8,
                  y: 10,
                  opacity: 0,
                  ease: Expo.easeInOut
            })
            setTimeout(function () {
    // Genera la URL absoluta utilizando site_url()
    var absoluteUrl = "<?php echo site_url('inicio'); ?>";
    
    // Redirige a la URL absoluta
    window.location.href = absoluteUrl;
}, 3000);
       });

      </script>

</body>
</html>
