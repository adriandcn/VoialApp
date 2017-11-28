$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name=_token]').attr('content')}
});

// Guardar operador
$('#ErrorDiv').hide();
function saveOperadorData($formulario) {
    $("#spinnerSave").show();
    event.preventDefault();
    var $form = $('#' + $formulario),
            data = $form.serialize(),
            url = $form.attr("action");
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $('.rowerror').html(errorString);
            $('#ErrorDiv').fadeIn();
        }
        if (data.success) {
        	$('#ErrorDiv').fadeOut();
            showAlert('Registro correcto!','Presiona Aceptar para ir a la pagia de servicios',data.redirectto,'success','success');
        } //success
    });
}