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
    

<div class="cursor"></div>

<section class="buttons">
<div class="toggle-container">
    <label class="toggle-label" for="dark-mode-switch">
      <input type="checkbox" class="toggle-input" id="dark-mode-switch">
      <div class="toggle-switch">
        <div class="toggle-slider"></div>
      </div>
    </label>
  </div>


</section>

<!-- navbar section starts here -->
    <div class="container">
    <header>
        <div class="header-left">
            
            <nav>
                <ul>
                    <li>
                        <a href="<?=base_url('inicio')?>" class="active">Home</a>
                    </li>
                    <li>
                        <a href="<?=base_url('intro_about')?>">about</a>
                    </li>
                    <li>
                        <a href="<?=base_url('intro_catalogo')?>">catalogue</a>
                    </li>
                    <li>
                        <a href="<?=base_url('intro_contacto')?>">contact</a>
                    </li>

                
                    <?php if (session('user') && session('user')->name): ?>
				<li><a href="<?= base_url('intro_dashboard') ?>"><?= session('user')->name ?></a></li>
			<?php else: ?>
				<li><a href="<?= base_url('intro_login') ?>">account</a></li>
			<?php endif; ?>
                    
            
                  
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

<!-- home section starts here -->

<section class="home">
    <div class="background-media"></div>
    <div class="phrase">
        <h2>What are you <br> <span>looking</span> for?</h2>
        <p class="slogan">©ertified by us</p>
    </div>

</section>

<!-- home section ends here -->










<!-- script for navbar -->
    <script>
        hamburger = document.querySelector(".hamburger");
        nav = document.querySelector("nav");
        hamburger.onclick = function() {
            nav.classList.toggle("active");
        }
    </script>



<!-- script para boton fijo dark-mode -->
<script>
    const toggleInput = document.getElementById('dark-mode-switch');
    const body = document.body;

    // Cambia el estado del interruptor al cargar la página
    toggleInput.checked = body.classList.contains('dark-mode');

    // Cambia el estado del modo y del interruptor con animación
    function toggleMode() {
        body.classList.toggle('dark-mode');
        body.classList.toggle('light-mode');
    }

    // Escucha los cambios en el interruptor
    toggleInput.addEventListener('change', toggleMode);
  </script>
<!-- script para el cursor -->

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const cursor = document.querySelector(".cursor");

    document.addEventListener("mousemove", function (e) {
        const x = e.pageX - cursor.offsetWidth / 2;
        const y = e.pageY - cursor.offsetHeight / 2;

        cursor.style.transform = `translate(${x}px, ${y}px)`;
    });
});

</script>


</body>
</html>