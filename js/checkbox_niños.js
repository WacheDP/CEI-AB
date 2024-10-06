var checkbox = document.getElementById('convivencia');
var selects = document.querySelectorAll('select.cambio');
var textarea = document.getElementById('dir');

checkbox.addEventListener("change", function () {

    if (checkbox.checked) {
        textarea.classList.remove('no-null');
        textarea.classList.add('null');
        textarea.required = !checkbox.checked;

        for (var i = 0; i < selects.length; i++) {
            selects[i].classList.remove('no-null');
            selects[i].classList.add('null');
            selects[i].required = !checkbox.checked;
        };
    }
    else {
        textarea.classList.remove('null');
        textarea.classList.add('no-null');
        textarea.required = !checkbox.checked;

        for (var i = 0; i < selects.length; i++) {
            selects[i].classList.remove('null');
            selects[i].classList.add('no-null');
            selects[i].required = !checkbox.checked;
        };
    };
})