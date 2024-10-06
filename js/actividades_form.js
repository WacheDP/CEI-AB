function Aumentar_Actividades(base) {

    switch (base) {
        case 2:
            document.getElementById('act-btn1').style.display = "none";
            document.getElementById('num-act2').style.display = "block";
            document.getElementById('div21').style.display = "flex";
            document.getElementById('time-btn21').style.display = "flex";
            document.getElementById('act-btn2').style.display = "flex";
            document.getElementById('act-btn3').style.display = "flex";
            break;

        case 3:
            document.getElementById('act-btn2').style.display = "none";
            document.getElementById('act-btn3').style.display = "none";
            document.getElementById('num-act3').style.display = "block";
            document.getElementById('div31').style.display = "flex";
            document.getElementById('time-btn31').style.display = "flex";
            document.getElementById('act-btn4').style.display = "flex";
            document.getElementById('act-btn5').style.display = "flex";
            break;

        case 4:
            document.getElementById('act-btn4').style.display = "none";
            document.getElementById('act-btn5').style.display = "none";
            document.getElementById('num-act4').style.display = "block";
            document.getElementById('div41').style.display = "flex";
            document.getElementById('time-btn41').style.display = "flex";
            document.getElementById('act-btn6').style.display = "flex";
            document.getElementById('act-btn7').style.display = "flex";
            break;

        case 5:
            document.getElementById('act-btn6').style.display = "none";
            document.getElementById('act-btn7').style.display = "none";
            document.getElementById('num-act5').style.display = "block";
            document.getElementById('div51').style.display = "flex";
            document.getElementById('time-btn51').style.display = "flex";
            document.getElementById('act-btn8').style.display = "flex";
            break;
    };

};

function Quitar_Actividades(base) {

    switch (base) {
        case 1:
            document.getElementById('num-act2').style.display = "none";
            document.getElementById('act-btn2').style.display = "none";
            document.getElementById('act-btn3').style.display = "none";
            document.getElementById('act-btn1').style.display = "flex";
            break;

        case 2:
            document.getElementById('num-act3').style.display = "none";
            document.getElementById('div31').style.display = "none";
            document.getElementById('time-btn31').style.display = "none";
            document.getElementById('act-btn4').style.display = "none";
            document.getElementById('act-btn5').style.display = "none";
            document.getElementById('act-btn2').style.display = "flex";
            document.getElementById('act-btn3').style.display = "flex";
            break;

        case 3:
            document.getElementById('num-act4').style.display = "none";
            document.getElementById('div41').style.display = "none";
            document.getElementById('time-btn41').style.display = "none";
            document.getElementById('act-btn6').style.display = "none";
            document.getElementById('act-btn7').style.display = "none";
            document.getElementById('act-btn4').style.display = "flex";
            document.getElementById('act-btn5').style.display = "flex";
            break;

        case 4:
            document.getElementById('num-act5').style.display = "none";
            document.getElementById('div51').style.display = "none";
            document.getElementById('time-btn51').style.display = "none";
            document.getElementById('act-btn8').style.display = "none";
            document.getElementById('act-btn6').style.display = "flex";
            document.getElementById('act-btn7').style.display = "flex";
            break;
    };

};

