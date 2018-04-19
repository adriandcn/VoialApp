$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name=_token]').attr('content')}
});
var dirServer = $('#serverDir').val();
// Guardar operador
$('#ErrorDiv').hide();
function getSubcatCatalogServicios($idcatalogo) {
    event.preventDefault();
    var url = dirServer + "public/catalogo-de-servicios/" + $idcatalogo;
    window.location = url;
}
