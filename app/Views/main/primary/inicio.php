<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/front-main/inicio.css');?>">
</head>
<body>

<!-- navbar section starts here -->
    <div class="container-navbar">
    <header>
        <div class="header-left">
            <div class="logo">
                <img src="./logo.png" alt="">
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="#" class="active">Home</a>
                    </li>
                    <li>
                        <a href="#">about</a>
                    </li>
                    <li>
                        <a href="#">catalogue</a>
                    </li>
                    <li>
                        <a href="#">contact</a>
                    </li>

                    <li>
                        <a href="#">account</a>
                    </li>
                 
                </ul>
             
            </nav>
        </div>
        <div class="header-right">
            <div class="hamburger">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </header>
    </div>
<!-- navbar section ends here -->



<!-- script for navbar -->
    <script>
        hamburger = document.querySelector(".hamburger");
        nav = document.querySelector("nav");
        hamburger.onclick = function() {
            nav.classList.toggle("active");
        }
    </script>
</body>
</html>