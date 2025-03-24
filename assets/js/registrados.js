let formulario = document.getElementById("buscador1");
let cedula = document.getElementById("cedula");
let busqueda = document.getElementById("filtro");
let resultado = document.getElementById("resultado");

formulario.addEventListener("submit", (e) => {
  e.preventDefault();
  Tuyos(1);
});

Tuyos(1);

function Alerta(niño) {
  let pagina = "tus_niños.php";

  let alerta = confirm(
    "Vas a retirar al niño de la institución, ¿Estas seguro de esta decisión?"
  );
  if (alerta) {
    window.location.href = `../assets/php/retirar_niño.php?niño=${niño}&pagina=${pagina}`;
  }
}

function Tuyos(pos) {
  let datos = `pos=${pos}&filtro=${busqueda.value}&cedula=${cedula.value}`;
  let ajax = new XMLHttpRequest();

  ajax.open("POST", "../assets/ajax/own_niños.php");
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  ajax.onload = () => {
    resultado.innerHTML = ajax.responseText;
  };

  ajax.send(datos);
}
