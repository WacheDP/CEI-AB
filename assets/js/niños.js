let buscador2 = document.getElementById("buscador2");
let resultado = document.getElementById("resultado");
let filtro = document.getElementById("filtro");

buscador2.addEventListener("submit", (e) => {
  e.preventDefault();
  Todos(1);
});

Todos(1);

function Alerta(codigo, niño) {
  let texto = "";
  let destino = "";
  let pagina = "todos_niños.php";

  switch (codigo) {
    case 1:
      texto =
        "Vas a retirar al niño de la institución, ¿Estas seguro de esta decisión?";
      destino = `../assets/php/retirar_niño.php?niño=${niño}&pagina=${pagina}`;
      break;

    case 2:
      texto =
        "Vas a borrar a un niño de manera permanente, ¿Estas seguro de esta decisión?";
      destino = `../assets/php/borrar_niño.php?niño=${niño}`;
      break;
  }

  let alerta = confirm(texto);
  if (alerta) {
    window.location.href = destino;
  }
}

function Todos(pos) {
  let datos = `pos=${pos}&filtro=${filtro.value}`;
  let ajax = new XMLHttpRequest();

  ajax.open("POST", "../assets/ajax/all_niños.php");
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  ajax.onload = () => {
    resultado.innerHTML = ajax.responseText;
  };

  ajax.send(datos);
}
