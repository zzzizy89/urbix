<link rel="stylesheet" href="<?php echo base_url("assets/css/contact.css") ?>">

<section class="contact" id="contacto">
						<form id="form_enviar_email" method="post" action="<?php echo base_url("enviar__email") ?>">

						<h2 class="heading"><span>Consultas</span></h2>
					

								<div class="input-box">

										<div class="input-field">

										<input type="text" name= "nombrecom"class="form-control" id="nombrecom" placeholder="Nombre Completo" required/>												
										<span class="focus"></span>

										</div>

										<div class="input-field">
										<?php if (session('user') && session('user')->email): ?>
											<input class="form-control" required readonly value="<?= session('user')->email ?>">
											<span class="focus"></span>
										<?php else: ?>
											<input type="email" name="correo1" class="form-control" id="correo1" placeholder="Dirrecion de Correo" required>
											<span class="focus"></span>
										<?php endif; ?>
									</div>

								</div>

								<div class="input-box">

										<div class="input-field">

												<input type="number"  name="numtel" class="form-control" id="numtel" placeholder="Numero de Telefono" required>
												<span class="focus"></span>

										</div>

										<div class="input-field">

										<input type="text" name= "asuntoco"class="form-control" id="asuntoco" placeholder="Asunto del Correo" required/>
												<span class="focus"></span> 

										</div>

								</div>

								<div class="textarea-field">

										<textarea name="mensaje1" id="mensaje1" cols="30" rows="10" placeholder="Su Mensaje" required></textarea>
										<span class="focus"></span>

								</div>

								<div class="btn-box btns">

										<button type="submit" class="btn" id="contactButton">Enviar</button>

								</div>

						</form>
						<script>
    document.getElementById('form_enviar_email').addEventListener('submit', function (event) {
        // Verificar si el usuario está autenticado antes de enviar el formulario
        if (!<?php echo json_encode(session('user')) ?>) {
            alert('Necesitas estar logeado para mandar una consulta');
            event.preventDefault(); // Evitar que el formulario se envíe
        }
    });
</script>


				</section>