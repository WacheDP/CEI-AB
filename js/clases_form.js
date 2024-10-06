var contenedor2 = document.getElementById('plan2');
var contenedor3 = document.getElementById('plan3');
var contenedor4 = document.getElementById('plan4');
var boton1 = document.getElementById('class-btn1');
var boton2 = document.getElementById('class-btn2');
var boton3 = document.getElementById('class-btn3');
var boton4 = document.getElementById('class-btn4');
var boton5 = document.getElementById('class-btn5');
var boton6 = document.getElementById('class-btn6');
var input12 = document.getElementById('profes12');
var input22 = document.getElementById('profes22');
var input32 = document.getElementById('profes32');
var input42 = document.getElementById('profes42');
var btn11 = document.getElementById('prof-btn11');
var btn12 = document.getElementById('prof-btn12');
var btn21 = document.getElementById('prof-btn21');
var btn22 = document.getElementById('prof-btn22');
var btn31 = document.getElementById('prof-btn31');
var btn32 = document.getElementById('prof-btn32');
var btn41 = document.getElementById('prof-btn41');
var btn42 = document.getElementById('prof-btn42');

function Aumentar_Planes(valor) {

    switch (valor) {
        case 2:
            contenedor2.style.display = "block";
            boton1.style.display = "none";
            boton2.style.display = "flex";
            boton3.style.display = "flex";
            break;

        case 3:
            contenedor3.style.display = "block";
            boton2.style.display = "none";
            boton3.style.display = "none";
            boton4.style.display = "flex";
            boton5.style.display = "flex";
            break;

        case 4:
            boton4.style.display = "none";
            boton5.style.display = "none";
            contenedor4.style.display = "block";
            boton6.style.display = "flex";
            break;
    };

};

function Quitar_Planes(valor) {

    switch (valor) {
        case 3:
            contenedor4.style.display = "none";
            boton6.style.display = "none";
            boton4.style.display = "flex";
            boton5.style.display = "flex";
            break;

        case 2:
            contenedor3.style.display = "none";
            boton4.style.display = "none";
            boton5.style.display = "none";
            boton3.style.display = "flex";
            boton2.style.display = "flex";
            break;

        case 1:
            contenedor2.style.display = "none";
            boton3.style.display = "none";
            boton2.style.display = "none";
            boton1.style.display = "flex";
            break;
    };

};

function Aumentar_Profesores(señal) {

    switch (señal) {
        case 1:
            input12.style.display = "block";
            btn11.style.display = "none";
            btn12.style.display = "flex";
            break;

        case 2:
            input22.style.display = "block";
            btn21.style.display = "none";
            btn22.style.display = "flex";
            break;

        case 3:
            input32.style.display = "block";
            btn31.style.display = "none";
            btn32.style.display = "flex";
            break;

        case 4:
            input42.style.display = "block";
            btn41.style.display = "none";
            btn42.style.display = "flex";
            break;
    };

};

function Quitar_Profesores(señal) {

    switch (señal) {
        case 1:
            input12.style.display = "none";
            btn11.style.display = "flex";
            btn12.style.display = "none";
            break;

        case 2:
            input22.style.display = "none";
            btn21.style.display = "flex";
            btn22.style.display = "none";
            break;

        case 3:
            input32.style.display = "none";
            btn31.style.display = "flex";
            btn32.style.display = "none";
            break;

        case 4:
            input42.style.display = "none";
            btn41.style.display = "flex";
            btn42.style.display = "none";
            break;
    };

};