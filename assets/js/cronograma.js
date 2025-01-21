let act1 = document.getElementById("act1");
let act2 = document.getElementById("act2");
let act3 = document.getElementById("act3");
let act4 = document.getElementById("act4");
let parte1 = document.getElementById("parte1");
let parte2 = document.getElementById("parte2");
let parte3 = document.getElementById("parte3");
let date11 = document.getElementById("date1-1");
let date12 = document.getElementById("date1-2");
let date13 = document.getElementById("date1-3");
let date14 = document.getElementById("date1-4");
let date15 = document.getElementById("date1-5");
let date21 = document.getElementById("date2-1");
let date22 = document.getElementById("date2-2");
let date23 = document.getElementById("date2-3");
let date24 = document.getElementById("date2-4");
let date25 = document.getElementById("date2-5");
let date31 = document.getElementById("date3-1");
let date32 = document.getElementById("date3-2");
let date33 = document.getElementById("date3-3");
let date34 = document.getElementById("date3-4");
let date35 = document.getElementById("date3-5");
let btn11 = document.getElementById("btn1-1");
let btn12 = document.getElementById("btn1-2");
let btn13 = document.getElementById("btn1-3");
let btn14 = document.getElementById("btn1-4");
let btn15 = document.getElementById("btn1-5");
let btn16 = document.getElementById("btn1-6");
let btn17 = document.getElementById("btn1-7");
let btn18 = document.getElementById("btn1-8");
let btn21 = document.getElementById("btn2-1");
let btn22 = document.getElementById("btn2-2");
let btn23 = document.getElementById("btn2-3");
let btn24 = document.getElementById("btn2-4");
let btn25 = document.getElementById("btn2-5");
let btn26 = document.getElementById("btn2-6");
let btn27 = document.getElementById("btn2-7");
let btn28 = document.getElementById("btn2-8");
let btn31 = document.getElementById("btn3-1");
let btn32 = document.getElementById("btn3-2");
let btn33 = document.getElementById("btn3-3");
let btn34 = document.getElementById("btn3-4");
let btn35 = document.getElementById("btn3-5");
let btn36 = document.getElementById("btn3-6");
let btn37 = document.getElementById("btn3-7");
let btn38 = document.getElementById("btn3-8");

function Aumentar_Fechas(tipo, base) {
  switch (tipo) {
    case 1:
      switch (base) {
        case 2:
          btn11.style.display = "none";
          date12.style.display = "flex";
          btn12.style.display = "inline-block";
          btn13.style.display = "inline-block";
          break;

        case 3:
          btn12.style.display = "none";
          btn13.style.display = "none";
          date13.style.display = "flex";
          btn14.style.display = "inline-block";
          btn15.style.display = "inline-block";
          break;

        case 4:
          btn14.style.display = "none";
          btn15.style.display = "none";
          date14.style.display = "flex";
          btn16.style.display = "inline-block";
          btn17.style.display = "inline-block";
          break;

        case 5:
          btn16.style.display = "none";
          btn17.style.display = "none";
          date15.style.display = "flex";
          btn18.style.display = "inline-block";
          break;
      }
      break;

    case 2:
      switch (base) {
        case 2:
          btn21.style.display = "none";
          date22.style.display = "flex";
          btn22.style.display = "inline-block";
          btn23.style.display = "inline-block";
          break;

        case 3:
          btn22.style.display = "none";
          btn23.style.display = "none";
          date23.style.display = "flex";
          btn24.style.display = "inline-block";
          btn25.style.display = "inline-block";
          break;

        case 4:
          btn24.style.display = "none";
          btn25.style.display = "none";
          date24.style.display = "flex";
          btn26.style.display = "inline-block";
          btn27.style.display = "inline-block";
          break;

        case 5:
          btn26.style.display = "none";
          btn27.style.display = "none";
          date25.style.display = "flex";
          btn28.style.display = "inline-block";
          break;
      }
      break;

    case 3:
      switch (base) {
        case 2:
          btn31.style.display = "none";
          date32.style.display = "flex";
          btn32.style.display = "inline-block";
          btn33.style.display = "inline-block";
          break;

        case 3:
          btn32.style.display = "none";
          btn33.style.display = "none";
          date33.style.display = "flex";
          btn34.style.display = "inline-block";
          btn35.style.display = "inline-block";
          break;

        case 4:
          btn34.style.display = "none";
          btn35.style.display = "none";
          date34.style.display = "flex";
          btn36.style.display = "inline-block";
          btn37.style.display = "inline-block";
          break;

        case 5:
          btn36.style.display = "none";
          btn37.style.display = "none";
          date35.style.display = "flex";
          btn38.style.display = "inline-block";
          break;
      }
      break;
  }
}

