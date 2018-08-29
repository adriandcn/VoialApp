$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name=_token]').attr('content')
    }
});

var dirServer = $('#serverDir').val();
$('#restoreForm').hide();
$('#spinnerMoveServ').hide();

$.fn.blockInput = function(options) {
    // find inserted or removed characters
    function findDelta(value, prevValue) {
        var delta = '';

        for (var i = 0; i < value.length; i++) {
            var str = value.substr(0, i) +
                value.substr(i + value.length - prevValue.length);

            if (str === prevValue) delta =
                value.substr(i, value.length - prevValue.length);
        }

        return delta;
    }

    function isValidChar(c) {
        return new RegExp(options.regex).test(c);
    }

    function isValidString(str) {
        for (var i = 0; i < str.length; i++)
            if (!isValidChar(str.substr(i, 1))) return false;

        return true;
    }

    this.filter('input,textarea').on('input', function() {
        var val = this.value,
            lastVal = $(this).data('lastVal');

        // get inserted chars
        var inserted = findDelta(val, lastVal);
        // get removed chars
        var removed = findDelta(lastVal, val);
        // determine if user pasted content
        var pasted = inserted.length > 1 || (!inserted && !removed);

        if (pasted) {
            if (!isValidString(val)) this.value = lastVal;
        } else if (!removed) {
            if (!isValidChar(inserted)) this.value = lastVal;
        }

        // store current value as last value
        $(this).data('lastVal', this.value);
    }).on('focus', function() {
        $(this).data('lastVal', this.value);
    });

    return this;
};

$(".numsOnly").blockInput({ regex: '[0-9A-Z/]' });

function AjaxContainerRegistro($formulario) {
    $("#spinnerSave").show();

    //event.preventDefault();

    var $form = $('#' + $formulario),
        data = $form.serialize(),
        url = $form.attr("action");
    var posting = $.post(url, { formData: data });
    posting.done(function(data) {
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function(key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';

            $("#target").LoadingOverlay("hide", true);
            //$('.rowerror').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#loadingScreen").LoadingOverlay("hide", true);
            window.location.href = data.redirectto;

            //  $('#containerbase').empty();
            // $('#containerbase').html(data.html);

        } //success

    });
}




//************************************************************************//
//               FUNCION PARA IR AL BOOKING EXTERNO                       //
//************************************************************************//
function RenderBooking($id_usuario_operador, $id_usuario_servicio) {

    var url = "/booking/" + $id_usuario_servicio;
    $.ajax({
        type: 'GET',
        //url: '/booking/'+$id_usuario_servicio,
        url: url,
        data: "",
        success: function(data) {
            //console.log(data.redirectto);
            window.open(data.redirectto, '_blank');
            //window.location.href = data.redirectto;
        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}


//************************************************************************//
//    FUNCION PARA IR AL SETTING DEL CALENDARIO EN EL BOOKING             //
//************************************************************************//
function RenderBookingCalendario($id_usuario_operador, $id_usuario_servicio, $calendar_id) {

    var url = "/bookingCalendario/" + $id_usuario_servicio + "/" + $calendar_id;
    $.ajax({
        type: 'GET',
        //url: '/booking/'+$id_usuario_servicio,
        url: url,
        data: "",
        success: function(data) {
            //console.log(data.redirectto);
            window.open(data.redirectto, '_blank');
            //window.location.href = data.redirectto;
        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}



//retorna un mensaje despues de ejecutar la logica del controller
function AjaxSaveDetailsFotografiaProfile($formulario, $id, $type) {
    $('.error').html('');
    $("#spinnerSave").show();
    var $form = $('#' + $formulario),
        data = $form.serialize() + '&ids=' + $id + '&actionImageProfile=update' + '&type=' + $type;
    url = $form.attr("action");
    var posting = $.post(url, { formData: data });
    posting.done(function(data) {
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function(key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            //$('#error').html(errorString);
            $('.rowerror').html(errorString);
            $("#spinnerSave").hide();
        }
        if (data.success) {
            $('.register').fadeOut(); //hiding Reg form
            var successContent = '' + data.message + '';
            $("#spinnerSave").hide();
        } //success
    }); //done

}



//retorna un mensaje despues de ejecutar la logica del controller
function AjaxSaveDetailsFotografia($formulario, $id) {
    $('.error').html('');

    $("#spinnerSave").show();



    var $form = $('#' + $formulario),
        data = $form.serialize() + '&ids=' + $id + '&actionImage=update';
    url = $form.attr("action");
    var posting = $.post(url, { formData: data });
    posting.done(function(data) {
        if (data.fail) {



            var errorString = '<ul>';
            $.each(data.errors, function(key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#target").LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#target").LoadingOverlay("hide", true);
            $('.register').fadeOut(); //hiding Reg form
            var successContent = '' + data.message + '';





        } //success
    }); //done

}






//Hace la logica y envia el div que se quiere queaparezca el loading page
//funciona para parciales pequeños
function AjaxContainerRegistroWithLoad($formulario, $loadScreen) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')
        }
    });
    $("#spinnerSave").show();

    //event.preventDefault();

    var $form = $('#' + $formulario),
        data = $form.serialize(),
        url = $form.attr("action");
    var posting = $.post(url, { formData: data });
    posting.done(function(data) {
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function(key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';

            $("#spinnerSave").hide();
            //$('.rowerror').html(errorString);
            $('.rowerrorM').html(errorString);

        }
        if (data.success) {
            $("#spinnerSave").hide();

            window.location.href = data.redirectto;

            //  $('#containerbase').empty();
            // $('#containerbase').html(data.html);

        } //success



    });
}




//retorna un mensaje despues de ejecutar la logica del controller
function AjaxContainerRetrunMessagePostParametro($formulario, $id) {
    $('.error').html('');

    $("#spinnerSave").show();



    var $form = $('#' + $formulario),
        data = $form.serialize() + '&catalogo=' + $id;
    url = $form.attr("action");
    var posting = $.post(url, { formData: data });
    posting.done(function(data) {
        if (data.fail) {



            var errorString = '<ul>';
            $.each(data.errors, function(key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#target").LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#target").LoadingOverlay("hide", true);


            window.location.href = data.redirectto;




        } //success
    }); //done

}






//Hace la logica y envia el div que se quiere queaparezca el loading page
//funciona para parciales pequeños
function AjaxContainerRegistroWithLoadCharge($formulario, $loadScreen, $itinerario) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')
        }
    });
    $("#spinnerSave").show();

    var $form = $('#' + $formulario),
        data = $form.serialize(),
        url = $form.attr("action");
    var posting = $.post(url, { formData: data });
    posting.done(function(data) {
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function(key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';

            $("#spinnerSave").hide();
            $('.rowerrorM').html(errorString);

        }
        if (data.success) {
            $("#spinnerSave").hide();
            alert("El itinerario ha sido agregado. Puede modificar los campos para agregar un nuevo itinerario")

            GetDataAjaxSectionItiner("/getlistaItinerarios/" + $itinerario);
        }
    });
}



//Hace la logica y envia el div que se quiere queaparezca el loading page
//funciona para parciales pequeños
function AjaxContainerRegistroWithMessage($formulario, $loadScreen, $message) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')
        }
    });
    $("#spinnerSave").show();

    var $form = $('#' + $formulario),
        data = $form.serialize(),
        url = $form.attr("action");
    var posting = $.post(url, { formData: data });
    posting.done(function(data) {
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function(key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';

            $("#spinnerSave").hide();
            $('.rowerrorM').html(errorString);

        }
        if (data.success) {
            $("#spinnerSave").hide();
            alert($message);


        }
    });
}



