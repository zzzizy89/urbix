<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
          <!-- stylesheet -->
          <link rel="stylesheet" href="assets/css/contact.css">
          <link rel="stylesheet" href="../assets/css/contact.css">

<!-- bootstrap cdns -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- google fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto+Mono:100,100i,300,300i,400,400i,500,500i,700,700i" rel="stylesheet">

<!-- for on scroll animations -->
<link rel="stylesheet" href="animate.css">
<script src="wow.min.js"></script>
</head>
<body>
<div class="container">
                  <div class="hero-content">
                        <br><br>

                        <div class="row">
                              <div class="col-lg-8">

                                    <h3 class="wow fadeInUp" data-wow-delay="1s">Di hola 👋</h3><br>
                                    <p class="wow fadeInUp" data-wow-delay="1.2s">Estimado(a) lector(a),

                                    Agradezco sinceramente su interés en nuestros productos. Si tiene alguna duda o consulta sobre alguno de ellos, le invito cordialmente a ponerse en contacto a través de correo electrónico. Para su conveniencia, he creado un formulario de contacto que puede completar sus datos y enviarme un correo electrónico.</p>

                              </div>
                        </div>
                  </div>
            </div>
            <!--------------- hero section ends here --------------->

            <!-- <div class="whitespace"></div> -->

            <!--------------- form section starts here --------------->
            <div class="container-fluid">
                  <div class="row">
                        <div class="col-lg-8">
                              <form name="contact-form" id="contact-form" method="post" action="">

                              <ul>

                              <li class="wow fadeInUp" data-wow-delay="1.4s">
                                    <label for="contact-name">Name :</label>
                                    <div class="textarea">
                                          <input type="text" name="contact-name" id="contact-name" value="" required>
                                    </div>
                              </li>

                              <li class="wow fadeInUp" data-wow-delay="1.6s">
                                    <label for="contact-email">Email :</label>
                                    <div class="textarea">
                                          <input type="email" name="contact-email" id="contact-email" value="" required>
                                    </div>
                              </li>

                              <li class="wow fadeInUp" data-wow-delay="1.6s">
                                    <label for="contact-project">Message :</label>
                                    <div class="textarea">
                                          <textarea type="email" name="contact-project" id="contact-project" rows="6" value="" required>
                                          </textarea>
                                    </div>
                              </li>

                              </ul>

                              <button type="submit" name="contact-submit" id="contact-submit" class="send wow fadeInUp">Send Message</button>

                              </form>
                        </div>
                  </div>
            </div>

</body>
</html>