function Aumentar_Fechas(tipo, base) {

    switch (tipo) {
        case 1:
            switch (base) {
                case 2:
                    document.getElementById('time-btn11').style.display = "none";
                    document.getElementById('div12').style.display = "flex";
                    document.getElementById('time-btn12').style.display = "flex";
                    document.getElementById('time-btn13').style.display = "flex";
                    break;

                case 3:
                    document.getElementById('time-btn12').style.display = "none";
                    document.getElementById('time-btn13').style.display = "none";
                    document.getElementById('div13').style.display = "flex";
                    document.getElementById('time-btn14').style.display = "flex";
                    document.getElementById('time-btn15').style.display = "flex";
                    break;

                case 4:
                    document.getElementById('time-btn14').style.display = "none";
                    document.getElementById('time-btn15').style.display = "none";
                    document.getElementById('div14').style.display = "flex";
                    document.getElementById('time-btn16').style.display = "flex";
                    document.getElementById('time-btn17').style.display = "flex";
                    break;

                case 5:
                    document.getElementById('time-btn16').style.display = "none";
                    document.getElementById('time-btn17').style.display = "none";
                    document.getElementById('div15').style.display = "flex";
                    document.getElementById('time-btn18').style.display = "flex";
                    break;
            };
            break;

        case 2:
            switch (base) {
                case 2:
                    document.getElementById('time-btn21').style.display = "none";
                    document.getElementById('div22').style.display = "flex";
                    document.getElementById('time-btn22').style.display = "flex";
                    document.getElementById('time-btn23').style.display = "flex";
                    break;

                case 3:
                    document.getElementById('time-btn22').style.display = "none";
                    document.getElementById('time-btn23').style.display = "none";
                    document.getElementById('div23').style.display = "flex";
                    document.getElementById('time-btn24').style.display = "flex";
                    document.getElementById('time-btn25').style.display = "flex";
                    break;

                case 4:
                    document.getElementById('time-btn24').style.display = "none";
                    document.getElementById('time-btn25').style.display = "none";
                    document.getElementById('div24').style.display = "flex";
                    document.getElementById('time-btn26').style.display = "flex";
                    document.getElementById('time-btn27').style.display = "flex";
                    break;

                case 5:
                    document.getElementById('time-btn26').style.display = "none";
                    document.getElementById('time-btn27').style.display = "none";
                    document.getElementById('div25').style.display = "flex";
                    document.getElementById('time-btn28').style.display = "flex";
                    break;
            };
            break;

        case 3:
            switch (base) {
                case 2:
                    document.getElementById('time-btn31').style.display = "none";
                    document.getElementById('div32').style.display = "flex";
                    document.getElementById('time-btn32').style.display = "flex";
                    document.getElementById('time-btn33').style.display = "flex";
                    break;

                case 3:
                    document.getElementById('time-btn32').style.display = "none";
                    document.getElementById('time-btn33').style.display = "none";
                    document.getElementById('div33').style.display = "flex";
                    document.getElementById('time-btn34').style.display = "flex";
                    document.getElementById('time-btn35').style.display = "flex";
                    break;

                case 4:
                    document.getElementById('time-btn34').style.display = "none";
                    document.getElementById('time-btn35').style.display = "none";
                    document.getElementById('div34').style.display = "flex";
                    document.getElementById('time-btn36').style.display = "flex";
                    document.getElementById('time-btn37').style.display = "flex";
                    break;

                case 5:
                    document.getElementById('time-btn36').style.display = "none";
                    document.getElementById('time-btn37').style.display = "none";
                    document.getElementById('div35').style.display = "flex";
                    document.getElementById('time-btn38').style.display = "flex";
                    break;
            };
            break;

        case 4:
            switch (base) {
                case 2:
                    document.getElementById('time-btn41').style.display = "none";
                    document.getElementById('div42').style.display = "flex";
                    document.getElementById('time-btn42').style.display = "flex";
                    document.getElementById('time-btn43').style.display = "flex";
                    break;

                case 3:
                    document.getElementById('time-btn42').style.display = "none";
                    document.getElementById('time-btn43').style.display = "none";
                    document.getElementById('div43').style.display = "flex";
                    document.getElementById('time-btn44').style.display = "flex";
                    document.getElementById('time-btn45').style.display = "flex";
                    break;

                case 4:
                    document.getElementById('time-btn44').style.display = "none";
                    document.getElementById('time-btn45').style.display = "none";
                    document.getElementById('div44').style.display = "flex";
                    document.getElementById('time-btn46').style.display = "flex";
                    document.getElementById('time-btn47').style.display = "flex";
                    break;

                case 5:
                    document.getElementById('time-btn46').style.display = "none";
                    document.getElementById('time-btn47').style.display = "none";
                    document.getElementById('div45').style.display = "flex";
                    document.getElementById('time-btn48').style.display = "flex";
                    break;
            };
            break;

        case 5:
            switch (base) {
                case 2:
                    document.getElementById('time-btn51').style.display = "none";
                    document.getElementById('div52').style.display = "flex";
                    document.getElementById('time-btn52').style.display = "flex";
                    document.getElementById('time-btn53').style.display = "flex";
                    break;

                case 3:
                    document.getElementById('time-btn52').style.display = "none";
                    document.getElementById('time-btn53').style.display = "none";
                    document.getElementById('div53').style.display = "flex";
                    document.getElementById('time-btn54').style.display = "flex";
                    document.getElementById('time-btn55').style.display = "flex";
                    break;

                case 4:
                    document.getElementById('time-btn54').style.display = "none";
                    document.getElementById('time-btn55').style.display = "none";
                    document.getElementById('div54').style.display = "flex";
                    document.getElementById('time-btn56').style.display = "flex";
                    document.getElementById('time-btn57').style.display = "flex";
                    break;

                case 5:
                    document.getElementById('time-btn56').style.display = "none";
                    document.getElementById('time-btn57').style.display = "none";
                    document.getElementById('div55').style.display = "flex";
                    document.getElementById('time-btn58').style.display = "flex";
                    break;
            };
            break;
    };

};

