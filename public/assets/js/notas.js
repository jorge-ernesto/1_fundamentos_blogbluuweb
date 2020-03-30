function init() {
    mostrarForm(false);
}
init();

function mostrarForm(posta) {
    if (posta == true) {
        $('#listadoRegistros').hide();
        $('#formularioRegistros').show();        
    } else {
        $('#listadoRegistros').show();
        $('#formularioRegistros').hide();        
    }
}