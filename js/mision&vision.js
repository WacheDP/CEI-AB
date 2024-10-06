var contenedor = document.getElementById('contenedor_imagenes');
var textmision = document.getElementById('textmision');
var textvision = document.getElementById('textvision');
var imgmision = document.getElementById('imgmision');
var imgvision = document.getElementById('imgvision');

function Mostrar_Mision() {
    textmision.style.opacity = "1";
    textvision.style.opacity = "0";
    imgmision.style.display = "flex";
    imgvision.style.display = "none";
    contenedor.style.left = "53%";
};

function Mostrar_Vision() {
    textmision.style.opacity = "0";
    textvision.style.opacity = "1";
    imgmision.style.display = "none";
    imgvision.style.display = "flex";
    contenedor.style.left = "27%";
};