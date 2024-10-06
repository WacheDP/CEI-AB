var usuario = document.getElementById('usuario');
var contraseña = document.getElementById('contraseña');
var caja_usuario = document.getElementById('validar-user');
var caja_contraseña = document.getElementById('validar-password');

usuario.addEventListener("change", function () {
    var user = usuario.value;
    var ajax = new XMLHttpRequest();
    ajax.open('GET', './php/validar_usuarios.php?sebo=' + encodeURIComponent(2) + '&usuario=' + encodeURIComponent(user));

    ajax.onload = function () {
        caja_usuario.innerHTML = ajax.responseText;
    };

    ajax.send();
});

contraseña.addEventListener("change", function () {
    var user = usuario.value;
    var password = contraseña.value;
    var ajax = new XMLHttpRequest();
    ajax.open('GET', './php/validar_contraseñas.php?sebo=' + encodeURIComponent(2) + '&usuario=' + encodeURIComponent(user) + '&contraseña=' + encodeURIComponent(password));

    ajax.onload = function () {
        caja_contraseña.innerHTML = ajax.responseText;
    };

    ajax.send();
});