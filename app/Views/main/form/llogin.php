<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/llogin.css');?>">
    <title>Inicio</title>
</head>

<body>
<!--Mensaje de Inicio de Sesion-->

    <div class="container-form sign-up">
        <div class="welcome-back">
            <div class="message">
                <h2>Bienvenido a Arcoiris</h2>
                <p>Si ya tienes una cuenta por favor inicia sesion aqui</p>
                <button class="sign-up-btn">Iniciar Sesion</button>
            </div>
        </div>

<!--Formulario de Login y registro-->

        <form action="<?= base_url(" register ");?>"  method="post" class="formulario">
            <h2 class="create-account">Crear una cuenta</h2>
            <div class="iconos">
<!--Linkeo de Instagram de Register-->

                <div class="border-icon">
                  <ul>
                    <i><a href="https://www.instagram.com/arcoiris.empresa123/" target="_blank"><img src="<?php echo base_url('css/img/insta.png');?>" widht="25" height="30"></a></i>
                  </ul>
                </div>
<!--Linkeo de Youtube de Register-->

                <div class="border-icon">
                <ul>
                    <i><a href="https://www.youtube.com/channel/UCGJdMccO88cKvxEJ63RU-Qg" target="_blank"><img src="<?php echo base_url('css/img/youtube.png');?>" widht="25" height="30"></a></i>
                  </ul>
                </div>
<!--Linkeo de la Aula Virtual de Register-->

                <div class="border-icon">
                <ul>
                    <i><a href="https://aulavirtual.itr3.edu.ar/" target="_blank"><img src="<?php echo base_url('css/img/aula.png');?>" widht="25" height="30"></a></i>
                  </ul>
                </div>
            </div>
<!--Parte del Formulario de Register-->

            <p class="cuenta-gratis">Crear una cuenta gratis</p>
            <input type="text" name="Nombre" placeholder="Nombre y Apellido">
            <input type="email" name="Email" placeholder="Email">
            <input type="password" name="Contraseña" placeholder="Contraseña">
            <input type="submit" value="Registrarse">
        </form>
    </div>
<!--Contenedor de Inicio de Sesion-->

    <div class="container-form sign-in">
        <form action="<?= base_url(" login ");?>" method="post"class="formulario">
            <h2 class="create-account">Iniciar Sesion</h2>
<!--Linkeo de Instagram de Inicio de Sesion-->

            <div class="iconos">
                <div class="border-icon">
                <ul>
                    <i><a href="https://www.instagram.com/arcoiris.empresa123/" target="_blank"><img src="<?php echo base_url('css/img/insta.png');?>" widht="25" height="30"></a></i>
                  </ul>
                </div>
<!--Linkeo de Youtube de Inicio de Sesion-->

                <div class="border-icon">
                <ul>
                    <i><a href="https://www.youtube.com/channel/UCGJdMccO88cKvxEJ63RU-Qg" target="_blank"><img src="<?php echo base_url('css/img/youtube.png');?>" widht="25" height="30"></a></i>
                  </ul>
                </div>
<!--Linkeo de la Aula Virtual de Inicio de Sesion-->

                <div class="border-icon">
                <ul>
                    <i><a href="https://aulavirtual.itr3.edu.ar/" target="_blank"><img src="<?php echo base_url('css/img/aula.png');?>" widht="25" height="30"></a></i>
                  </ul>
                </div>
            </div>
<!--Parte del Formulario de Inicio de Sesion-->

            <p class="cuenta-gratis">¿Aun no tienes una cuenta?</p>
            <input type="text" name="Nombre" placeholder="Nombre">
            <input type="password" name="Contraseña" placeholder="Contraseña">
            <input type="submit"  value="Iniciar Sesion">
        </form>
<!--Mensaje de Register-->

        <div class="welcome-back">
            <div class="message">
                <h2>Bienvenido de nuevo</h2>
                <p>Si aun no tienes una cuenta por favor registrese aqui</p>
                <button class="sign-in-btn">Registrarse</button>
            </div>
        </div>
    </div>
<!--Scripts de Transicion del Formulario-->

   
    <script>
        const $btnSignIn= document.querySelector('.sign-in-btn'),
      $btnSignUp = document.querySelector('.sign-up-btn'),  
      $signUp = document.querySelector('.sign-up'),
      $signIn  = document.querySelector('.sign-in');

document.addEventListener('click', e => {
    if (e.target === $btnSignIn || e.target === $btnSignUp) {
        $signIn.classList.toggle('active');
        $signUp.classList.toggle('active')
    }
});
    </script>
</body>

</html>