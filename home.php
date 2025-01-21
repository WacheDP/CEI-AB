<!DOCTYPE html>
<html lang="es">

<?php require "./validar_sesion.php"; ?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Logo -->
  <link rel="shortcut icon" href="./assets/lapiz.png" type="image/x-icon">

  <!-- Estilos -->
  <link rel="stylesheet" href="./assets/css/home.css">
  <link rel="stylesheet" href="./assets/css/slider.css">
  <link rel="stylesheet" href="./assets/css/cabecera.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="./assets/css/templatemo-grad-school-int.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/lightbox.css">

  <title>C.E.I. Andrés Bello</title>
</head>

<body>
  <?php require "./navbar.php"; ?>

  <section class="section main-banner portada" id="top" data-section="section1">
    <div class="video-overlay header-text">
      <div class="caption">
        <h6>Centro de Educación Inicial</h6>
        <h2><em>Andrés</em> Bello</h2>
      </div>
    </div>
  </section>

  <section id="mision&vision" class="section why-us" data-section="section2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>¿Quienes Somos?</h2>
          </div>
        </div>

        <div class="col-md-12">
          <div id='tabs'>
            <ul>
              <li><a href='#tabs-1'>Misión</a></li>
              <li><a href='#tabs-2'>Visión</a></li>
            </ul>

            <section class='tabs-content'>
              <article id='tabs-1'>
                <div class="row">
                  <div class="col-md-6">
                    <div class="slider">
                      <ul>
                        <li>
                          <img src="./assets/images/mision1.jpg" alt="Imagen Misión 1">
                        </li>
                        <li>
                          <img src="./assets/images/mision2.jpg" alt="Imagen Misión 2">
                        </li>
                        <li>
                          <img src="./assets/images/mision3.jpg" alt="Imagen Misión 3">
                        </li>
                      </ul>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <h4>Misión de la Institución</h4>
                    <p>
                      La educación inicial se fundamenta en el ideario bolivariano. Política, filosófica, pedagógica
                      y legalmente, se concibe en un sistema educativo que persigue la formación del ciudadano que se
                      desea con base a las aspiraciones y expectativas actuales de la sociedad venezolana, considerando
                      el humanismo social para la formación del nuevo republicano y republicana, respondiendo al
                      continuo desarrollo humano como proceso holístico y de calidad.
                    </p>
                    <p>
                      La educación inicial es un proceso integral permanente, continuo, multifactorial e interactivo
                      que promueve la construcción social del conocimiento, la valoración, ética del trabajo, la
                      formación de niños y niñas para la participación activa, consciente y solidaria en los procesos
                      de transformación individual y social.
                    </p>
                  </div>
                </div>
              </article>

              <article id='tabs-2'>
                <div class="row">
                  <div class="col-md-6">
                    <div class="slider">
                      <ul>
                        <li>
                          <img src="./assets/images/vision1.jpg" alt="Imagen Visión 1">
                        </li>
                        <li>
                          <img src="./assets/images/vision2.jpg" alt="Imagen Visión 2">
                        </li>
                        <li>
                          <img src="./assets/images/vision3.jpg" alt="Imagen Visión 3">
                        </li>
                      </ul>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <h4>Visión de la Institución</h4>
                    <p>
                      Desarrollar el potencial creativo de cada ser humano para el pleno ejercicio de su personalidad
                      y ciudadanía, en una sociedad humanista, democrática, multiétnica pluricultural y plurilingüe,
                      basada en la valoración ética del trabajo liberador y la participación activa, consciente,
                      protagónica, responsable, y solidaria de los procesos de transformación social, consustanciados
                      con los principios de soberanía, los valores de la identidad Local, Regional, Nacional y con una
                      visión latinoamericana, caribeña y universal.
                    </p>
                  </div>
                </div>
              </article>
            </section>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="login" class="section coming-soon" data-section="section3">
    <div class="container">
      <div class="row">
        <div class="col-md-7 col-xs-12">
          <div class="continer centerIt"></div>
        </div>
        <div class="col-md-5">
          <div class="right-content">
            <div class="top-content">
              <h6 class="titulo-form">INICIO DE SESIÓN</h6>
            </div>

            <form action="./assets/php/procesar_login.php" method="post">
              <div class="form-row align-items-center">
                <div class="col-auto">
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                          <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                      </div>
                    </div>
                    <input type="text" class="form-control" id="ID" name="ID" placeholder="Nombre de Usuario - Correo" required>
                    <small id="texto-info" class="form-text text-muted">
                      * Puedes utilizar el nombre de usuario o el correo electrónico para iniciar sesión *
                    </small>
                  </div>
                </div>
                <div class="col-auto">
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                          <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2" />
                        </svg>
                      </div>
                    </div>
                    <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
                  </div>
                </div>

                <div id="login-validation" class="col-auto"></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="contactanos" class="section contact" data-section="section6">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Contacta con Nosotros</h2>
          </div>
        </div>

        <div class="col-md-6">
          <form id="contact" action="" method="post">
            <div class="row">
              <div class="col-md-6">
                <fieldset>
                  <input name="name" type="text" class="form-control" id="name" placeholder="Your Name" required="">
                </fieldset>
              </div>
              <div class="col-md-6">
                <fieldset>
                  <input name="email" type="text" class="form-control" id="email" placeholder="Your Email" required="">
                </fieldset>
              </div>
              <div class="col-md-12">
                <fieldset>
                  <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required=""></textarea>
                </fieldset>
              </div>
              <div class="col-md-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="button">Send Message Now</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-6">
          <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7906.3626604661795!2d-72.20882863108844!3d7.77058749413238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e666cc1dff8419f%3A0x5d92343366430af9!2sCentro%20de%20Educaci%C3%B3n%20Inicial%20Andr%C3%A9s%20Bello!5e0!3m2!1ses!2sve!4v1735253219463!5m2!1ses!2sve" width="100%" height="422" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p>
            <i class="fa fa-copyright"></i> Todos los derechos reservados para C.E.I. Andrés Bello
            | Programado por Daniel Parra
          </p>
        </div>
      </div>
    </div>
  </footer>
</body>

<!-- Scripts -->
<script src="./assets/js/login.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="assets/js/isotope.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/lightbox.js"></script>
<script src="assets/js/tabs.js"></script>
<script src="assets/js/video.js"></script>
<script src="assets/js/slick-slider.js"></script>
<script src="assets/js/custom.js"></script>

</html>