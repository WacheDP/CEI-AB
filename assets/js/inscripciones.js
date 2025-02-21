//Los selects
let pais = document.getElementById("pais");
let estado = document.getElementById("estado");
let municipio = document.getElementById("municipio");
let ciudad = document.getElementById("ciudad");
let parroquia = document.getElementById("parroquia");

//Direcciones
let convivencia = document.getElementById("convive");
let caja_direcciones = document.getElementById("direcciones");

//Validaciones
let cedula_escolar = document.getElementById("ced-esc");
let fecha_nacimiento = document.getElementById("fecnac");
let caja_validacion = document.getElementById("validacion");

function Cargar_Estados() {
  let datos = `id=${pais.value}`;
  ajax = new XMLHttpRequest();

  ajax.open("POST", "../assets/ajax/cargar_estados.php");
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  ajax.onload = () => {
    let respuesta = JSON.parse(ajax.responseText);
    estado.innerHTML = respuesta.estado;
    municipio.innerHTML = respuesta.municipio;
    ciudad.innerHTML = respuesta.ciudad;
    parroquia.innerHTML = respuesta.parroquia;
  };

  ajax.send(datos);
}

function Cargar_Municipios() {
  let datos = `id=${estado.value}`;
  ajax = new XMLHttpRequest();

  ajax.open("POST", "../assets/ajax/cargar_municipios.php");
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  ajax.onload = () => {
    let respuesta = JSON.parse(ajax.responseText);
    municipio.innerHTML = respuesta.municipio;
    ciudad.innerHTML = respuesta.ciudad;
    parroquia.innerHTML = respuesta.parroquia;
  };

  ajax.send(datos);
}

function Cargar_Ciudades() {
  let datos = `id=${municipio.value}`;
  ajax = new XMLHttpRequest();

  ajax.open("POST", "../assets/ajax/cargar_ciudades.php");
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  ajax.onload = () => {
    let respuesta = JSON.parse(ajax.responseText);
    ciudad.innerHTML = respuesta.ciudad;
    parroquia.innerHTML = respuesta.parroquia;
  };

  ajax.send(datos);
}

function Cargar_Parroquias() {
  let datos = `id=${ciudad.value}`;
  ajax = new XMLHttpRequest();

  ajax.open("POST", "../assets/ajax/cargar_parroquias.php");
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  ajax.onload = () => {
    parroquia.innerHTML = ajax.responseText;
  };

  ajax.send(datos);
}