function Quitar_Fechas(tipo, base) {
  switch (tipo) {
    case 1:
      switch (base) {
        case 1:
          btn12.style.display = "none";
          btn13.style.display = "none";
          date12.style.display = "none";
          btn11.style.display = "inline-block";
          break;

        case 2:
          date13.style.display = "none";
          btn14.style.display = "none";
          btn15.style.display = "none";
          btn12.style.display = "inline-block";
          btn13.style.display = "inline-block";
          break;

        case 3:
          date14.style.display = "none";
          btn16.style.display = "none";
          btn17.style.display = "none";
          btn14.style.display = "inline-block";
          btn15.style.display = "inline-block";
          break;

        case 4:
          date15.style.display = "none";
          btn18.style.display = "none";
          btn16.style.display = "inline-block";
          btn17.style.display = "inline-block";
          break;
      }
      break;

    case 2:
      switch (base) {
        case 1:
          btn22.style.display = "none";
          btn23.style.display = "none";
          date22.style.display = "none";
          btn21.style.display = "inline-block";
          break;

        case 2:
          date23.style.display = "none";
          btn24.style.display = "none";
          btn25.style.display = "none";
          btn22.style.display = "inline-block";
          btn23.style.display = "inline-block";
          break;

        case 3:
          date24.style.display = "none";
          btn26.style.display = "none";
          btn27.style.display = "none";
          btn24.style.display = "inline-block";
          btn25.style.display = "inline-block";
          break;

        case 4:
          date25.style.display = "none";
          btn28.style.display = "none";
          btn26.style.display = "inline-block";
          btn27.style.display = "inline-block";
          break;
      }
      break;

    case 3:
      switch (base) {
        case 1:
          btn32.style.display = "none";
          btn33.style.display = "none";
          date32.style.display = "none";
          btn31.style.display = "inline-block";
          break;

        case 2:
          date33.style.display = "none";
          btn34.style.display = "none";
          btn35.style.display = "none";
          btn32.style.display = "inline-block";
          btn33.style.display = "inline-block";
          break;

        case 3:
          date34.style.display = "none";
          btn36.style.display = "none";
          btn37.style.display = "none";
          btn34.style.display = "inline-block";
          btn35.style.display = "inline-block";
          break;

        case 4:
          date35.style.display = "none";
          btn38.style.display = "none";
          btn36.style.display = "inline-block";
          btn37.style.display = "inline-block";
          break;
      }
      break;
  }
}

function Aumentar_Actividades(base) {
  switch (base) {
    case 2:
      parte2.style.display = "block";
      act1.style.display = "none";
      act2.style.display = "inline-block";
      act3.style.display = "inline-block";
      break;

    case 3:
      parte3.style.display = "block";
      act2.style.display = "none";
      act3.style.display = "none";
      act4.style.display = "inline-block";
      break;
  }
}

function Quitar_Actividades(base) {
  switch (base) {
    case 1:
      parte2.style.display = "none";
      act2.style.display = "none";
      act3.style.display = "none";
      act1.style.display = "inline-block";
      break;

    case 2:
      parte3.style.display = "none";
      act4.style.display = "none";
      act2.style.display = "inline-block";
      act3.style.display = "inline-block";
      break;
  }
}
