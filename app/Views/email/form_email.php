<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
    <head>
        
    </head>
    <body class="text-center">

        <main class="form-signin">
            <form id="form_enviar_email" method="post" action="<?php echo base_url("enviar_email") ?>">
                <h1 class="h3 mb-3 fw-normal">Enviar mensaje</h1>

                <div class="form-floating">
                    <input type="text" name= "asunto"class="form-control" id="asunto" placeholder="ingresa tu email" required/>
                    <label for="floatingInput">Asunto</label>
                </div>

                <div class="form-floating">
                    <textarea name="mensaje" class="form-control" rows="4" id="mensaje"></textarea>
                    <label for="floatingPassword">Mensaje</label>
                </div>

                <div class="form-floating">
                    <input type="email" name= "correo"class="form-control" id="correo" placeholder="name@example.com" required/>
                    <label for="floatingInput">Email address</label>
                </div>

                <button class="btn btn-primary w-100 py-2" type="submit">Enviar</button>
                <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2023</p>
            </form>
        </main>
    </body>
</html>