function Quitar_Fechas(tipo, base) {

    switch (tipo) {
        case 1:
            switch (base) {
                case 1:
                    document.getElementById('time-btn12').style.display = "none";
                    document.getElementById('time-btn13').style.display = "none";
                    document.getElementById('div12').style.display = "none";
                    document.getElementById('time-btn11').style.display = "flex";
                    break;

                case 2:
                    document.getElementById('time-btn14').style.display = "none";
                    document.getElementById('time-btn15').style.display = "none";
                    document.getElementById('div13').style.display = "none";
                    document.getElementById('time-btn12').style.display = "flex";
                    document.getElementById('time-btn13').style.display = "flex";
                    break;

                case 3:
                    document.getElementById('time-btn16').style.display = "none";
                    document.getElementById('time-btn17').style.display = "none";
                    document.getElementById('div14').style.display = "none";
                    document.getElementById('time-btn14').style.display = "flex";
                    document.getElementById('time-btn15').style.display = "flex";
                    break;

                case 4:
                    document.getElementById('time-btn18').style.display = "none";
                    document.getElementById('div15').style.display = "none";
                    document.getElementById('time-btn16').style.display = "flex";
                    document.getElementById('time-btn17').style.display = "flex";
                    break;
            };
            break;

        case 2:
            switch (base) {
                case 1:
                    document.getElementById('time-btn22').style.display = "none";
                    document.getElementById('time-btn23').style.display = "none";
                    document.getElementById('div22').style.display = "none";
                    document.getElementById('time-btn21').style.display = "flex";
                    break;

                case 2:
                    document.getElementById('time-btn24').style.display = "none";
                    document.getElementById('time-btn25').style.display = "none";
                    document.getElementById('div23').style.display = "none";
                    document.getElementById('time-btn22').style.display = "flex";
                    document.getElementById('time-btn23').style.display = "flex";
                    break;

                case 3:
                    document.getElementById('time-btn26').style.display = "none";
                    document.getElementById('time-btn27').style.display = "none";
                    document.getElementById('div24').style.display = "none";
                    document.getElementById('time-btn24').style.display = "flex";
                    document.getElementById('time-btn25').style.display = "flex";
                    break;

                case 4:
                    document.getElementById('time-btn28').style.display = "none";
                    document.getElementById('div25').style.display = "none";
                    document.getElementById('time-btn26').style.display = "flex";
                    document.getElementById('time-btn27').style.display = "flex";
                    break;
            };
            break;

        case 3:
            switch (base) {
                case 1:
                    document.getElementById('time-btn32').style.display = "none";
                    document.getElementById('time-btn33').style.display = "none";
                    document.getElementById('div32').style.display = "none";
                    document.getElementById('time-btn31').style.display = "flex";
                    break;

                case 2:
                    document.getElementById('time-btn34').style.display = "none";
                    document.getElementById('time-btn35').style.display = "none";
                    document.getElementById('div33').style.display = "none";
                    document.getElementById('time-btn32').style.display = "flex";
                    document.getElementById('time-btn33').style.display = "flex";
                    break;

                case 3:
                    document.getElementById('time-btn36').style.display = "none";
                    document.getElementById('time-btn37').style.display = "none";
                    document.getElementById('div34').style.display = "none";
                    document.getElementById('time-btn34').style.display = "flex";
                    document.getElementById('time-btn35').style.display = "flex";
                    break;

                case 4:
                    document.getElementById('time-btn38').style.display = "none";
                    document.getElementById('div35').style.display = "none";
                    document.getElementById('time-btn36').style.display = "flex";
                    document.getElementById('time-btn37').style.display = "flex";
                    break;
            };
            break;

        case 4:
            switch (base) {
                case 1:
                    document.getElementById('time-btn42').style.display = "none";
                    document.getElementById('time-btn43').style.display = "none";
                    document.getElementById('div42').style.display = "none";
                    document.getElementById('time-btn41').style.display = "flex";
                    break;

                case 2:
                    document.getElementById('time-btn44').style.display = "none";
                    document.getElementById('time-btn45').style.display = "none";
                    document.getElementById('div43').style.display = "none";
                    document.getElementById('time-btn42').style.display = "flex";
                    document.getElementById('time-btn43').style.display = "flex";
                    break;

                case 3:
                    document.getElementById('time-btn46').style.display = "none";
                    document.getElementById('time-btn47').style.display = "none";
                    document.getElementById('div44').style.display = "none";
                    document.getElementById('time-btn44').style.display = "flex";
                    document.getElementById('time-btn45').style.display = "flex";
                    break;

                case 4:
                    document.getElementById('time-btn48').style.display = "none";
                    document.getElementById('div45').style.display = "none";
                    document.getElementById('time-btn46').style.display = "flex";
                    document.getElementById('time-btn47').style.display = "flex";
                    break;
            };
            break;

        case 5:
            switch (base) {
                case 1:
                    document.getElementById('time-btn52').style.display = "none";
                    document.getElementById('time-btn53').style.display = "none";
                    document.getElementById('div52').style.display = "none";
                    document.getElementById('time-btn51').style.display = "flex";
                    break;

                case 2:
                    document.getElementById('time-btn54').style.display = "none";
                    document.getElementById('time-btn55').style.display = "none";
                    document.getElementById('div53').style.display = "none";
                    document.getElementById('time-btn52').style.display = "flex";
                    document.getElementById('time-btn53').style.display = "flex";
                    break;

                case 3:
                    document.getElementById('time-btn56').style.display = "none";
                    document.getElementById('time-btn57').style.display = "none";
                    document.getElementById('div54').style.display = "none";
                    document.getElementById('time-btn54').style.display = "flex";
                    document.getElementById('time-btn55').style.display = "flex";
                    break;

                case 4:
                    document.getElementById('time-btn58').style.display = "none";
                    document.getElementById('div55').style.display = "none";
                    document.getElementById('time-btn56').style.display = "flex";
                    document.getElementById('time-btn57').style.display = "flex";
                    break;
            };
            break;
    };

};