//dado un parcial nombre de la carpeta incluido
//lo materializa en el lugar indicado
function RenderPartialGeneric($idPartial, $id_usuario_servicio) {

    callModal('cls');
    var url = "/render/" + $idPartial;
    $.ajax({
        type: "GET",
        url: url,
        data: {}
    }).done(function(newHtml) {

        /* output the javascript object to HTML */
        $('#basic-modal-content').html(newHtml.newHtml);
        $('#basic-modal-content').find('.id_usuario_servicio').val($id_usuario_servicio);
        $(".simplemodal-wrap").LoadingOverlay("hide", true);
    });
}




function RenderPartialGenericFotografia($idPartial, $id_catalogo_fotografia, $id_usuario_servicio, $id_auxiliar) {


    callModal('cls');
    var url = "/render/" + $idPartial;
    $.ajax({
        type: "GET",
        url: url,
        data: {}
    }).done(function(newHtml) {

        /* output the javascript object to HTML */
        $('#basic-modal-content').html(newHtml.newHtml);
        $('#basic-modal-content').find('#id_catalogo_fotografia').val($id_catalogo_fotografia);
        $('#basic-modal-content').find('#id_usuario_servicio').val($id_usuario_servicio);
        $('#basic-modal-content').find('#id_auxiliar').val($id_auxiliar);
        $(".simplemodal-wrap").LoadingOverlay("hide", true);
    });
}




//Renderiza el parcial Map, es una logica diferente ya que hay conflictos
//con el load screen
function RenderPartialGenericMap($idPartial, $itiner) {

    callModalMap('cls');

    var url = "/render/" + $idPartial;

    $.ajax({
        type: "GET",
        url: url,
        data: {}
    }).done(function(newHtml) {

        /* output the javascript object to HTML */
        $('#basic-modal-content').html(newHtml.newHtml);
        $('#basic-modal-content').find('.id_itinerario').val($itiner);

    });
}


function RenderPartialGenericMapUpdate($idPartial, $itiner, $id_detalle) {

    callModalMap('cls');

    var url = "/render/" + $idPartial + "/" + $id_detalle;

    $.ajax({
        type: "GET",
        url: url,
        data: {}
    }).done(function(newHtml) {

        /* output the javascript object to HTML */
        $('#basic-modal-content').html(newHtml.newHtml);
        $('#basic-modal-content').find('.id_itinerario').val($itiner);
        $('#basic-modal-content').find('.id_detalle').val($id_detalle);


    });
}


function RenderPartialPadre($idPartial, $id_catalogo_servicio, $id_usuario_operador, $padre) {

    callModalMap('cls');

    var url = "/render/" + $idPartial + "/" + $padre;

    $.ajax({
        type: "GET",
        url: url,
        data: {}
    }).done(function(newHtml) {

        /* output the javascript object to HTML */
        $('#basic-modal-content').html(newHtml.newHtml);
        $('#basic-modal-content').find('.id_catalogo_servicio').val($id_catalogo_servicio);
        $('#basic-modal-content').find('.id_usuario_operador').val($id_usuario_operador);
        $('#basic-modal-content').find('.id_padre').val($padre);
        $(".simplemodal-wrap").LoadingOverlay("hide", true);


    });
}

function RenderPartial($idPartial, $id_catalogo_servicio, $id_usuario_operador) {

    callModal('cls');

    var url = "/render/" + $idPartial;

    $.ajax({
        type: "GET",
        url: url,
        data: {}
    }).done(function(newHtml) {

        /* output the javascript object to HTML */
        $('#basic-modal-content').html(newHtml.newHtml);
        $('#basic-modal-content').find('.id_catalogo_servicio').val($id_catalogo_servicio);
        $('#basic-modal-content').find('.id_usuario_operador').val($id_usuario_operador);
        $(".simplemodal-wrap").LoadingOverlay("hide", true);
    });

}

