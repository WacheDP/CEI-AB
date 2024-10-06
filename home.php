<!DOCTYPE html>
<html lang="es">

<?php
session_start();

if (!empty($_SESSION['usuario'])) {
  header("Location: ./sistema.php");
  exit();
};
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Logo -->
  <link rel="shortcut icon" href="./recursos/lapiz.png" type="image/x-icon">

  <!-- Estilos -->
  <link rel="stylesheet" href="./estilos/home.css">
  <link rel="stylesheet" href="./estilos/cabecera.css">
  <link rel="stylesheet" href="./estilos/piepagina.css">

  <title>C.E.I. Andrés Bello</title>
</head>

<body>
  <header><?php require "./php/cabecera.php"; ?></header>

  <main>
    <section id="portada">
      <h1 id="CEI">Centro de Educación Inicial</h1>
      <h1 id="AB">Andrés Bello</h1>
    </section>

    <section id="informacion">
      <div id="contenedor_botones">
        <button class="infoboton" onclick="Mostrar_Mision();">Misión</button>
        <button class="infoboton" onclick="Mostrar_Vision();">Visión</button>
      </div>

      <div id="contenedor_textos">
        <div id="textmision">
          <h4>Misión de la Institución</h4>
          <p>
            La educación inicial se fundamenta en el ideario bolivariano. Política,
            filosófica, pedagójica y legalmente, se concibe en un sistema educativo que
            persigue la formación del ciudadano que se desea con bases a las
            aspiraciones y expectativas actuales de la sociedad venezolana, considerando
            el humanismo social para la formación del nuevo republicano y republicana,
            respondiendo al continuo desarrollo humano como proceso holístico y de calidad.
          </p>
          <p>
            La educación inicial es un proceso integral permanente, continuo, multifactorial
            e interactivo que promueve la construcción social del conocimiento, la valoración,
            ética del trabajo, la formación de niños y niñas para la participación activa,
            consciente y solidaria en los procesos de transformación individual y social.
          </p>
        </div>
        <div id="textvision">
          <h4>Visión de la Institución</h4>
          <p>
            Desarrollar el potencial creativo de cada ser humano para el pleno ejercicio
            de su personalidad y ciudadanía, en una sociedad humanista, democrática,
            multiétnica pluricultural y plurilingüe, basada en la valoración ética del
            trabajo liberador y la participación activa, consciente, protagónica,
            responsable, y solidaria de los procesos de transformación social,
            consustanciados con los principios de soberanía, los valores de la identidad
            Local, Regional, Nacional y con una visión latinoamericana, caribeña y universal.
          </p>
        </div>
      </div>

      <div id="contenedor_imagenes">
        <div id="imgmision">
          <ul>
            <li><img src="./recursos/img/mision1.jpg" alt="Imagen 1 de la misión"></li>
            <li><img src="./recursos/img/mision2.jpg" alt="Imagen 2 de la misión"></li>
            <li><img src="./recursos/img/mision3.jpg" alt="Imagen 3 de la misión"></li>
          </ul>
        </div>
        <div id="imgvision">
          <ul>
            <li><img src="./recursos/img/vision1.jpg" alt="Imagen 1 de la visión"></li>
            <li><img src="./recursos/img/vision2.jpg" alt="Imagen 2 de la visión"></li>
            <li><img src="./recursos/img/vision3.jpg" alt="Imagen 3 de la visión"></li>
          </ul>
        </div>
      </div>
    </section>

    <section id="piepagina">
      <div id="contactanos">
        <h2>CONTÁCTANOS</h2>
        <div class="datos">
          <div>
            <img src="./recursos/img/logo-correo.png" alt="Correo Electronico">
            <p>116ceiandresbello@gmail.com</p>
          </div>

          <div>
            <img src="./recursos/img/logo-telefono.png" alt="Número de la Institución" id="numero">
            <p>0276-3533919</p>
          </div>
        </div>

        <form action="./php/enviarcorreos.php" method="post">
          <label for="correo">Correo Electronico: </label>
          <div class="caja">
            <input type="email" name="correo" id="correo" placeholder="ejemplo@gmail.com" required>
          </div>
          <label for="mensaje">Mensaje del Correo: </label>
          <div class="caja">
            <textarea name="mensaje" id="mensaje" maxlength="200" required>Escribir Mensaje... </textarea>
          </div>
          <div>
            <input class="validar-btn" type="submit" value="Enviar" name="boton">
          </div>
        </form>
      </div>

      <div id="ubicanos">
        <h2>UBICANOS</h2>
        <div>
          <img src="./recursos/img/direccion-simbolo.png" alt="Dirección de la Institución">
          <p>Urbanización Pirineos I, Lote F, Vereda 19, San Cristóbal, Estado Táchira</p>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.181846201955!2d-72.21087542586888!3d7.770532692248889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e666cc1dff8419f%3A0x5d92343366430af9!2sCentro%20de%20Educaci%C3%B3n%20Inicial%20Andr%C3%A9s%20Bello!5e0!3m2!1ses!2sve!4v1716331113243!5m2!1ses!2sve" width="400" height="300" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </section>
  </main>

  <footer><?php require "./php/piepagina.php"; ?></footer>

  <!-- Javascript -->
  <script src="./js/menu.js"></script>
  <script src="./js/mision&vision.js"></script>
</body>

</html>