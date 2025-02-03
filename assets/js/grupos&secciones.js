let turnoSelect = document.getElementById("turno");
let ValorOculto = document.getElementById("añoescolar");
let gruposDiv = document.getElementById("grupos");
let cajaValidar = document.getElementById("validacion");
let prof1 = document.getElementById("docente1");
let prof2 = document.getElementById("docente2");
let prof3 = document.getElementById("docente3");

const selects = [prof1, prof2, prof3];

selects.forEach((input) => {
  input.addEventListener("change", () => {
    Validar_Profesores(
      ValorOculto.value,
      prof1.value,
      prof2.value,
      prof3.value
    );
  });
});

function SeleccionarTurno() {
  Obtener_Grupos(ValorOculto.value, turnoSelect.value);
}

function Obtener_Grupos(periodo, turno) {
  let datos = `periodo=${periodo}&turno=${turno}`;
  let ajax = new XMLHttpRequest();

  ajax.open("POST", "../assets/ajax/cargar_grupos.php");
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  ajax.onload = () => {
    gruposDiv.innerHTML = ajax.responseText;
  };

  ajax.send(datos);
}

function Validar_Profesores(periodo, doc1, doc2, doc3) {
  let datos = `docente1=${doc1}&docente2=${doc2}&docente3=${doc3}&añoescolar=${periodo}`;
  let ajax = new XMLHttpRequest();

  ajax.open("POST", "../assets/ajax/validar_docentes.php");
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  ajax.onload = () => {
    cajaValidar.innerHTML = ajax.responseText;
  };

  ajax.send(datos);
}
