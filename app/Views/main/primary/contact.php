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

												<input type="email" name="correo1" class="form-control" id="correo1" placeholder="Dirrecion de Correo" required>
												<span class="focus"></span>

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

				</section>