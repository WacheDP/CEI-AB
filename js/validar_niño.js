var fecha = document.getElementById('fechanacer');
var contenedor_fecha = document.getElementById('validacion-fecha');

fecha.addEventListener("change", function () {
    var date = fecha.value;
    var ajax = new XMLHttpRequest();
    ajax.open('GET', './php/validar_fechas.php?sebo=' + encodeURIComponent(1) + '&date=' + encodeURIComponent(date));

    ajax.onload = function () {
        contenedor_fecha.innerHTML = ajax.responseText;
    };

    ajax.send();
});