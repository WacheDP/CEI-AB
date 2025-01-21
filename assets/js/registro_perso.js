let cedula = document.getElementById("CI");
let usuario = document.getElementById("usuario");
let correo = document.getElementById("correo");
let nacimiento = document.getElementById("fecnac");
let pais = document.getElementById("pais");
let estado = document.getElementById("estado");
let municipio = document.getElementById("municipio");
let ciudad = document.getElementById("ciudad");
let parroquia = document.getElementById("parroquia");
let validacion = document.getElementById("validacion");

const inputs = [cedula, usuario, correo, nacimiento];

inputs.forEach((input) => {
  input.addEventListener("input", () => {
    Validar_Formulario(
      cedula.value,
      usuario.value,
      correo.value,
      nacimiento.value
    );
  });
});

function Validar_Formulario(cedula, usuario, correo, nacimiento) {
  let datos = `cedula=${cedula}&usuario=${usuario}&correo=${correo}&nacimiento=${nacimiento}`;
  let ajax = new XMLHttpRequest();

  ajax.open("POST", "../assets/ajax/validar_registroperso.php");
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  ajax.onload = () => {
    validacion.innerHTML = ajax.responseText;
  };

  ajax.send(datos);
}

function Cargar_Estados() {
  let datos = `id=${pais.value}`;
  let ajax = new XMLHttpRequest();

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
  let ajax = new XMLHttpRequest();

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
  let ajax = new XMLHttpRequest();

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
  let ajax = new XMLHttpRequest();

  ajax.open("POST", "../assets/ajax/cargar_parroquias.php");
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  ajax.onload = () => {
    parroquia.innerHTML = ajax.responseText;
  };

  ajax.send(datos);
}
