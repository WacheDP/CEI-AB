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
    <meta charset="UTF8">
    <meta name="viewport" content="width=devicewidth, initialscale=1.0">

    <!-- Logo -->
    <link rel="shortcut icon" href="./recursos/lapiz.png" type="image/xicon">

    <!-- Estilos -->
    <link rel="stylesheet" href="./estilos/registro.css">
    <link rel="stylesheet" href="./estilos/cabecera.css">
    <link rel="stylesheet" href="./estilos/piepagina.css">

    <title>Registrar Cuenta</title>
</head>

<body>
    <?php require "./php/conexion.php"; ?>

    <header><?php require "./php/cabecera.php"; ?></header>

    <main>
        <div id="caja-trasera">
            <form action="./php/procesar_form.php" method="post" id="formulario-representante">

                <div class="partes">
                    <h4>Información Personal</h4>
                    <div>
                        <label for="ci1">Cedula de Identidad: </label>
                        <input type="text" class="no-null" name="ci" id="ci1" placeholder="12345678" maxlength="12" required>
                    </div>
                    <div id="validacion-ci1"></div>
                    <div>
                        <label for="nom1">Primer Nombre: </label>
                        <input type="text" class="no-null" name="nom1" id="nom1" placeholder="Juan" maxlength="12" required>
                    </div>
                    <div>
                        <label for="nom2">Segundo Nombre: </label>
                        <input type="text" class="null" name="nom2" id="nom2" placeholder="Pedro" maxlength="12">
                    </div>
                    <div>
                        <label for="ape1">Primer Apellido: </label>
                        <input type="text" class="no-null" name="ape1" id="ape1" placeholder="Villa" maxlength="12" required>
                    </div>
                    <div>
                        <label for="ape2">Segundo Apellido: </label>
                        <input type="text" class="null" name="ape2" id="ape2" placeholder="Real" maxlength="12">
                    </div>
                    <div>
                        <label for="telf1">Telefono 1: </label>
                        <input type="tel" class="null" name="telf1" id="telf1" placeholder="+584245789632" maxlength="20">
                    </div>
                    <div>
                        <label for="telf2">Telefono 2: </label>
                        <input type="tel" class="null" name="telf2" id="telf2" placeholder="+584245789632" maxlength="20">
                    </div>
                    <div>
                        <label for="telf3">Telefono 3: </label>
                        <input type="tel" class="null" name="telf3" id="telf3" placeholder="+584245789632" maxlength="20">
                    </div>
                    <div>
                        <label for="fe">Religión: </label>
                        <input type="text" class="no-null" name="fe" id="fe" placeholder="Católica" maxlength="30" required>
                    </div>
                    <div>
                        <label for="fechanacer">Fecha de Nacimiento: </label>
                        <input type="date" class="no-null" name="fechanacer" id="fechanacer1" required>
                    </div>
                    <div id="validacion-date1"></div>
                    <div>
                        <label for="lugarnacer">Lugar de Nacimiento: </label>
                        <textarea class="null" name="lugarnacer" id="lugarnacer" maxlength="100" placeholder="San Cristóbal, Estado Táchira..."></textarea>
                    </div>
                    <div>
                        <label for="nacionalidad">Nacionalidad: </label>
                        <select class="no-null" name="nacionalidad" id="nacionalidad" required>
                            <option value="">Seleccione una opción</option>
                            <option value="V">Venezolano</option>
                            <option value="E">Extranjero</option>
                        </select>
                    </div>
                </div>

                <div class="partes">
                    <h4>Datos para el Sistema</h4>
                    <div>
                        <label for="user1">Nombre de Usuario: </label>
                        <input type="text" class="no-null" name="user" id="user1" maxlength="12" placeholder="usuario123" required>
                    </div>
                    <div id="validacion-user1"></div>
                    <div>
                        <label for="email">Correo Electronico: </label>
                        <input type="email" class="null" name="email" id="email" maxlength="100" placeholder="ejemplo123@gmail.com">
                    </div>
                    <div>
                        <label for="clave-1">Contraseña: </label>
                        <input type="password" class="no-null" name="clave" id="clave-1" placeholder="********" required>
                    </div>
                    <div>
                        <label for="clave2-1">Verificar Contraseña: </label>
                        <input type="password" class="no-null" name="clave2" id="clave2-1" placeholder="********" required>
                    </div>
                    <div id="validacion-clave-1"></div>
                </div>

                <div class="partes">
                    <h4>Información Profesional</h4>
                    <div>
                        <label for="profesion">Profesion: </label>
                        <input type="text" class="null" name="profesion" id="profesion" placeholder="Ingeniería de Sistemas" maxlength="100">
                    </div>
                    <div>
                        <label for="ocupacion">Ocupacion: </label>
                        <input type="text" class="null" name="ocupacion" id="ocupacion" placeholder="Mototaxista" maxlength="100">
                    </div>
                    <div>
                        <label for="lugartrabajo">Lugar de Trabajo: </label>
                        <textarea class="null" name="lugartrabajo" id="lugartrabajo" maxlength="100"></textarea>
                    </div>
                </div>

                <div class="partes">
                    <h4>Información del Hogar</h4>
                    <div>
                        <label for="pais">Pais: </label>
                        <select class="no-null" name="pais" id="pais1" required>
                            <option value="">Seleccione una opción</option>

                            <?php
                            $sql = $conexion->prepare('SELECT * FROM abpais');
                            $sql->execute();
                            $paises = $sql->get_result();

                            $html = "";
                            while ($pais = $paises->fetch_assoc()) {
                                $html .= '<option value="' . htmlspecialchars($pais['paiscod']) . '">' . htmlspecialchars($pais['paisnom']) . '</option>';
                            };
                            echo $html;

                            $paises->free_result();
                            $sql->close();
                            ?>
                        </select>
                    </div>
                    <div>
                        <label for="estado">Estado: </label>
                        <select class="no-null" name="estado" id="estado1" required>
                            <option value="">Seleccione una opción</option>
                        </select>
                    </div>
                    <div>
                        <label for="municipio">Municipio: </label>
                        <select class="no-null" name="municipio" id="municipio1" required>
                            <option value="">Seleccione una opción</option>
                        </select>
                    </div>
                    <div>
                        <label for="ciudad">Ciudad: </label>
                        <select class="no-null" name="ciudad" id="ciudad1" required>
                            <option value="">Seleccione una opción</option>
                        </select>
                    </div>
                    <div>
                        <label for="parroquia">Parroquia: </label>
                        <select class="no-null" name="parroquia" id="parroquia1" required>
                            <option value="">Seleccione una opción</option>
                        </select>
                    </div>
                    <div>
                        <label for="dir">Direccion: </label>
                        <textarea class="no-null" name="dir" id="dir" maxlength="100" required></textarea>
                    </div>
                </div>

                <input type="submit" class="registro-btn" value="Registrar Representante" name="registro">
            </form>

            <form action="./php/procesar_form.php" method="post" id="formulario-personal">

                <div class="partes">
                    <h4>Información Personal</h4>
                    <div>
                        <label for="ci2">Cedula de Identidad: </label>
                        <input type="text" class="no-null" name="ci" id="ci2" placeholder="12345678" maxlength="12" required>
                    </div>
                    <div id="validacion-ci2"></div>
                    <div>
                        <label for="nom1">Primer Nombre: </label>
                        <input type="text" class="no-null" name="nom1" id="nom1" placeholder="Juan" maxlength="12" required>
                    </div>
                    <div>
                        <label for="nom2">Segundo Nombre: </label>
                        <input type="text" class="null" name="nom2" id="nom2" placeholder="Pedro" maxlength="12">
                    </div>
                    <div>
                        <label for="ape1">Primer Apellido: </label>
                        <input type="text" class="no-null" name="ape1" id="ape1" placeholder="Villa" maxlength="12" required>
                    </div>
                    <div>
                        <label for="ape2">Segundo Apellido: </label>
                        <input type="text" class="null" name="ape2" id="ape2" placeholder="Real" maxlength="12">
                    </div>
                    <div>
                        <label for="telf1">Telefono 1: </label>
                        <input type="tel" class="null" name="telf1" id="telf1" placeholder="+584245789632" maxlength="20">
                    </div>
                    <div>
                        <label for="telf2">Telefono 2: </label>
                        <input type="tel" class="null" name="telf2" id="telf2" placeholder="+584245789632" maxlength="20">
                    </div>
                    <div>
                        <label for="telf3">Telefono 3: </label>
                        <input type="tel" class="null" name="telf3" id="telf3" placeholder="+584245789632" maxlength="20">
                    </div>
                    <div>
                        <label for="fechanacer">Fecha de Nacimiento: </label>
                        <input type="date" class="no-null" name="fechanacer" id="fechanacer2" required>
                    </div>
                    <div id="validacion-date2"></div>
                    <div>
                        <label for="lugarnacer">Lugar de Nacimiento: </label>
                        <textarea class="null" name="lugarnacer" id="lugarnacer" maxlength="100" placeholder="San Cristóbal, Estado Táchira..."></textarea>
                    </div>
                    <div>
                        <label for="nacionalidad">Nacionalidad: </label>
                        <select class="no-null" name="nacionalidad" id="nacionalidad" required>
                            <option value="">Seleccione una opción</option>
                            <option value="V">Venezolano</option>
                            <option value="E">Extranjero</option>
                        </select>
                    </div>
                </div>

                <div class="partes">
                    <h4>Datos para el Sistema</h4>
                    <div>
                        <label for="user2">Nombre de Usuario: </label>
                        <input type="text" class="no-null" name="user" id="user2" maxlength="12" placeholder="usuario123" required>
                    </div>
                    <div id="validacion-user2"></div>
                    <div>
                        <label for="email">Correo Electronico: </label>
                        <input type="email" class="null" name="email" id="email" maxlength="100" placeholder="ejemplo123@gmail.com">
                    </div>
                    <div>
                        <label for="clave-2">Contraseña: </label>
                        <input type="password" class="no-null" name="clave" id="clave-2" placeholder="********" required>
                    </div>
                    <div>
                        <label for="clave2-2">Verificar Contraseña: </label>
                        <input type="password" class="no-null" name="clave2" id="clave2-2" placeholder="********" required>
                    </div>
                    <div id="validacion-clave-2"></div>
                </div>

                <div class="partes">
                    <h4>Información Dentro de la Institución</h4>
                    <div>
                        <label for="cargo">Cargo: </label>
                        <select class="no-null" name="cargo" id="cargo" required>
                            <option value="">Seleccione una opción</option>

                            <?php
                            $sql = $conexion->prepare('SELECT cargocod, cargodenom FROM abcargo');
                            $sql->execute();
                            $cargos = $sql->get_result();

                            $html = "";
                            while ($cargo = $cargos->fetch_assoc()) {
                                $html .= '<option value="' . htmlspecialchars($cargo['cargocod']) . '">' . htmlspecialchars($cargo['cargocod']) . ' ' . htmlspecialchars($cargo['cargodenom']) . '</option>';
                            };
                            echo $html;

                            $cargos->free_result();
                            $sql->close();
                            ?>
                        </select>
                    </div>
                    <div>
                        <label for="tiempo">Fecha de Ingreso: </label>
                        <input class="no-null" type="date" name="tiempo" id="tiempo" required>
                    </div>
                </div>

                <div class="partes">
                    <h4>Información del Hogar</h4>
                    <div>
                        <label for="pais">Pais: </label>
                        <select class="no-null" name="pais" id="pais2" required>
                            <option value="">Seleccione una opción</option>

                            <?php
                            $sql = $conexion->prepare('SELECT * FROM abpais');
                            $sql->execute();
                            $paises = $sql->get_result();

                            $html = "";
                            while ($pais = $paises->fetch_assoc()) {
                                $html .= '<option value="' . htmlspecialchars($pais['paiscod']) . '">' . htmlspecialchars($pais['paisnom']) . '</option>';
                            };
                            echo $html;

                            $paises->free_result();
                            $sql->close();
                            ?>
                        </select>
                    </div>
                    <div>
                        <label for="estado">Estado: </label>
                        <select class="no-null" name="estado" id="estado2" required>
                            <option value="">Seleccione una opción</option>
                        </select>
                    </div>
                    <div>
                        <label for="municipio">Municipio: </label>
                        <select class="no-null" name="municipio" id="municipio2" required>
                            <option value="">Seleccione una opción</option>
                        </select>
                    </div>
                    <div>
                        <label for="ciudad">Ciudad: </label>
                        <select class="no-null" name="ciudad" id="ciudad2" required>
                            <option value="">Seleccione una opción</option>
                        </select>
                    </div>
                    <div>
                        <label for="parroquia">Parroquia: </label>
                        <select class="no-null" name="parroquia" id="parroquia2" required>
                            <option value="">Seleccione una opción</option>
                        </select>
                    </div>
                    <div>
                        <label for="dir">Direccion: </label>
                        <textarea class="no-null" name="dir" id="dir" maxlength="100" required></textarea>
                    </div>
                </div>

                <input type="submit" class="registro-btn" value="Registrar Personal" name="registro">
            </form>
        </div>

        <div id="caja-delantera">
            <h1 id="idperso">Registro del Personal</h1>
            <h1 id="idrepre">Registro del Representante</h1>

            <div id="aviso">
                <div>
                    <div id="cuadro-no-null"></div>
                    <p>Para los espacios que <b>NO</b> pueden quedar vacios en el formulario</p>
                </div>
                <div>
                    <div id="cuadro-null"></div>
                    <p>Para los espacios que pueden quedar vacios en el formulario</p>
                </div>
            </div>

            <img src="./recursos/img/familia.png" alt="Imagen de representantes" id="img-representante" class="img-clase">
            <img src="./recursos/img/miembro-personal.jpg" alt="Imagen del personal" id="img-personal" class="img-clase">

            <div id="personal-btn" class="boton-clase">
                <h4>¿Eres un representante?</h4>
                <button onclick="Mostrar_Representante();">Registrar como Representante</button>
            </div>

            <div id="representante-btn" class="boton-clase">
                <h4>¿Eres un miembro del personal?</h4>
                <button onclick="Mostrar_Personal();">Registrar como Personal</button>
            </div>

        </div>
    </main>

    <footer><?php require "./php/piepagina.php"; ?></footer>

    <!-- Javascripts -->
    <?php require "./php/cerrar_conexion.php"; ?>
    <script src="./js/menu.js"></script>
    <script src="./js/validar_form.js"></script>
    <script src="./js/listadinamica.js"></script>
    <script src="./js/formularios.js"></script>
</body>

</html>