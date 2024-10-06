var pais1 = document.getElementById('pais1');
var estado1 = document.getElementById('estado1');
var municipio1 = document.getElementById('municipio1');
var ciudad1 = document.getElementById('ciudad1');
var parroquia1 = document.getElementById('parroquia1');
var pais2 = document.getElementById('pais2');
var estado2 = document.getElementById('estado2');
var municipio2 = document.getElementById('municipio2');
var ciudad2 = document.getElementById('ciudad2');
var parroquia2 = document.getElementById('parroquia2');

pais1.addEventListener("change", function () {
    var pais = pais1.value;
    var ajax = new XMLHttpRequest();
    ajax.open('GET', './php/cargarestados.php?pais=' + encodeURIComponent(pais));

    ajax.onload = function () {
        estado1.innerHTML = ajax.responseText;
    };

    ajax.send();
});

estado1.addEventListener("change", function () {
    var estado = estado1.value;
    var ajax = new XMLHttpRequest();
    ajax.open('GET', './php/cargarmunicipios.php?estado=' + encodeURIComponent(estado));

    ajax.onload = function () {
        municipio1.innerHTML = ajax.responseText;
    };

    ajax.send();
});

municipio1.addEventListener("change", function () {
    var municipio = municipio1.value;
    var ajax = new XMLHttpRequest();
    ajax.open('GET', './php/cargarciudades.php?municipio=' + encodeURIComponent(municipio));

    ajax.onload = function () {
        ciudad1.innerHTML = ajax.responseText;
    };

    ajax.send();
});

ciudad1.addEventListener("change", function () {
    var ciudad = ciudad1.value;
    var ajax = new XMLHttpRequest();
    ajax.open('GET', './php/cargarparroquias.php?ciudad=' + encodeURIComponent(ciudad));

    ajax.onload = function () {
        parroquia1.innerHTML = ajax.responseText;
    };

    ajax.send();
});

pais2.addEventListener("change", function () {
    var pais = pais2.value;
    var ajax = new XMLHttpRequest();
    ajax.open('GET', './php/cargarestados.php?pais=' + encodeURIComponent(pais));

    ajax.onload = function () {
        estado2.innerHTML = ajax.responseText;
    };

    ajax.send();
});

estado2.addEventListener("change", function () {
    var estado = estado2.value;
    var ajax = new XMLHttpRequest();
    ajax.open('GET', './php/cargarmunicipios.php?estado=' + encodeURIComponent(estado));

    ajax.onload = function () {
        municipio2.innerHTML = ajax.responseText;
    };

    ajax.send();
});

municipio2.addEventListener("change", function () {
    var municipio = municipio2.value;
    var ajax = new XMLHttpRequest();
    ajax.open('GET', './php/cargarciudades.php?municipio=' + encodeURIComponent(municipio));

    ajax.onload = function () {
        ciudad2.innerHTML = ajax.responseText;
    };

    ajax.send();
});

ciudad2.addEventListener("change", function () {
    var ciudad = ciudad2.value;
    var ajax = new XMLHttpRequest();
    ajax.open('GET', './php/cargarparroquias.php?ciudad=' + encodeURIComponent(ciudad));

    ajax.onload = function () {
        parroquia2.innerHTML = ajax.responseText;
    };

    ajax.send();
});