function GetDataAjax(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(data) {

            $('#renderPartial').LoadingOverlay("show");
            $('#renderPartial').html(data.dificultades);
            $('#renderPartial').LoadingOverlay("hide", true);

        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function GetDataAjaxSection(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(data) {
            $("#renderPartial").LoadingOverlay("show");
            $("#renderPartial").html(data.contentPanel);
            $("#renderPartial").LoadingOverlay("hide", true);

        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function GetDataAjaxSectionEventos(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(data) {
            $("#renderPartialListaServicios").LoadingOverlay("show");
            $("#renderPartialListaServicios").html(data.contentPanelServicios);
            $("#renderPartialListaServicios").LoadingOverlay("hide", true);

        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function GetDataAjaxImagenes(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(data) {

            $("#renderPartialImagenes").html(data.contentImagenes);


        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}


function GetDataAjaxProvincias(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(data) {

            $("#provincias").html(data.provincias);


        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}


function GetDataAjaxCantones(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(data) {

            $("#canton").html(data.cantones);


        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function GetDataAjaxDescripcion(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(data) {

            $("#descripcionGeografica1").html(data.descripcionGeografica);


        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}


//******************************************************//
//                  NUEVAS FUNCIONES                    //
//******************************************************//
function ReportarErrores(url) {

    $("#modalerrores").LoadingOverlay("show");
    //alert(url);

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(data) {
            //alert(data.guardar);
            $("#modalerrores").LoadingOverlay("hide", true);
            //$('#errores').modal('hide');
            $("#errores .close").click();
            swal(
                'Muchas Gracias!',
                'Atenderemos su Solicitud!',
                'success'
            )



        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });


}


function PostErrores($formulario, $id) {


    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')
        }
    });

    $("#modalerrores1").LoadingOverlay("show");

    var $form = $('#' + $formulario),
        data = $form.serialize();
    url = $form.attr("action");

    var posting = $.post(url, { formData: data });
    posting.done(function(data) {
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function(key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#target").LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            //alert(data.guardar);
            $("#modalerrores1").LoadingOverlay("hide", true);
            $("#errorguardar .close").click();
            swal(
                'Muchas Gracias!',
                'Nos Comunicaremos a la brevedad posible!',
                'success'
            )

        } //success
    }); //done
}

function PostContactosNuevo($formulario, $id) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')
        }
    });

    $("#spinnerSave").show();

    var $form = $('#' + $formulario),
        data = $form.serialize();
    url = $form.attr("action");

    var posting = $.post(url, { formData: data });
    posting.done(function(data) {
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function(key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#target").LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#nombres,#email,#telefono").val("");
            $("#target").LoadingOverlay("hide", true);
            swal(
                'Muchas Gracias!',
                'Atenderemos su Solicitud!',
                'success'
            )


        } //success
    }); //done

}


function GetDataAjaxParroquias(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(data) {

            $("#parroquia").html(data.parroquias);


        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function GetDataAjaxSectionItiner(url, $id_usuario_servicio) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(data) {
            $("#renderPartialItinerarios").LoadingOverlay("show");
            $("#renderPartialItinerarios").html(data.contentPanelItinerarios);
            $('#renderPartialItinerarios').find('.id_usuario_servicio').val($id_usuario_servicio);
            $("#renderPartialItinerarios").LoadingOverlay("hide", true);

        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}






//retorna un mensaje despues de ejecutar la logica del controller
function AjaxContainerRetrunMessage($formulario, $id) {
    $('.error').html('');

    $("#spinnerSave").show();



    var $form = $('#' + $formulario),
        data = $form.serialize() + '&ids=' + $id;
    url = $form.attr("action");
    var posting = $.post(url, { formData: data });
    posting.done(function(data) {
        if (data.fail) {



            var errorString = '<ul>';
            $.each(data.errors, function(key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#target").LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#target").LoadingOverlay("hide", true);
            $('.register').fadeOut(); //hiding Reg form
            var successContent = '' + data.message + '';





        } //success
    }); //done

}




//retorna un mensaje despues de ejecutar la logica del controller
function AjaxContainerRetrunBurnURL($urlS, $formulario, $id, $load) {
    $('.error').html('');


    $("#".$load).LoadingOverlay("show");



    var $form = $('#' + $formulario),
        data = $form.serialize() + '&ids=' + $id;

    var url = $urlS + $id;
    var posting = $.post(url, { formData: data });
    posting.done(function(data) {
        if (data.fail) {



            var errorString = '<ul>';
            $.each(data.errors, function(key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#" + $formulario).LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            $('.rowerror').html("@include('partials/error', ['type' => 'danger','message'=>'" + errorString + "'])");

        }
        if (data.success) {
            $("#".$load).LoadingOverlay("hide", true);



        } //success
    }); //done

}



//agrega un parametro a la lista de objetos enviados al controller
//hace la misma logica que las funciones anteriores
function AjaxContainerRegistroParametro($formulario, $parametro) {


    $("#loadingScreen").LoadingOverlay("show");
    var $form = $('#' + $formulario),
        data = $form.serialize() + '&ids=' + $id;
    url = $form.attr("action");
    var posting = $.post(url, { formData: data });
    var $form = $('#' + $formulario),
        data = $form.serialize(),
        url = $form.attr("action");
    var posting = $.post(url, { formData: data });
    posting.done(function(data) {
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function(key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#" + $formulario).LoadingOverlay("hide", true);
            //$('.rowerror').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#loadingScreen").LoadingOverlay("hide", true);
            window.location.href = data.redirectto;

            //  $('#containerbase').empty();
            // $('#containerbase').html(data.html);

        } //success



    });
}


function AjaxContainerRegistro1($formulario) {
    $("#spinnerSave").show();

    //event.preventDefault();

    var $form = $('#' + $formulario),
        data = $form.serialize(),
        url = $form.attr("action");
    //alert(url);
    //alert(data);
    var posting = $.post(url, { formData: data });
    posting.done(function(data) {
        //alert(data);
        if (data.fail) {
            //alert("Fail");
            var errorString = '<ul>';
            $.each(data.errors, function(key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';

            $("#target").LoadingOverlay("hide", true);
            //$('.rowerror').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#target").LoadingOverlay("hide", true);
            //alert(data.redirectto);
            window.location.href = data.redirectto;

            //  $('#containerbase').empty();
            // $('#containerbase').html(data.html);

        } //success

    });
}


function AjaxContainerRegistro2($formulario) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')
        }
    });

    $("#spinnerSave").show();

    //event.preventDefault();

    var $form = $('#' + $formulario),
        data = $form.serialize(),
        url = $form.attr("action");
    //alert(url);
    //alert(data);

    var posting = $.post(url, { formData: data });
    posting.done(function(data) {
        //alert(data);
        if (data.fail) {
            alert("Fail");
            var errorString = '<ul>';
            $.each(data.errors, function(key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';

            $("#target").LoadingOverlay("hide", true);
            //$('.rowerror').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#target").LoadingOverlay("hide", true);
            //alert(data.redirectto);
            //alert("Datos Guardados Exitosamente");
            window.location.href = data.redirectto;

            //  $('#containerbase').empty();
            // $('#containerbase').html(data.html);

        } //success

    });
}


function AjaxContainerCambioDashboard() {

    $("#spinnerSave").show();

    var url = "/mis-servicios";
    window.location.href = url;
    $("#target").LoadingOverlay("hide", true);
}

function AjaxContainerEdicionServicios(event, $id_usuario_servicio, $id_catalogo) {

    $("#spinnerSave").show();

    event.preventDefault();
    var url = dirServer + "public/servicios/serviciooperador1/" + $id_usuario_servicio + "/" + $id_catalogo;
    var id = $id_usuario_servicio;
    //alert(id);
    //alert(url);      
    $.ajax({
        type: 'GET',
        url: url,
        data: "",
        success: function(data) {
            //alert(data.redirectto);
            window.location.href = dirServer + 'public' + data.redirectto;
        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function AjaxListadoPosts(event, $id_usuario_servicio, $id_catalogo) {

    $("#spinnerSave").show();

    event.preventDefault();
    var url = dirServer + "public/postList/" + $id_usuario_servicio + "/" + $id_catalogo;
    var id = $id_usuario_servicio;
    $.ajax({
        type: 'GET',
        url: url,
        data: "",
        success: function(data) {
            //alert(data.redirectto);
            window.location.href = dirServer + 'public/' + data.redirectto;
        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function AjaxContainerInfoOperador() {

    $("#spinnerSave").show();

    //event.preventDefault();
    var url = "/infoOperador";
    //alert(id);
    //alert(url);      
    $.ajax({
        type: 'GET',
        url: url,
        data: "",
        success: function(data) {
            //alert(data.redirectto);

            setTimeout(function() {
                $("#target").LoadingOverlay("hide", true);
                window.location.href = data.redirectto;
            }, 1000)

        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });

}

function setIdCatalogo($catalogoId) {
    $('.id_catalogo_servicio').val($catalogoId);
    $("#form-modal-add-trip").show();
}

function AjaxContainerRegistroWithLoad1(event, $formulario, $idCreate) {
    event.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')
        }
    });
    $("#spinnerSaveTrip").show();
    $("#spinnerSave").show();
    $('.rowerrorM').html('');
    var $form = $('#' + $formulario),
        data = $form.serialize(),
        url = $form.attr("action");
    var posting = $.post(url, { formData: data });
    posting.done(function(data) {
        if (data.limitServices) {
            showAlert('Error!', 'Únicamente puedes crear ' + data.limit + ' servicios', null, 'warning', 'danger');
            $("#form-modal-add-trip").hide();
            $("#spinnerSaveTrip").hide();
        };
        if (data.serviceExist) {
            showAlert('Error!', 'Ya existe un servicio con el nombre ingresado', null, 'warning', 'danger');
            $("#form-modal-add-trip").hide();
            $("#spinnerSaveTrip").hide();
        };
        if (data.fail) {
            var errorString = '<div class="alert alert-danger animated shake"><ul>';
            $.each(data.errors, function(key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul><div>';
            $("#spinnerSaveTrip").hide();
            $('.rowErrorServStep1').html(errorString);
        }
        if (data.success) {
            $("#spinnerSaveTrip").hide();
            window.location.href = dirServer + 'public/' + data.redirectto;
        } //success
    });
}

function AjaxContainerRegistroWithLoad2($formulario, $loadScreen) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')
        }
    });

    $("#spinnerSave").show();

    var $form = $('#' + $formulario),
        data = $form.serialize(),
        url = $form.attr("action");

    //alert(data);
    //alert(url);
    var posting = $.post(url, { formData: data });
    posting.done(function(data) {
        //console.log(data);
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function(key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';

            $("#spinnerSave").hide();
            //$('.rowerror').html(errorString);
            $('.rowerrorM').html(errorString);

        }
        if (data.success) {
            $("#spinnerSave").hide();
            window.location.href = data.redirectto;

            //  $('#containerbase').empty();
            // $('#containerbase').html(data.html);

        } //success
    });

}

function UpdateServicioInfo($formulario, $id) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')
        }
    });

    $('.error').html('');

    $("#spinnerSave").show();

    var $form = $('#' + $formulario),
        data = $form.serialize(),
        url = $form.attr("action");
    //alert(data);
    //alert(url);

    var posting = $.post(url, { formData: data });
    posting.done(function(data) {
        if (data.fail) {
            alert("Fail");
            var errorString = '<ul>';
            $.each(data.errors, function(key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#target").LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            //$('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#target").LoadingOverlay("hide", true);
            //alert(data.redirectto);
            //window.location.href = data.redirectto;
            //$('.register').fadeOut(); //hiding Reg form
            //var successContent = '' + data.message + '';

        } //success
    }); //done
}

function UpdateServicioInfo1($formulario, $id, redirect) {

    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    // });
    event.preventDefault();
    $('#ErrorDiv').hide();
    $('.rowerror').html('');
    $("#spinnerSave").show();
    var $form = $('#' + $formulario),
        data = $form.serialize();
    var url = dirServer + "public/uploadServiciosRes1";
    var posting = $.post(url, { formData: data + '&prev_cita=' + $('#prev_cita').bootstrapSwitch('state') });
    posting.done(function(data) {
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function(key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $('.rowerror').html(errorString);
            $('#ErrorDiv').fadeIn();
        }
        if (data.success) {
            $('#ErrorDiv').hide();
            $('.rowerror').html('');
            if (redirect) {
                window.location.href = dirServer + "public/" + data.redirectto;
            }
        } //success
    }); //done
}

function GetDataAjaxImagenesRes(url) {
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(data) {
            $("#renderPartialImagenes").html(data.contentImagenes);
            $('#spinnerLoadImagesAdmin').hide();
        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}


function GetDataAjaxImagenes1(id_usuario_servicio) {

    $("#testboxForm").LoadingOverlay("show");
    var url = "/imagenesAjaxDescription1/1/" + id_usuario_servicio;
    //alert(url);

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(data) {


            //$("#renderPartialImagenes").html(data.contentImagenes);
            window.location.href = "/crear-editar-servicio";


        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });

}

function AjaxContainerVistaPrevia($id_usuario_servicio) {

    $("#spinnerSave").show();

    //event.preventDefault();
    var url = "/vistaPreviaServicio/" + $id_usuario_servicio;
    var id = $id_usuario_servicio;
    //alert(id);
    //alert(url);      


    $.ajax({
        type: 'GET',
        url: url,
        data: "",
        success: function(data) {
            //console.log(data.redirectto);
            window.location.href = data.redirectto;
        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function AjaxSaveDetailsFotografia1($formulario, $id) {
    $('.error').html('');
    var $form = $('#' + $formulario),
        data = $form.serialize() + '&ids=' + $id + '&actionImage=update';
    url = $form.attr("action");
    var posting = $.post(url, { formData: data });
    posting.done(function(data) {
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function(key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#target").LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            $('.rowerror').html(errorString);
        }
        if (data.success) {
            $("#target").LoadingOverlay("hide", true);
            //window.location.href = data.redirectto;

        } //success
    }); //done
}

function GetDataAjaxProvincias1(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(data) {
            $("#provincias").html(data.provincias);
        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}


function GetDataAjaxCantones1(url) {
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(data) {
            $("#canton").html(data.cantones);
        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}


function saveHorario(event, idServicio) {
    event.preventDefault();
    var day = '';
    var errorDays = [];
    filtersH.forEach(function(obj, key) {
        var jdt1 = new Date(Date.parse('20 Aug 2000 ' + obj.desde + ':00')).getTime();
        var jdt2 = new Date(Date.parse('20 Aug 2000 ' + obj.hasta + ':00')).getTime();
        if (jdt1 > jdt2) {
            switch (obj.d) {
                case '0':
                    day = 'Lunes';
                    break;
                case '1':
                    day = 'Martes';
                    break;
                case '2':
                    day = 'Miercoles';
                    break;
                case '3':
                    day = 'Jueves';
                    break;
                case '4':
                    day = 'Viernes';
                    break;
                case '5':
                    day = 'Sabado';
                    break;
                case '6':
                    day = 'Domingo';
                    break;
            }
            errorDays.push(day);
        }
    });
    if (errorDays.length > 0) {
        showAlert('Error! en los siguientes dias :' + errorDays.toString(), 'La hora "HASTA" no puede ser menor a la hora "DESDE"', null, 'warning', 'danger');
    } else {
        if (filtersDays.length != filtersH.length) {
            showAlert('Error!, Algunas horas no han sido asignadas', null, null, 'warning', 'danger');
        } else {
            if (filtersDays.length == 0 && filtersH.length == 0) {
                showAlert('Error!, No se puede guardar un horario vacío', null, null, 'warning', 'danger');
            } else {
                var url = dirServer + 'public/saveHorario';
                $.ajax({
                    type: 'POST',
                    url: url,
                    dataType: 'json',
                    data: {
                        dias: filtersDays,
                        horas: filtersH,
                        idServicio: idServicio
                    },
                    success: function(data) {
                        if (data.resul) {
                            showAlert('Horario guardado correctamente!', '', null, 'success', 'success');
                            $('#btnCloseModalH').trigger('click');
                        }
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            }
        }
    }

}

function sendSearch(s) {
    event.preventDefault();
    // var s = $('#txtQuery').value();
    var url = dirServer + 'public/Search?s=' + s;
    window.location = url;
    // $.ajax({
    //     type: 'GET',
    //     url: url,
    //     dataType: 'json',
    //     success: function (data) {
    //         console.log(data);
    //         $('#searchResult').html(data.SearchTotalPartial);
    //     },
    //     error: function (data) {
    //         console.log(data);
    //     }
    // });
}

function sendSearchTendencias(event, idTendencia) {
    event.preventDefault();
    // var txtS = s.replace(/#/g,'+');
    var url = dirServer + 'public/busqueda-por-tendencia/' + idTendencia;
    window.location = url;
}

function GetDataAjaxParroquias1(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(data) {

            $("#parroquia").html(data.parroquias);


        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function GetDataAjaxDescripcion1(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(data) {

            $("#descripcionGeografica1").html(data.descripcionGeografica);


        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function AjaxContainerRetrunMessageImagenRes($formulario, $id) {

    $('.error').html('');
    var $form = $('#' + $formulario),
        data = $form.serialize() + '&ids=' + $id;
    url = $form.attr("action");
    var posting = $.post(url, { formData: data });
    posting.done(function(data) {
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function(key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#target").LoadingOverlay("hide", true);
            $('.rowerror').html(errorString);
        }
        if (data.success) {
            $('.register').fadeOut(); //hiding Reg form
            var successContent = '' + data.message + '';
            if (typeof loadImagesPost == 'function') {
                loadImagesPost();
            }
        } //success
    }); //done
}

//COMPARTIDO.JS
function UpdateServicioActivo(url) {

    $("#spinnerSave").show();
    //alert(url);

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(data) {
            //alert(data.redirectto);
            //window.location.href = "/crear-editar-servicio";
            $("#target").LoadingOverlay("hide", true);


        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });

}



function GetDataAjaxPromo(url) {

    $("#spinnerSave").show();

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(data) {

            $("#target").LoadingOverlay("hide", true);
            window.location.href = data.redirectto;

        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });

}




function GetDataEditPromo(url) {

    $("#spinnerSave").show();

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(data) {

            $("#target").LoadingOverlay("hide", true);
            window.location.href = data.redirectto;

        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}


function GuardarPromo($formulario, $id) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')
        }
    });

    $('.error').html('');

    $("#spinnerSave").show();

    var $form = $('#' + $formulario),
        data = $form.serialize() + '&catalogo=' + $id;
    url = $form.attr("action");
    //alert(data);
    //alert(url);

    var posting = $.post(url, { formData: data });
    posting.done(function(data) {
        if (data.fail) {



            var errorString = '<ul>';
            $.each(data.errors, function(key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#target").LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#target").LoadingOverlay("hide", true);
            //alert(data.redirectto);
            /*if(data.redirectto == '/listarPromocion'){
                
            }else{
                window.location.href = data.redirectto;
            }*/
            window.location.href = data.redirectto;




        } //success
    }); //done

}



function UpdatePermanente(url) {

    $("#spinnerSave").show();
    //alert(url);

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(data) {
            //alert(data.redirectto);
            //window.location.href = "/crear-editar-servicio";
            $("#target").LoadingOverlay("hide", true);


        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });

}


function UpdateServicioActivo(url) {

    $("#spinnerSave").show();
    //alert(url);

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(data) {
            //alert(data.redirectto);
            //window.location.href = "/crear-editar-servicio";
            $("#target").LoadingOverlay("hide", true);
        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });

}

function GetDataAjaxImagenes2(url) {

    $("#testboxForm").LoadingOverlay("show");

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(data) {
            $("#renderPartialImagenes").html(data.contentImagenes);
            //window.location.href = "/crear-editar-servicio";
        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });

}

var filtersServ = [];

function applyFilterServ(item) {
    if (!_.contains(filtersServ, item)) {
        filtersServ.push(item);
    } else {
        filtersServ = _.without(filtersServ, item);
    }
}

$('.checkboxServ').on('switchChange.bootstrapSwitch', function(event, state) {
    applyFilterServ(event.currentTarget.id);
});

var openFilterModal = function(event) {
    event.preventDefault();
    $('#filter').modal('show');
}

function searchServ(event, idCatalogo, idSubCatalogo) {
    event.preventDefault();
    var data = {
        filter: filtersServ,
        idCatalogo: idCatalogo,
        idSubCatalogo: idSubCatalogo,
        lat: $('#latitud_servicio').val(),
        lng: $('#longitud_servicio').val(),
        radio: $('#radioSearch').val()
    };
    var url = dirServer + 'public/filterService';
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: data,
        success: function(r) {
            var htmlResult = '';
            var array = r.data;
            for (var i = 0; i < array.length; i++) {
                var id;
                if (array[i].id_usuario_servicio) {
                    id = array[i].id_usuario_servicio;
                } else {
                    id = array[i].id;
                }
                var image = (array[i].filename != null) ? array[i].filename : 'default_service.png';
                var url = dirServer + 'public/';
                var urlImg = url + 'images/fullsize/' + image;
                var urlDetail = url + 'detalles-de-servicio/' + id;
                var htmlString = '<div class="col-xs-12 col-sm-6 col-md-4 isotope-item" style=" padding-bottom: 25px;">\
                    <div class="post-masonry post-masonry-short post-content-white bg-post-2 bg-image post-skew-right-top post-skew-var-4" style="background: url(' + urlImg + ');\
                          background-size: cover;\
                          background-repeat: no-repeat;\
                          min-height: 200px;\
                          cursor: pointer;" onclick="openDetailOnClick(' + id + ')">\
                      <div class="post-masonry-content">\
                        <h6 class=""><a href="' + urlDetail + '" style="color: #fff; text-shadow: 3px -1px 2px #1b1b1b;">' + array[i].nombre_servicio.toUpperCase() + '</a></h6>\
                      </div>\
                      <br>\
                      <span class="badge" style="color:Wwhite;background: #c26933;">Distancia: ' + parseInt(array[i].distance) + 'Km</span>\
                      </a>\
                    </div>\
                  </div>';
                htmlResult = htmlResult + htmlString;
            }
            if (array.length == 0) {
                var htmlString = '<div class="col-xs-12 text-center text-default">\
                        <h4 style="color:#c26933;"><i class="fa fa-frown-o "></i> &nbsp;&nbsp;Ups!! No se han encontrado resultados</h4>\
                      </div>';
                htmlResult = htmlResult + htmlString;
            }
            $('#findedFilter').html(htmlResult);
            $('#initialRows').hide();
            $('#filter').modal('hide');
            $('html, body').animate({
                scrollTop: $("#sectionResult").offset().top
            }, 1000);
        },
        error: function(e) {
            console.log(e)
        }
        //         <div style="overflow-x: hidden;">\
        //   ' + array[i].detalle_servicio + '\
        // </div>\
    });
}

function htmlStringFromArray(array,callback) {
    var htmlResult = '';
    // var array = r.data.finded;
    var iconDir = dirServer + 'public/images/marker.png';
    for (var i = 0; i < array.length; i++) {
        var latServ = parseFloat(array[i].latitud_servicio);
        var longServ = parseFloat(array[i].longitud_servicio);
        var id;
        if (array[i].id_usuario_servicio) {
            id = array[i].id_usuario_servicio;
        } else {
            id = array[i].id;
        }
        var image = (array[i].filename != null) ? array[i].filename : 'default_service.png';
        var url = dirServer + 'public/';
        var urlImg = url + 'images/fullsize/' + image;
        var urlDetail = url + 'detalles-de-servicio/' + id;
        var htmlString = '<div class="col-xs-12 col-sm-6 col-md-4 isotope-item" style=" padding-bottom: 25px;">\
            <div class="post-masonry post-masonry-short post-content-white bg-post-2 bg-image post-skew-right-top post-skew-var-4" style="background: url(' + urlImg + ');\
                  background-size: cover;\
                  background-repeat: no-repeat;\
                  min-height: 200px;\
                  cursor: pointer;" onclick="openDetailOnClick(' + id + ')">\
              <div class="post-masonry-content">\
                <h6 class=""><a href="' + urlDetail + '" style="color: #fff; text-shadow: 3px -1px 2px #1b1b1b;">' + array[i].nombre_servicio.toUpperCase() + '</a></h6>\
              </div><br>\
            ';
            if (array[i].institucion != '' && array[i].institucion_data) {
                htmlString = htmlString + '<span class="badge" style="color:Wwhite;background: #c26933;">' + array[i].institucion_data.nombre_servicio + '</span>';
            }
            htmlString = htmlString + '</a>\
            </div>\
          </div>';
        htmlResult = htmlResult + htmlString;
    }

    if (array.length == 0) {
        var htmlString = '<div class="col-xs-12 text-center text-default">\
                <h4 style="color:#c26933;"><i class="fa fa-frown-o "></i> &nbsp;&nbsp;Ups!! No se han encontrado resultados</h4>\
              </div>';
        htmlResult = htmlResult + htmlString;
    }

    callback(htmlResult);
}

function searchServIni(idCatalogo, idSubCatalogo) {
    var data = { filter: filtersServ, idCatalogo: idCatalogo, idSubCatalogo: idSubCatalogo };
    var url = dirServer + 'public/filterService';
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: data,
        success: function(r) {
            htmlStringFromArray(r.data,function(htmlResult){
                $('#findedFilter').html(htmlResult);
            });
            $('#initialRows').hide();
        },
        error: function(e) {
            console.log(e)
        }
    });
}

function getServWithPromotion(idCatalogo, idSubCatalogo) {
    var data = { c: idCatalogo, sbc: idSubCatalogo };
    var url = dirServer + 'public/getServWithPromotion';
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: data,
        success: function(r) {
            htmlStringFromArray(r.data,function(htmlResult){
                $('#PromotionServices').html(htmlResult);
            });
        },
        error: function(e) {
            console.log(e)
        }
    });
}

function openDetailOnClick(idServ) {
    var url = dirServer + 'public/detalles-de-servicio/' + idServ;
    window.location.href = url;
}

function getLastServicesCreated() {
    var url = dirServer + 'public/getLastServicesCreated';
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        data: {},
        success: function(r) {
            var htmlResult = '';
            var array = r.data;
            for (var i = 0; i < array.length; i++) {
                var id;
                if (array[i].id_usuario_servicio) {
                    id = array[i].id_usuario_servicio;
                } else {
                    id = array[i].id;
                }
                var url = dirServer + 'public/';
                var urlImg = url + 'images/fullsize/' + array[i].filename;
                var urlDetail = url + 'detalles-de-servicio/' + id;
                var htmlString = '<div class="post-mini post-footer">\
                        <div class="unit unit-horizontal unit-spacing-xs">\
                          <div class="unit__left">\
                          <a href="' + urlDetail + '" ><img src="' + urlImg + '" alt="" width="70" height="70"/></a></div>\
                          <div class="unit__body">\
                            <a href="' + urlDetail + '" ><p>' + array[i].nombre_servicio.toUpperCase() + '</p></a>\
                            <p>' + array[i].detalle_servicio.substring(0, 20) + '...' + '</p>\
                          </div>\
                        </div>\
                      </div>';
                htmlResult = htmlResult + htmlString;
            }
            $('#lastServicesCreated').html(htmlResult);
        },
        error: function(e) {
            console.log(e)
        }
    });
}

function AjacGetRecentPosts(id_usuario_servicio) {
    var url = dirServer + 'public/getLastPostCreated/' + id_usuario_servicio;
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: {},
        success: function(r) {
            $('#recentPosts').html(r.recentPost);
        },
        error: function(e) {
            console.log(e)
        }
    });
}

function AjacGetPopularPosts(id_usuario_servicio) {
    var url = dirServer + 'public/getPopularPost/' + id_usuario_servicio;
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: {},
        success: function(r) {
            $('#popularPosts').html(r.popularPost);
        },
        error: function(e) {
            console.log(e)
        }
    });
}

$('#spinnerRestore').hide();

function showRestorePassword(event) {
    event.preventDefault();
    if ($('#restoreForm').is(":visible")) {
        $('#restoreForm').fadeOut();
        $('#restorePassLink').fadeIn();
    } else {
        $('#restoreForm').fadeIn();
        $('#restorePassLink').fadeOut();
    }
}

function sendRestorePassword(event) {
    event.preventDefault();
    $('#spinnerRestore').show();
    var url = dirServer + 'public/sendRestorePassword';
    var msg = '';
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: { email: $('#passRestore').val() },
        success: function(r) {
            if (!r.error) {
                msg = $('#messageOK').val();
                showAlert(msg, '', null, 'success', 'success');
                $('#spinnerRestore').hide();
                $('#restorePassLink').fadeIn();
                $('#restoreForm').hide();
            } else {
                msg = $('#messageErrorUser').val();
                showAlert(msg, '', null, 'warning', 'danger');
                $('#spinnerRestore').hide();
            }
        },
        error: function(e) {
            msg = $('#messageError').val();
            showAlert(msg, '', null, 'warning', 'danger');
            $('#spinnerRestore').hide();
        }
    });
}
$('#spinnerChange').hide();

function changePassword(event) {
    event.preventDefault();
    if ($('#pass').val() != $('#pass2').val()) {
        msg = $('#msgPassNotEqual').val();
        showAlert(msg, '', null, 'warning', 'danger');
    } else {
        $('#spinnerChange').show();
        var url = dirServer + 'public/restorePassword';
        var msg = '';
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            data: { p: $('#pass').val(), email: $('#emailUpdate').val() },
            success: function(r) {
                if (!r.error) {
                    msg = $('#msgOkUpdatePass').val();
                    showAlert(msg, '', null, 'success', 'success');
                    $('#spinnerChange').hide();
                    window.location.href = dirServer + 'public/';
                } else {
                    msg = $('#messageErrorUpdatePass').val();
                    showAlert(msg, '', null, 'warning', 'danger');
                    $('#spinnerChange').hide();
                }
            },
            error: function(e) {
                msg = $('#messageErrorUpdatePass').val();
                showAlert(msg, '', null, 'warning', 'danger');
                $('#spinnerChange').hide();
            }
        });
    }
}

$('#precio_desde').live({
    keyup: function() {
        var iniP = parseFloat($(this).val());
        var finP = parseFloat($('#precio_hasta').val());
        if (iniP > finP) {
            $('#msgPrecioError').text('Precio desde no puede ser mayor a precio hasta');
            $('#msgPrecioError').fadeIn();
        } else {
            $('#msgPrecioError').fadeOut();
        }
    }
});
$('#msgPrecioError').hide();
$('#precio_hasta').live({
    keyup: function() {
        var iniP = parseFloat($('#precio_desde').val());
        var finP = parseFloat($(this).val());
        if (finP < iniP) {
            $('#msgPrecioError').text('Precio hasta no puede ser menor a precio desde');
            $('#msgPrecioError').fadeIn();
        } else {
            $('#msgPrecioError').fadeOut();
        }
    }
});

var hashArray = [];

function updateHashtags(event, hashtags, idTendencia) {
    event.preventDefault();
    if (hashArray.indexOf(idTendencia) == -1) {
        hashArray.push(idTendencia);
        $('#txtHashtags').val($('#txtHashtags').val() + ' ' + hashtags);
        var $textarea = $('#txtHashtags');
        $textarea.scrollTop($textarea[0].scrollHeight);
    }
}

// var slider = document.getElementById('slider');

// noUiSlider.create(slider, {
//     start: [0, 50],
//     connect: true,
//     range: {
//         'min': 0,
//         'max': 500
//     },
//     tooltips: true
// });

$("#resultsMap").hide();

function searchByMap(event) {
    if (event != null) {
        event.preventDefault();
    }
    $("#spinnerSearch").show();
    event.preventDefault();
    var url = dirServer + "public/searchAllInMap";
    $.ajax({
        type: 'POST',
        url: url,
        data: { lat: $('#latitud_servicio').val(), lng: $('#longitud_servicio').val(), radio: $('#radioSearch').val() },
        success: function(r) {
            var htmlResult = '';
            var array = r.data;
            // for (var i = 0; i < array.length; i++) {
            //     var marker = new google.maps.Marker({
            //         position: {
            //             lat: parseFloat(array[i].latitud_servicio),
            //             lng: parseFloat(array[i].longitud_servicio)
            //         },
            //         map: map,
            //         draggable: false
            //     });
            // }
            for (var i = 0; i < array.length; i++) {
                var id;
                if (array[i].id_usuario_servicio) {
                    id = array[i].id_usuario_servicio;
                } else {
                    id = array[i].id;
                }
                var url = dirServer + 'public/';
                var urlImg = url + 'images/fullsize/' + array[i].filename;
                var urlDetail = url + 'detalles-de-servicio/' + id;
                var htmlString = '<div class="col-xs-12 col-sm-6 col-md-4 isotope-item" style=" padding-bottom: 25px;">\
                    <div class="post-masonry post-masonry-short post-content-white bg-post-2 bg-image post-skew-right-top post-skew-var-4" style="background: url(' + urlImg + ');\
                          background-size: cover;\
                          background-repeat: no-repeat;\
                          min-height: 200px;\
                          cursor: pointer;" onclick="openDetailOnClick(' + id + ')">\
                      <div class="post-masonry-content">\
                        <h6 class=""><a href="' + urlDetail + '" style="color: #fff; text-shadow: 3px -1px 2px #1b1b1b;">' + array[i].nombre_servicio.toUpperCase() + '</a></h6>\
                      </div><br>\
                    <span class="badge" style="color:Wwhite;background: #c26933;">Distancia: ' + parseInt(array[i].distance) + 'Km</span>\
                    </div>\
                  </div>';
                htmlResult = htmlResult + htmlString;
            }
            if (array.length == 0) {
                var htmlString = '<div class="col-xs-12 text-center text-default">\
                        <h4 style="color:#c26933;"><i class="fa fa-frown-o "></i> &nbsp;&nbsp;Ups!! No se han encontrado resultados</h4>\
                      </div>';
                htmlResult = htmlResult + htmlString;
            }
            $('#findedFilterMap').html(htmlResult);
            $("#resultsMap").fadeIn();
        },
        error: function(e) {
            console.log(e);
        }
    });
}

function searchServIniTendencias() {
    $("#spinnerSearch").show();
    var url = dirServer + "public/searchAllInMapTendencias";
    $.ajax({
        type: 'POST',
        url: url,
        data: {},
        success: function(r) {
            var htmlResult = '';
            var array = r.data;
            for (var i = 0; i < array.length; i++) {
                var id;
                if (array[i].id_usuario_servicio) {
                    id = array[i].id_usuario_servicio;
                } else {
                    id = array[i].id;
                }
                var url = dirServer + 'public/';
                var urlImg = url + 'images/fullsize/' + array[i].filename;
                var urlDetail = url + 'detalles-de-servicio/' + id;
                var htmlString = '<div class="col-xs-12 col-sm-6 col-md-4 isotope-item" style=" padding-bottom: 25px;">\
                    <div class="post-masonry post-masonry-short post-content-white bg-post-2 bg-image post-skew-right-top post-skew-var-4" style="background: url(' + urlImg + ');\
                          background-size: cover;\
                          background-repeat: no-repeat;\
                          min-height: 200px;\
                          cursor: pointer;" onclick="openDetailOnClick(' + id + ')">\
                      <div class="post-masonry-content">\
                        <h6 class=""><a href="' + urlDetail + '" style="color: #fff; text-shadow: 3px -1px 2px #1b1b1b;">' + array[i].nombre_servicio.toUpperCase() + '</a></h6>\
                      </div><br>\
                    <span class="badge" style="color:Wwhite;background: #c26933;">Distancia: ' + parseInt(array[i].distance) + 'Km</span>\
                    </div>\
                  </div>';
                htmlResult = htmlResult + htmlString;
            }
            if (array.length == 0) {
                var htmlString = '<div class="col-xs-12 text-center text-default">\
                        <h4 style="color:#c26933;"><i class="fa fa-frown-o "></i> &nbsp;&nbsp;Ups!! No se han encontrado resultados</h4>\
                      </div>';
                htmlResult = htmlResult + htmlString;
            }
            $('#findedFilterMap').html(htmlResult);
            $("#resultsMap").fadeIn();
        },
        error: function(e) {
            console.log(e);
        }
    });
}

// Eventos
$('#spinnerSave').hide();

function saveEvento(event, idEvent) {
    event.preventDefault();
    $('#spinnerSave').show();
    // if (idEvent != null) {
    var $form = $('#formAddEvent'),
        data = $form.serialize(),
        url = $form.attr("action");
    var posting = $.post(url, { formData: data });
    posting.done(function(data) {
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function(key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $('#spinnerSave').hide();
            $('.rowerrorPromotion').html(errorString);
        }
        if (data.success) {
            $('#spinnerSave').hide();
            window.location.href = dirServer + 'public/' + data.redirectto;
        }
    });
    posting.error(function(e) {
        showAlert('Error!', 'Ha ocurrido un error, intentalo nuevamente', null, 'warning', 'danger');
        $('#spinnerSave').hide();
    });
    // }else{

    // }
}

$('#spinnerSavePost').hide();

function getFormData($form) {
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i) {
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}

function savePost(event, idEvent) {
    event.preventDefault();
    $('#spinnerSavePost').show();
    var $form = $('#formAddPost'),
        data = getFormData($form),
        url = $form.attr("action");
    var valueHtml = CKEDITOR.instances['html'].getData();
    data.html = valueHtml;
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: data,
        success: function(data) {
            $('#spinnerSavePost').hide();
            window.location.href = dirServer + 'public/' + data.redirectto;
        },
        error: function(data) {
            showAlert('Error!', 'Ha ocurrido un error, intentalo nuevamente', null, 'warning', 'danger');
            $('#spinnerSavePost').hide();
        }
    });
}

