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
let foto = document.getElementById("foto");
let f1 = { cedula_escolar, fecha_nacimiento };
let caja_validacion_f1 = document.getElementById("validacion_f1");

foto.addEventListener("change", () => {
  const file = this.files[0];
  const extensiones = ["image/png", "image/jpg", "image/jpeg", "image/webp"];

  if (file && !extensiones.includes(file.type)) {
    alert(
      "Por favor, eliga un nuevo archivo de extension .png, .jpg, .jpeg o .webp"
    );
    this.value = "";
  }
});

convivencia.addEventListener("change", Misma_Direccion);
f1.forEach((f) => {
  f.addEventListener(
    "input",
    Validar_Fase1(1, cedula_escolar.value, fecha_nacimiento.value)
  );
});

Misma_Direccion();

function Validar_Fase1(fase, cedula, fecha) {
  let datos = `fase=${fase}&cedula=${cedula}&fecha=${fecha}`;
  let ajax = new XMLHttpRequest();

  ajax.open("POST", "../assets/ajax/validar_inscripcion.php");
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  ajax.onload = () => {
    caja_validacion_f1.innerHTML = ajax.responseText;
  };

  ajax.send(datos);
}

function Misma_Direccion() {
  if (convivencia.checked) {
    caja_direcciones.style.display = "none";
    const inputs = caja_direcciones.querySelectorAll("select, textarea");
    inputs.forEach((input) => {
      input.removeAttribute("required");
    });
  } else {
    caja_direcciones.style.display = "block";
    const inputs = caja_direcciones.querySelectorAll("select, textarea");
    inputs.forEach((input) => {
      input.setAttribute("required", "required");
    });
  }
}

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
