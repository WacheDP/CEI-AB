var Sebo1 = false;
var Sebo2 = false;

function Activar(bandera) {
    var info = document.getElementsByClassName('info');
    var login = document.getElementsByClassName('login');

    switch (bandera) {
        case 1:
            Sebo1 = !Sebo1;
            Sebo2 = false;
            break;

        case 2:
            Sebo2 = !Sebo2;
            Sebo1 = false;
            break;
    };

    if (Sebo1) {
        for (var i = 0; i < info.length; i++) {
            info[i].style.display = "flex";
        };
    }
    else {
        for (var i = 0; i < info.length; i++) {
            info[i].style.display = "none";
        };
    };

    if (Sebo2) {
        for (var i = 0; i < login.length; i++) {
            login[i].style.display = "flex";
        };
    }
    else {
        for (var i = 0; i < login.length; i++) {
            login[i].style.display = "none";
        };
    };
};