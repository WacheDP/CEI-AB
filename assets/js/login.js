let validation = document.getElementById("login-validation");
let password = document.getElementById("password");
let usuario = document.getElementById("ID");

usuario.addEventListener("input", () => {
  validar_login(usuario.value, password.value);
});
password.addEventListener("input", () => {
  validar_login(usuario.value, password.value);
});

function validar_login(id, clave) {
  let ajax = new XMLHttpRequest();
  let datos =
    "usuario=" +
    encodeURIComponent(id) +
    "&password=" +
    encodeURIComponent(clave);

  ajax.open("POST", "./assets/ajax/validar_login.php");
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  ajax.onload = () => {
    try {
      validation.innerHTML = ajax.responseText;
    } catch (e) {
      console.error("Error: ", e);
    }
  };

  ajax.send(datos);
}
