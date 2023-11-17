<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>intro urbix</title>
    <link rel="website icon" type="png" href="<?php echo base_url('assets/img/primary/robot.png');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/animation/intro2.css')?>">
 
</head>
<body>
    <div class="header">urbix</div>

    <div class="container">
        <div class="text-wrapper">
         
            <div class="text text-1">urbix.</div>
            <div class="text text-2">urbix.</div>
            <div class="text text-3">urbix.</div>
            <div class="text text-4">urbix.</div>
            <div class="text text-5">urbix.</div>
            <div class="text text-6">urbix.</div>
            <div class="text text-7">urbix.</div>
            <div class="text text-8">urbix.</div>
            <div class="text text-9">urbix.</div>
            <div class="text text-10">urbix.</div>
            <div class="text text-11">urbix.</div>
        </div>
    </div>

    <script>
  
        const lastTextElement = document.querySelector('.text-11');

     
        function redirectToAnotherView() {
    
            var absoluteUrl = "<?php echo site_url('inicio'); ?>";
            window.location.href = absoluteUrl;
        }

        lastTextElement.addEventListener('animationend', redirectToAnotherView);
    </script>
</body>
</html>
