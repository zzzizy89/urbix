<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "css/inicio.css">
    
    <script>
        type="module"
        src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    </script>
    <script>
        nomodule
        src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
  
    <style>
        /* Agrega tus estilos personalizados aquí */
        .menu-container {
            position: relative;
        }

        .menu-btn {
            cursor: pointer;
        }

        .pattern {
            position: absolute;
            top: 0;
            right: 0;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .menu-container:hover .pattern {
            opacity: 1;
        }

        .expand-btn {
            display: none;
            position: absolute;
            top: 0;
            right: 0;
            background-color: black;
            color: white;
            padding: 8px 12px;
            cursor: pointer;
            z-index: 1;
        }

        .menu-container:hover .expand-btn {
            display: block;
        }

        .menu-content {
            position: absolute;
            top: 100%;
            right: 0;
            background-color: black;
            color: white;
            width: 150px;
            border: 1px solid white;
            display: none;
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .menu-container:hover .menu-content {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .menu-item {
            padding: 10px;
            border-bottom: 1px solid white;
            text-align: right;
        }
    </style>
    <title>Landing Page-KeyTech</title>
</head>
<body>

<div class="container">
    <nav>
        <div class="nav-1">
            <p class="logo">WA</p>
            <p class="title">history <br />Keyboard</p>
        </div>
        <div class="nav-2">
           <p class="menu-btn">menu</p>
           <a href="#home" class="active">Inicio</a>
								<a href="#acerca">Acerca</a>
								<a href="#catalogo">Catalogo</a>
								<a href="#contacto">Contacto</a>
								<a href="<?=base_url('login')?>">Cuenta</a>
           <p class="pattern">x</p>
        </div>
        <div class="nav-3">
            <p class="intro">intro</p>
            <p class="pattern-2">xx</p>
        </div>
    </nav>

    <div class="content-wrapper">
        <div class="col-1 col">
            <div class="header">
                <h1>KeyTech <br>industries.</h1>
                <div class="numbers">
                    <br><p>05 / 1904</p>
                    <div class="hr"></div>
                    <p>01 / 1989</p>
                </div>
                <div class="hero-img">
                    <img src="./assets/beige.png" alt="">
                </div>
                <div class="hero-img-info">
                    <p><span>Foundation:</span> 2015</p>
                    <p><span>birthplace: </span>Argentina</p>
                    <p><span>Owners:</span> Tiago C. - Ezequiel M.</p>
                </div>
                <div class="cta">
                    <div class="cta-btn">
                        <h3>next Product <ion-icon name="arrow-forward-sharp"></ion-icon></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2 col">
            <div class="p-info">
                <p>1929 / 1954</p>
                <p>110x150.7cm</p>
            </div>
            <div class="p-img">
                <div class="p-img-wrap">
                    <img src="./assets/grey.png" alt="">
                </div>
                <div class="p-img-border"></div>
            </div>
            <div class="img">
                <div class="img-data">
                    <div class="img-name">
                        <p>the persistence <br />of memory</p>
                    </div>
                    <div class="img-info">
                        <p>date: 2018</p>
                        <p>style: minimalist</p>
                        <p>genre: symbolic painting</p>
                        <p>media: oil, canvas</p>
                    </div>
                </div>
                <div class="hr">
                    <div class="price">
                        <p>price</p>
                        <p id="amount">18.650</p>
                    </div>
                </div>
                <div class="carousel">
                    <div class="arrow">
                        <ion-icon name="chevron-back-sharp"></ion-icon>
                    </div>
                    <p>168</p>
                    <div class="arrow">
                    <ion-icon name="chevron-forward-sharp"></ion-icon>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="marquee">
        <span>
            &nbsp; discuss your ideas &nbsp; / &nbsp; unexpected time &nbsp; /
            &nbsp; spatial experiencies &nbsp; / &nbsp; best specialists &nbsp; /
            &nbsp; impulse &nbsp; / &nbsp;  independent online store &nbsp; / &nbsp; 
            you can't download the experience &nbsp;   
        </span>
    </div>
   

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const nav1 = document.querySelector(".nav-1");
        const nav2 = document.querySelector(".nav-2");
        const nav3 = document.querySelector(".nav-3");
        const col1 = document.querySelector(".col-1");
        const col2 = document.querySelector(".col-2");

        gsap.from([nav1, nav2, nav3, col1, col2], {
            scale: 0,
            duration: 1.5,
            ease: "power2.out",
            stagger: 0.2
        });
    });
</script>

    
</body>
</html>