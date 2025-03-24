let niño = document.getElementById("niño");

function Inscribirse(id, grupo, seccion, turno) {
  let texto = `Quiere incribir al niño ${niño.value} en el grupo ${grupo} seccion ${seccion} en turno de ${turno}`;
  let alerta = confirm(texto);

  if (alerta) {
    window.location.href = `../assets/php/procesar_inscripcion.php?niño=${niño.value}&materia=${id}`;
  }
}
