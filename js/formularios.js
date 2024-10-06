var formulario_representante = document.getElementById('formulario-representante');
var formulario_personal = document.getElementById('formulario-personal');
var caja_delantera = document.getElementById('caja-delantera');
var imagen_representante = document.getElementById('img-representante');
var boton_representante = document.getElementById('representante-btn');
var imagen_personal = document.getElementById('img-personal');
var boton_personal = document.getElementById('personal-btn');
var id_personal = document.getElementById('idperso');
var id_representante = document.getElementById('idrepre');

function Mostrar_Representante() {
    formulario_personal.style.opacity = "0";
    formulario_personal.style.pointerEvents = "none";
    formulario_representante.style.opacity = "1";
    formulario_representante.style.pointerEvents = "auto";
    id_personal.style.display = "none";
    imagen_personal.style.display = "none";
    boton_personal.style.display = "none";
    id_representante.style.display = "block";
    imagen_representante.style.display = "block";
    boton_representante.style.display = "block";
    caja_delantera.style.left = "55%";
};

function Mostrar_Personal() {
    formulario_representante.style.opacity = "0";
    formulario_representante.style.pointerEvents = "none";
    formulario_personal.style.opacity = "1";
    formulario_personal.style.pointerEvents = "auto";
    id_representante.style.display = "none";
    imagen_representante.style.display = "none";
    boton_representante.style.display = "none";
    id_personal.style.display = "block";
    imagen_personal.style.display = "block";
    boton_personal.style.display = "block";
    caja_delantera.style.left = "10%";
};