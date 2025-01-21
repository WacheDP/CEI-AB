let inicio1 = document.getElementById("inicio");
let final1 = document.getElementById("final");
let inicio2 = document.getElementById("inicio2");
let final2 = document.getElementById("final2");
let creacion = document.getElementById("creacion");
let edicion = document.getElementById("edicion");

inicio1.addEventListener("input", () => {
  Validar_Creacion(inicio1.value, final1.value);
});

final1.addEventListener("input", () => {
  Validar_Creacion(inicio1.value, final1.value);
});

inicio2.addEventListener("input", () => {
  Validar_Edicion(inicio2.value, final1.value);
});

final2.addEventListener("input", () => {
  Validar_Edicion(inicio2.value, final1.value);
});

function Validar_Creacion(inicio, final) {
  let datos = `inicio=${inicio}&final=${final}`;
  let ajax = new XMLHttpRequest();

  ajax.open("POST", "../assets/ajax/creacion_añoesc.php");
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  ajax.onload = () => {
    creacion.innerHTML = ajax.responseText;
  };

  ajax.send(datos);
}

function Validar_Edicion(inicio, final) {
  let datos = `inicio=${inicio}&final=${final}`;
  let ajax = new XMLHttpRequest();

  ajax.open("POST", "../assets/ajax/edicion_añoesc.php");
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  ajax.onload = () => {
    edicion.innerHTML = ajax.responseText;
  };

  ajax.send(datos);
}
