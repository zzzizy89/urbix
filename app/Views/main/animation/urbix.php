<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <link rel="stylesheet" href="assets/css/urbix.css">

    <title>everything you are looking for</title>
    <link rel="website icon" type="png" href="<?php echo base_url('assets/img/primary/urbix.png');?>"> 
</head>
<body>
    
<div class="intro">
  <div class="company-name">Urbix</div>
</div>
<script>
 const tl = gsap.timeline({
    onComplete: function() {
      redirectToAnotherView();
    }
  });

  tl.to(".intro", { duration: 2, opacity: 1, delay: 1 })
    .to(".company-name", { duration: 1 , ease: "power2.out" })
    .to(".intro", { duration: 1, opacity: 0, delay: 1 });

  function redirectToAnotherView() {
    // Cambia la URL a la que deseas redirigir al usuario
    var absoluteUrl = "<?php echo site_url('inicio'); ?>";
    window.location.href = absoluteUrl;
  }
</script>
</body>
</html>