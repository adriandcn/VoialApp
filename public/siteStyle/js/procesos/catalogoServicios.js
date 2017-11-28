$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name=_token]').attr('content')}
});

// Guardar operador
$('#ErrorDiv').hide();
function getSubcatCatalogServicios($idcatalogo) {
    event.preventDefault();
    var url = 'http://' + window.location.hostname + "/voialApp/public/catalogoServ/" + $idcatalogo;
    window.location = url;
}
