var cedula1 = document.getElementById('ci1');
var cedula2 = document.getElementById('ci2');
var usuario1 = document.getElementById('user1');
var usuario2 = document.getElementById('user2');
var contraseñaX1 = document.getElementById('clave-1');
var contraseñaY1 = document.getElementById('clave-2');
var contraseñaX2 = document.getElementById('clave2-1');
var contraseñaY2 = document.getElementById('clave2-2');
var fecha1 = document.getElementById('fechanacer1');
var fecha2 = document.getElementById('fechanacer2');

var caja_cedula1 = document.getElementById('validacion-ci1');
var caja_cedula2 = document.getElementById('validacion-ci2');
var caja_usuario1 = document.getElementById('validacion-user1');
var caja_usuario2 = document.getElementById('validacion-user2');
var caja_contraseñaX1 = document.getElementById('validacion-clave-1');
var caja_contraseñaY1 = document.getElementById('validacion-clave-2');
var caja_fecha1 = document.getElementById('validacion-date1');
var caja_fecha2 = document.getElementById('validacion-date2');

fecha2.addEventListener("change", function () {
    var fecha = fecha2.value;
    var ajax = new XMLHttpRequest();
    ajax.open('GET', './php/validar_fechas.php?sebo=' + encodeURIComponent(0) + '&date=' + encodeURIComponent(fecha));

    ajax.onload = function () {
        caja_fecha2.innerHTML = ajax.responseText;
    };

    ajax.send();
});

fecha1.addEventListener("change", function () {
    var fecha = fecha1.value;
    var ajax = new XMLHttpRequest();
    ajax.open('GET', './php/validar_fechas.php?sebo=' + encodeURIComponent(0) + '&date=' + encodeURIComponent(fecha));

    ajax.onload = function () {
        caja_fecha1.innerHTML = ajax.responseText;
    };

    ajax.send();
});

contraseñaX2.addEventListener("change", function () {
    var contraseña = contraseñaX1.value;
    var validacion = contraseñaX2.value;
    var ajax = new XMLHttpRequest();
    ajax.open('GET', './php/validar_contraseñas.php?sebo=' + encodeURIComponent(1) + '&contraseña=' + encodeURIComponent(contraseña) + '&validacion=' + encodeURIComponent(validacion));

    ajax.onload = function () {
        caja_contraseñaX1.innerHTML = ajax.responseText;
    };

    ajax.send();
});

contraseñaY2.addEventListener("change", function () {
    var contraseña = contraseñaY1.value;
    var validacion = contraseñaY2.value;
    var ajax = new XMLHttpRequest();
    ajax.open('GET', './php/validar_contraseñas.php?sebo=' + encodeURIComponent(1) + '&contraseña=' + encodeURIComponent(contraseña) + '&validacion=' + encodeURIComponent(validacion));

    ajax.onload = function () {
        caja_contraseñaY1.innerHTML = ajax.responseText;
    };

    ajax.send();
});

usuario1.addEventListener("change", function () {
    var usuario = usuario1.value;
    var ajax = new XMLHttpRequest();
    ajax.open('GET', './php/validar_usuarios.php?sebo=' + encodeURIComponent(1) + '&usuario=' + encodeURIComponent(usuario));

    ajax.onload = function () {
        caja_usuario1.innerHTML = ajax.responseText;
    };

    ajax.send();
});

usuario2.addEventListener("change", function () {
    var usuario = usuario2.value;
    var ajax = new XMLHttpRequest();
    ajax.open('GET', './php/validar_usuarios.php?sebo=' + encodeURIComponent(1) + '&usuario=' + encodeURIComponent(usuario));

    ajax.onload = function () {
        caja_usuario2.innerHTML = ajax.responseText;
    };

    ajax.send();
});

cedula1.addEventListener("change", function () {
    var cedula = cedula1.value;
    var ajax = new XMLHttpRequest();
    ajax.open('GET', './php/validar_cedulas.php?cedula=' + encodeURIComponent(cedula));

    ajax.onload = function () {
        caja_cedula1.innerHTML = ajax.responseText;
    };

    ajax.send();
});

cedula2.addEventListener("change", function () {
    var cedula = cedula2.value;
    var ajax = new XMLHttpRequest();
    ajax.open('GET', './php/validar_cedulas.php?cedula=' + encodeURIComponent(cedula));

    ajax.onload = function () {
        caja_cedula2.innerHTML = ajax.responseText;
    };

    ajax.send();
});