function GetDataAjaxImagenesPromotion(idPromotion) {
    var url = dirServer + "public/promotionImages/" + idPromotion;
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        success: function(data) {
            $("#renderImagesPromotion").html(data.contentImagenes);
        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

$('#btnRegisterDiv').hide();
$('.segurosList').hide();

$('#accepTermsCheck').on('change', function(e) {
    (this.checked) ? $('#btnRegisterDiv').show(): $('#btnRegisterDiv').hide();
});


var getSegurosList = function(idServicio) {
    var url = dirServer + "public/cleanSeguros/" + idServicio;
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        success: function(data) {
            $('.seg_151').find('input[type=checkbox]:checked').removeAttr('checked');
        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

$('.checkPropiedades').on('change', function(e) {
    if ($(this).attr('namePropiedad').toLowerCase() == 'seguros' || $(this).attr('namePropiedad').toLowerCase() == 'pago') {
        if (this.checked) {
            $('.segurosList').show();
            $('.seg_' + $(this).attr('idToTree')).show();
            getSegurosList($(this).val());
        } else {
            $('.segurosList').hide();
            $('.seg_' + $(this).attr('idToTree')).hide();
            getSegurosList($(this).val());
        }
    }
});

var idServToCopy = null;
var setIdServicioTocopy = function(idServicio) {
    idServToCopy = idServicio;
}

var moveServTouser = function(event) {
    var url = dirServer + "public/moveServTouser";
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: { email: $('#email_copyServ').val(), idServ: idServToCopy },
        success: function(data) {
            if (!data.success) {
                $("#form-modal-copy-serv").hide();
                showAlert('Error!', 'Email no existe', null, 'warning', 'danger');
            } else {
                $("#form-modal-copy-serv").hide();
                showAlert('Error!', 'Servicio movido correctamente', null, 'warning', 'success');
                setTimeout(function() {
                    location.reload();
                }, 3000);
            }
        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

var loadNewTags = function(e, idCatalogo, idSubCatalogo) {
    console.log(idCatalogo);
    console.log(idSubCatalogo);
    $('#spinnerSaveNews').css('display', 'none');
    $('#spinnerNewsTags').show();
    $('#email_news').val($('#emailNews').val());
    var url = dirServer + "public/catalogoNews";
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: { idCatalogo: idCatalogo, idSubCatalogo: idSubCatalogo },
        success: function(data) {
            var array = data.list;
            var htmlResult = '';
            for (var i = 0; i < array.length; i++) {
                var htmlString = '<div class="col-sm-4">\
                      <div class="form-wrap">\
                        <label class="form-label-outside" for="contact-first-name-2" style="color: #c26933ba;">' + array[i].name + '</label>\
                        <span class="badge" style="background-color: transparent;"><input type="checkbox" name="checkbox-news[]" value="' + array[i].id_newsletter + '" id="' + array[i].id_newsletter + '" data-size="mini" data-on-color="success" data-on-text="Si" data-off-text="No" class="checkboxDays" checked></span><br>\
                      </div>\
                    </div>';
                htmlResult = htmlResult + htmlString;
            }
            $('#NewsTagList').html(htmlResult);
            $('#spinnerNewsTags').hide();
            $("[name='checkbox-news[]']").bootstrapSwitch();
        },
        error: function(data) {
            $('#spinnerNewsTags').hide();
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

var registerClientToNews = function() {
    $('#spinnerSaveNews').css('display', 'inline');
    $('#form-modal-subscribe-news').modal('show');
    event.preventDefault();
    var $form = $('#form-subscribe-news'),
        data = $form.serialize(),
        url = $form.attr("action");
    var posting = $.post(url, { formData: data });
    posting.done(function(data) {
        if (data.errors) {
            if (data.errors[0] == 'emptyEmail') {
                showAlert('Error!', 'Ingresa un email', null, 'warning', 'danger');
                $('#form-modal-subscribe-news').modal('hide');
            };
            if (data.errors[0] == 'emailRegistered') {
                showAlert('Error!', 'Este email ya se encuentra registrado', null, 'warning', 'danger');
                $('#form-modal-subscribe-news').modal('hide');
            };
            if (data.errors[0] == 'emptyTags') {
                showAlert('Error!', 'Selecione mínimo una categoría', null, 'warning', 'danger');
                $('#form-modal-subscribe-news').modal('hide');
            };
        }
        if (!data.errors) {
            showAlert('Registro completado correctamente!', '', null, 'success', 'success');
            $('#form-modal-subscribe-news').modal('hide');
        }

    });

}
$('#resultsMoreCatalogos').css("visibility", "hidden");
$('#resultsMoreCatalogos').css("height", "10px");
var showMoreCatalogos = function(event, idCatalogo) {
    event.preventDefault();
    $('#resultsMoreCatalogos').css("visibility", "");
    $('#resultsMoreCatalogos').css("height", "");
}

function ajaxGetPromotion(event,$formulario, $id) {
    event.preventDefault();
    $('#spinnerGetPromotion').show();
    $('.error').html('');
    var $form = $('#' + $formulario),
        data = $form.serialize();
    url = $form.attr("action");
    var posting = $.post(url, { formData: data });
    posting.done(function(data) {
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function(key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $('#spinnerGetPromotion').hide();
            $('#rowerrorGetPromotion').html(errorString);
        }
        if (data.success) {
            $('#spinnerGetPromotion').hide();
            showAlert('Felicidades!!','Se ha enviado un email con el código de la promoción, revise su bandeja de entrada o spam (correo no deseado)', null, 'success', 'success');
            $('#btnClose').trigger('click');
        } //success
    })
    .fail(function(xhr, status, error) {
        $('#spinnerGetPromotion').hide();
        $('.sweet-alert').css('z-index','999999');
        showAlert('Error!!','Ha ocurrido un error, intentalo nuevamente', null, 'warning', 'danger');
    });
}