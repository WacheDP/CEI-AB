//Selects
let pais = document.getElementById("pais");
let estado = document.getElementById("estado");
let municipio = document.getElementById("municipio");
let ciudad = document.getElementById("ciudad");
let parroquia = document.getElementById("parroquia");

//Convivencia y Direcciones
let convivencia = document.getElementById("convive");
let caja_direccion = document.getElementById("direcciones");

//Validaciones
let cedula_escolar = document.getElementById("ced-esc");
let fecha_nacimiento = document.getElementById("fecnac");
let caja_validacion = document.getElementById("validacion");

convivencia.addEventListener("change", Misma_Direccion);
cedula_escolar.addEventListener("input", Validar_Registro);
fecha_nacimiento.addEventListener("input", Validar_Registro);
document.getElementById("foto").addEventListener("change", () => {
  const file = this.files[0];
  const extensiones = ["image/png", "image/jpg", "image/jpeg", "image/webp"];

  if (file && !extensiones.includes(file.type)) {
    alert(
      "Por favor, eliga un nuevo archivo de extension .png, .jpg, .jpeg o .webp"
    );
    this.value = "";
  }
});

Misma_Direccion();

function Misma_Direccion() {
  if (convivencia.checked) {
    caja_direccion.style.display = "none";
    const inputs = caja_direccion.querySelectorAll("select, textarea");
    inputs.forEach((input) => {
      input.removeAttribute("required");
    });
  } else {
    caja_direccion.style.display = "block";
    const inputs = caja_direccion.querySelectorAll("select, textarea");
    inputs.forEach((input) => {
      input.setAttribute("required", "required");
    });
  }
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

function Validar_Registro() {
  let datos = `niño=${cedula_escolar.value}&nacimiento=${fecha_nacimiento.value}`;
  let ajax = new XMLHttpRequest();

  ajax.open("POST", "../assets/ajax/validar_niño.php");
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  ajax.onload = () => {
    caja_validacion.innerHTML = ajax.responseText;
  };

  ajax.send(datos);
}
