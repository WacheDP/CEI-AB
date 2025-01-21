let fecha = document.getElementById("fecnac");
let pais = document.getElementById("pais");
let estado = document.getElementById("estado");
let municipio = document.getElementById("municipio");
let ciudad = document.getElementById("ciudad");
let parroquia = document.getElementById("parroquia");
let caja_validacion = document.getElementById("validacion");
let cedula = document.getElementById("CI");
let usuario = document.getElementById("usuario");
let correo = document.getElementById("correo");
let contraseña = document.getElementById("contraseña");
let verificacion = document.getElementById("verificacion");

const inputs = [fecha, cedula, usuario, correo, contraseña, verificacion];

inputs.forEach((input) => {
  input.addEventListener("input", () => {
    validar_registro(
      fecha.value,
      cedula.value,
      usuario.value,
      correo.value,
      contraseña.value,
      verificacion.value
    );
  });
});

function validar_registro(
  fecha,
  cedula,
  usuario,
  correo,
  contraseña,
  verificacion
) {
  let ajax = new XMLHttpRequest();
  let datos = `fecha=${encodeURIComponent(fecha)}&cedula=${encodeURIComponent(
    cedula
  )}&usuario=${encodeURIComponent(usuario)}&correo=${encodeURIComponent(
    correo
  )}&contraseña=${encodeURIComponent(
    contraseña
  )}&verificacion=${encodeURIComponent(verificacion)}`;

  ajax.open("POST", "./assets/ajax/validar_registrorepre.php");
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  ajax.onload = () => {
    caja_validacion.innerHTML = ajax.responseText;
  };

  ajax.send(datos);
}

function Cargar_Estados() {
  let datos = `id=${pais.value}`;
  ajax = new XMLHttpRequest();

  ajax.open("POST", "./assets/ajax/cargar_estados.php");
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

  ajax.open("POST", "./assets/ajax/cargar_municipios.php");
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

  ajax.open("POST", "./assets/ajax/cargar_ciudades.php");
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

  ajax.open("POST", "./assets/ajax/cargar_parroquias.php");
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  ajax.onload = () => {
    parroquia.innerHTML = ajax.responseText;
  };

  ajax.send(datos);
}
