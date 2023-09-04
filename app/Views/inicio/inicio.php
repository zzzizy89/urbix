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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">



    <title>Landing Page-KeyTech</title>
</head>
<body>

<div class="container">
    <nav>
        <div class="nav-1">
        <span><a href="#home" class="active"><p class="logo">K.X</p></a></span>
            <p class="title">history <br />Keyboard</p>
        </div>
        <div class="nav-2">
       
           <span><p class="menu-btn">|menu|</p></span>
                            
								<a href="#acerca">Acerca</a>
								<a href="#catalogo">Catalogo</a>
								<a href="#contacto">Contacto</a>
								
           <p class="pattern">x</p>
        </div>
        <div class="nav-3">
            <span><p class="intro">|intro|</p></span>
            <a href="<?=base_url('login')?>">Cuenta</a>
            <p class="pattern-2">xx</p>
        </div>
    </nav>

    <div class="content-wrapper">
        <div class="col-1 col">
            <div class="header">
                <h1>Luiggi</h1>
                <br>
                <div class="numbers">
                    <br><p>05 / 1904</p>
                    <div class="hr"></div>
                    <p>01 / 1989</p>
                </div>
                <div class="hero-img">
                    <img src="https://media.giphy.com/media/UGrpkMXipFWQ06IHIM/giphy.gif" alt="">
                </div>
                <div class="hero-img-info">
                    <p><span>Foundation:</span> 2015</p>
                    <p><span>birthplace: </span>Argentina</p>
                    <p><span>Owners:</span> Tiago C. - Ezequiel M.</p>
                </div>
                <div class="cta">
                    <div class="cta-btn">
                        <h3>next generation <ion-icon name="arrow-forward-sharp"></ion-icon></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2 col">
            <div class="p-info">
                <p>1929 / 1954</p>
            </div>
            <div class="p-img">
                <div class="p-img-wrap">
                    <img src="./assets/prueba.png" alt="">
                </div>
                <div class="p-img-border"></div>
            </div>
            <div class="img">
                <div class="img-data">
                    <div class="img-name">
                        <br>
                        <p>the persistence <br />of memory</p>
                    </div>
                    <div class="img-info">
                        <p><span>date:</span> 2018</p>
                        <p><span>style:</span> minimalist</p>
                        <p><span>genre:</span> symbolic painting</p>
                        <p><span>media:</span> oil, canvas</p>
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
        <i> → $300.000</i> 
    </div>
    <div class="phrase">
    <p>phrase</p>
    </div>
   
    <div class="arrow">
    <i> → Well done is better than well said</i> 
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

    <section class="catalogo" id="catalogo">

<h2 class="" heading>Nuestro <span>Catalogo</span></h2>

<div class="grid-container">

        <div class="product">

                <img src="./img/productos/blue.png" alt="Teclado 1">
                

        </div>

        <div class="product">

                <img src="./img/productos/neg.png" alt="Teclado 2">

        </div>

        <div class="product">

                <img src="./img/productos/yellow.png" alt="Teclado 3">

        </div>
        <div class="product">

                <img src="./img/productos/rosa.png" alt="Teclado 4">

        </div>

        <div class="product">

                <img src="./img/productos/negro.png" alt="Teclado 5">

        </div>

        <div class="product">

                <img src="./img/productos/gris.png" alt="Teclado 6">

        </div>


        <div class="btn-box btns">

                <button type="submit" class="btn" id="catalogButton">Catalogo</button>

        </div>

</div>

</section>
<script src="js/script.js"></script>

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