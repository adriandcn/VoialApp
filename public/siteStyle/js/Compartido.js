
$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name=_token]').attr('content')}
});

var dirServer = $('#serverDir').val();
$('#restoreForm').hide();
//hace la logica del controller, recibe los datos del formulario y hace un redirect a la pagina enviada desde
//el controller
jQuery.fn.ForceNumericOnly =
function()
{
    return this.each(function()
    {
        $(this).keydown(function(e)
        {
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
            // home, end, period, and numpad decimal
            return (
                key == 8 || 
                key == 9 ||
                key == 13 ||
                key == 46 ||
                key == 110 ||
                key == 190 ||
                (key >= 35 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
        });
    });
};
$(".numsOnly").ForceNumericOnly();
function AjaxContainerRegistro($formulario) {
    $("#spinnerSave").show();

    //event.preventDefault();

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

var url = "/booking/"+$id_usuario_servicio;
console.log(url);
        $.ajax({
        type: 'GET',
        //url: '/booking/'+$id_usuario_servicio,
        url: url,
        data:"",
        success: function (data) {
            console.log(data);
            //console.log(data.redirectto);
            window.open(data.redirectto, '_blank');
            //window.location.href = data.redirectto;
        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
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

var url = "/bookingCalendario/"+$id_usuario_servicio+"/"+$calendar_id;
console.log(url);
        $.ajax({
        type: 'GET',
        //url: '/booking/'+$id_usuario_servicio,
        url: url,
        data:"",
        success: function (data) {
            console.log(data);
            //console.log(data.redirectto);
            window.open(data.redirectto, '_blank');
            //window.location.href = data.redirectto;
        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}



//retorna un mensaje despues de ejecutar la logica del controller
function AjaxSaveDetailsFotografiaProfile($formulario, $id) {
    $('.error').html('');

    $("#spinnerSave").show();



    var $form = $('#' + $formulario),
            data = $form.serialize() + '&ids=' + $id + '&actionImageProfile=update';
    url = $form.attr("action");
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {



            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
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
function AjaxSaveDetailsFotografia($formulario, $id) {
    $('.error').html('');

    $("#spinnerSave").show();



    var $form = $('#' + $formulario),
            data = $form.serialize() + '&ids=' + $id + '&actionImage=update';
    url = $form.attr("action");
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {



            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
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
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    $("#spinnerSave").show();

    //event.preventDefault();

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
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {



            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
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
function AjaxContainerRegistroWithLoadCharge($formulario, $loadScreen,$itinerario) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    $("#spinnerSave").show();

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

            $("#spinnerSave").hide();
            $('.rowerrorM').html(errorString);

        }
        if (data.success) {
            $("#spinnerSave").hide();
            alert("El itinerario ha sido agregado. Puede modificar los campos para agregar un nuevo itinerario")
            
            GetDataAjaxSectionItiner("/getlistaItinerarios/"+$itinerario);
        } 
    });
}



//Hace la logica y envia el div que se quiere queaparezca el loading page
//funciona para parciales pequeños
function AjaxContainerRegistroWithMessage($formulario, $loadScreen,$message) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    $("#spinnerSave").show();

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
        data: {
        }}).done(function (newHtml) {

        /* output the javascript object to HTML */
        $('#basic-modal-content').html(newHtml.newHtml);
        $('#basic-modal-content').find('.id_usuario_servicio').val($id_usuario_servicio);
        $(".simplemodal-wrap").LoadingOverlay("hide", true);
    });
}




function RenderPartialGenericFotografia($idPartial, $id_catalogo_fotografia,$id_usuario_servicio,$id_auxiliar) {

    
callModal('cls');
    var url = "/render/" + $idPartial;
    $.ajax({
        type: "GET",
        url: url,
        data: {
        }}).done(function (newHtml) {

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
        data: {
        }}).done(function (newHtml) {

        /* output the javascript object to HTML */
        $('#basic-modal-content').html(newHtml.newHtml);
        $('#basic-modal-content').find('.id_itinerario').val($itiner);

    });
}


function RenderPartialGenericMapUpdate($idPartial, $itiner, $id_detalle) {

    callModalMap('cls');

    var url = "/render/" + $idPartial+"/"+$id_detalle;

    $.ajax({
        type: "GET",
        url: url,
        data: {
        }}).done(function (newHtml) {

        /* output the javascript object to HTML */
        $('#basic-modal-content').html(newHtml.newHtml);
        $('#basic-modal-content').find('.id_itinerario').val($itiner);
        $('#basic-modal-content').find('.id_detalle').val($id_detalle);


    });
}


function RenderPartialPadre($idPartial, $id_catalogo_servicio, $id_usuario_operador,$padre) {

    callModalMap('cls');

    var url = "/render/" + $idPartial+"/"+$padre;

    $.ajax({
        type: "GET",
        url: url,
        data: {
        }}).done(function (newHtml) {

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
        data: {
        }}).done(function (newHtml) {

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
        success: function (data) {
            
            $('#renderPartial').LoadingOverlay("show");
            $('#renderPartial').html(data.dificultades);
            $('#renderPartial').LoadingOverlay("hide", true);

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
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
        success: function (data) {
            $("#renderPartial").LoadingOverlay("show");
            $("#renderPartial").html(data.contentPanel);
            $("#renderPartial").LoadingOverlay("hide", true);

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
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
        success: function (data) {
            $("#renderPartialListaServicios").LoadingOverlay("show");
            $("#renderPartialListaServicios").html(data.contentPanelServicios);
            $("#renderPartialListaServicios").LoadingOverlay("hide", true);

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
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
        success: function (data) {
            
            $("#renderPartialImagenes").html(data.contentImagenes);
                 

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
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
        success: function (data) {

            $("#provincias").html(data.provincias);


        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
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
        success: function (data) {
            
            $("#canton").html(data.cantones);
            

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
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
        success: function (data) {

            $("#descripcionGeografica1").html(data.descripcionGeografica);


        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
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
        success: function (data) {
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
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
    
    
}


function PostErrores($formulario, $id) {
    

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    
    $("#modalerrores1").LoadingOverlay("show");

    var $form = $('#' + $formulario),
            data = $form.serialize();
    url = $form.attr("action");       
   
        var posting = $.post(url, {formData: data});
        posting.done(function (data) {
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
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

function PostContactosNuevo($formulario,$id) {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    
    $("#spinnerSave").show();

    var $form = $('#' + $formulario),
            data = $form.serialize();
    url = $form.attr("action");
    
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
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
        success: function (data) {

            $("#parroquia").html(data.parroquias);


        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function GetDataAjaxSectionItiner(url,$id_usuario_servicio) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            $("#renderPartialItinerarios").LoadingOverlay("show");
            $("#renderPartialItinerarios").html(data.contentPanelItinerarios);
            $('#renderPartialItinerarios').find('.id_usuario_servicio').val($id_usuario_servicio);
            $("#renderPartialItinerarios").LoadingOverlay("hide", true);

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
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
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {



            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
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
function AjaxContainerRetrunBurnURL($urlS,$formulario, $id, $load) {
    $('.error').html('');

    
    $("#".$load).LoadingOverlay("show");



    var $form = $('#' + $formulario),
            data = $form.serialize() + '&ids=' + $id;
    
    var url =$urlS + $id;
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {



            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
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
    var posting = $.post(url, {formData: data});
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
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        //alert(data);
        if (data.fail) {
            //alert("Fail");
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
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
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    
    $("#spinnerSave").show();

    //event.preventDefault();
    
    var $form = $('#' + $formulario),
            data = $form.serialize(),
            url = $form.attr("action");
    //alert(url);
    //alert(data);

    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        //alert(data);
        if (data.fail) {
            alert("Fail");
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
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

    var url = "/serviciosres";
    window.location.href = url;
    $("#target").LoadingOverlay("hide", true);
}

function AjaxContainerEdicionServicios(event,$id_usuario_servicio,$id_catalogo) {
    
    $("#spinnerSave").show();

    event.preventDefault();
    var url = dirServer + "public/servicios/serviciooperador1/"+$id_usuario_servicio+"/"+$id_catalogo;
    console.log($id_usuario_servicio);
    var id = $id_usuario_servicio;
    //alert(id);
    //alert(url);      
        $.ajax({
        type: 'GET',
        url: url,
        data:"",
        success: function (data) {
            //alert(data.redirectto);
            window.location.href = dirServer + 'public/' + data.redirectto;
        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function AjaxContainerInfoOperador(){
    
        $("#spinnerSave").show();

    //event.preventDefault();
    var url = "/infoOperador";
    //alert(id);
    //alert(url);      
        $.ajax({
        type: 'GET',
        url: url,
        data:"",
        success: function (data) {
            //alert(data.redirectto);

            setTimeout(function() {
                $("#target").LoadingOverlay("hide", true);
                window.location.href = data.redirectto;
            },1000)
            
        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
    
}

function setIdCatalogo($catalogoId){
    $('.id_catalogo_servicio').val($catalogoId);
    $("#form-modal-add-trip").show();
}

function AjaxContainerRegistroWithLoad1(event,$formulario, $idCreate) {
    event.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    $("#spinnerSaveTrip").show();
    $("#spinnerSave").show();
    $('.rowerrorM').html('');
    var $form = $('#' + $formulario),
            data = $form.serialize(),
            url = $form.attr("action");
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.limitServices) {
            showAlert('Error!','Únicamente puedes crear ' + data.limit + ' servicios',null,'warning','danger');
            $("#form-modal-add-trip").hide();
            $("#spinnerSaveTrip").hide();
        };
        if (data.serviceExist) {
            showAlert('Error!','Ya existe un servicio con el nombre ingresado',null,'warning','danger');
            $("#form-modal-add-trip").hide();
            $("#spinnerSaveTrip").hide();
        };
        if (data.fail) {
            var errorString = '<div class="alert alert-danger animated shake"><ul>';
            $.each(data.errors, function (key, value) {
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
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    
    $("#spinnerSave").show();

    var $form = $('#' + $formulario),
            data = $form.serialize(),
            url = $form.attr("action");
    
    //alert(data);
    //alert(url);
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        //console.log(data);
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
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
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    
    $('.error').html('');

    $("#spinnerSave").show();
   
    var $form = $('#' + $formulario),
            data = $form.serialize(),
            url = $form.attr("action");
            //alert(data);
            //alert(url);
        
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {
            alert("Fail");
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
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
            $('#ErrorDiv').hide();
            $('.rowerror').html('');
            if (redirect) {
                window.location.href = dirServer + "public/" + data.redirectto;
            }
        } //success
    }); //done
}

function GetDataAjaxImagenesRes(url) {
    console.log(url);
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            
            $("#renderPartialImagenes").html(data.contentImagenes);
    
        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}


function GetDataAjaxImagenes1(id_usuario_servicio) {
    
    $("#testboxForm").LoadingOverlay("show");
   var url = "/imagenesAjaxDescription1/1/"+id_usuario_servicio;
    //alert(url);
    
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            
            
            //$("#renderPartialImagenes").html(data.contentImagenes);
            window.location.href = "/edicionServicios";
                 

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
    
}

function AjaxContainerVistaPrevia($id_usuario_servicio) {
    
    $("#spinnerSave").show();

    //event.preventDefault();
    var url = "/vistaPreviaServicio/"+$id_usuario_servicio;
    var id = $id_usuario_servicio;
    //alert(id);
    //alert(url);      
    

        $.ajax({
        type: 'GET',
        url: url,
        data:"",
        success: function (data) {
            console.log(data);
            //console.log(data.redirectto);
            window.location.href = data.redirectto;
        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function AjaxSaveDetailsFotografia1($formulario, $id) {
    $('.error').html('');

    $("#spinnerSave").show();

    var $form = $('#' + $formulario),
            data = $form.serialize() + '&ids=' + $id + '&actionImage=update';
    url = $form.attr("action");
    console.log(url);
    console.log(data);
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {

            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
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
        success: function (data) {
            $("#provincias").html(data.provincias);
        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
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
        success: function (data) {
            $("#canton").html(data.cantones);
        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

$('.checkboxDays').on('switchChange.bootstrapSwitch', function (event, state) {
    applyFilterDays(event.currentTarget.id);
}); 

var filtersDays = [];
var filtersH = [];
function applyFilterDays(item){
    if (!_.contains(filtersDays, item)) {
        filtersDays.push(item);
        $('#from_time' + item).removeAttr('disabled');
        $('#to_time' + item).removeAttr('disabled');
        $('#from_time' + item).change(function() {
            var index = _.where(filtersH, {'d':item});
            if (index.length == 0) {
                var obj = {d:item,desde:$('#from_time' + item).val()};
                filtersH.push(obj);
            }else{
                filtersH.forEach(function(val,key){
                    if (val.d == item) {
                        filtersH[key].desde = $('#from_time' + item).val();
                    }
                });

            }
        });
         $('#to_time' + item).change(function() {
            var index = _.where(filtersH, {'d':item});
            if (index.length == 0) {
                var obj = {d:item,hasta:$('#to_time' + item).val()};
                filtersH.push(obj);
            }else{
                filtersH.forEach(function(val,key){
                    if (val.d == item) {
                        filtersH[key].hasta = $('#to_time' + item).val();
                    }
                });

            }
        });
        
    }else{
        filtersDays = _.without(filtersDays,item);
        $('#from_time' + item).attr('disabled','disabled');
        $('#from_time' + item).value = null;
        $('#to_time' + item).attr('disabled','disabled');
        $('#to_time' + item).value = null;
        filtersH.splice(item,1);
    }
}

function saveHorario(event,idServicio) {
    event.preventDefault();
    var day = '';
    var errorDays = [];
    filtersH.forEach(function(obj,key){
        var jdt1 = new Date(Date.parse('20 Aug 2000 ' + obj.desde + ':00')).getTime();
        var jdt2 = new Date(Date.parse('20 Aug 2000 ' + obj.hasta + ':00')).getTime();
        if (jdt1 > jdt2)
        {
            switch(obj.d){
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
        showAlert('Error! en los siguientes dias :' + errorDays.toString(),'La hora "HASTA" no puede ser menor a la hora "DESDE"',null,'warning','danger');
    }else{
        if (filtersDays.length != filtersH.length ) {
             showAlert('Error!, Algunas horas no han sido asignadas',null,null,'warning','danger');
         }else{
            if (filtersDays.length == 0 && filtersH.length == 0) {
                 showAlert('Error!, No se puede guardar un horario vacío',null,null,'warning','danger');
            }else{
                var url = dirServer + 'public/saveHorario';
                $.ajax({
                    type: 'POST',
                    url: url,
                    dataType: 'json',
                    data:{
                        dias:filtersDays,
                        horas:filtersH,
                        idServicio:idServicio
                    },
                    success: function (data) {
                        if (data.resul) {
                            showAlert('Horario guardado correctamente!','',null,'success','success');
                            $('#form-modal-horario').hide();
                        }
                    },
                    error: function (e) {
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

function GetDataAjaxParroquias1(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {

            $("#parroquia").html(data.parroquias);


        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
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
        success: function (data) {

            $("#descripcionGeografica1").html(data.descripcionGeografica);


        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function AjaxContainerRetrunMessageImagenRes($formulario, $id) {
    
    $('.error').html('');

    //$("#spinnerSave").show();

    var $form = $('#' + $formulario),
            data = $form.serialize() + '&ids=' + $id;
    url = $form.attr("action");
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#target").LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            //$("#target").LoadingOverlay("hide", true);
            $('.register').fadeOut(); //hiding Reg form
            var successContent = '' + data.message + '';
            
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
        success: function (data) {
            //alert(data.redirectto);
            //window.location.href = "/edicionServicios";
            $("#target").LoadingOverlay("hide", true);
                 

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
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
        success: function (data) {
            
            $("#target").LoadingOverlay("hide", true);
            window.location.href = data.redirectto;

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
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
        success: function (data) {
            
            $("#target").LoadingOverlay("hide", true);
            window.location.href = data.redirectto;

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}


function GuardarPromo($formulario, $id) {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    
    $('.error').html('');

    $("#spinnerSave").show();

    var $form = $('#' + $formulario),
            data = $form.serialize() + '&catalogo=' + $id;
    url = $form.attr("action");
    //alert(data);
    //alert(url);
    
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {



            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
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

// function AjaxContainerEdicionServicios($id_usuario_servicio,$id_catalogo) {
    
//     $("#spinnerSave").show();

//     event.preventDefault();
//     var url = "/servicios/serviciooperador1/"+$id_usuario_servicio+"/"+$id_catalogo;
//     var id = $id_usuario_servicio;
//     //alert(id);
//     //alert(url);      
//         $.ajax({
//         type: 'GET',
//         url: url,
//         data:"",
//         success: function (data) {
//             //alert(data.redirectto);
//             window.location.href = data.redirectto;
//         },
//         error: function (data) {
//             var errors = data.responseJSON;
//             if (errors) {
//                 $.each(errors, function (i) {
//                     console.log(errors[i]);
//                 });
//             }
//         }
//     });
// }


function UpdatePermanente(url) {
    
    $("#spinnerSave").show();
    //alert(url);
   
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            //alert(data.redirectto);
            //window.location.href = "/edicionServicios";
            $("#target").LoadingOverlay("hide", true);
                 

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
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
        success: function (data) {
            //alert(data.redirectto);
            //window.location.href = "/edicionServicios";
            $("#target").LoadingOverlay("hide", true);
        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
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
        success: function (data) {
            $("#renderPartialImagenes").html(data.contentImagenes);
            //window.location.href = "/edicionServicios";
        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
    
}

var filtersServ = [];
function applyFilterServ(item){
    if (!_.contains(filtersServ, item)) {
        filtersServ.push(item);
    }else{
        filtersServ = _.without(filtersServ,item);
    }
}

$('.checkboxServ').on('switchChange.bootstrapSwitch', function (event, state) {
    applyFilterServ(event.currentTarget.id);
}); 

var openFilterModal = function(event){
    event.preventDefault();
    $('#filter').modal('show');
}

function searchServ($idCatalogo,$idSubCatalogo){
    event.preventDefault();
    // console.log(filtersServ);
    // console.log($idCatalogo);
    // console.log($idSubCatalogo);
    var data = {filter:filtersServ,idCatalogo:$idCatalogo,idSubCatalogo:$idSubCatalogo};
    var url = dirServer + 'public/filterService';

    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data:data,
        success: function (r) {
        var htmlResult = '';
        var array = r.data;
        for (var i = 0; i < array.length; i++) {
            var id;
            if (array[i].id_usuario_servicio) {
                id = array[i].id_usuario_servicio;
            }else{
                id = array[i].id;
            }
            var url = dirServer + 'public/';
            var urlImg = url + 'images/fullsize/' + array[i].filename;
            var urlDetail = url + 'tokenDz$rip/' + id;
            var htmlString = '<div class="col-xs-12 col-sm-6 col-md-4 isotope-item" style=" padding-bottom: 25px;">\
                    <div class="post-masonry post-masonry-short post-content-white bg-post-2 bg-image box-skew post-skew-right-top post-skew-var-4" style="background: url(' + urlImg + ');\
                          background-size: cover;\
                          background-repeat: no-repeat;\
                          min-height: 200px;\
                          cursor: pointer;" onclick="openDetailOnClick(' + id + ')">\
                      <div class="post-masonry-content">\
                        <h4><a href="' + urlDetail + '">' + array[i].nombre_servicio + '</a></h4>\
                        <div style="overflow-x: hidden;">\
                          ' + array[i].detalle_servicio + '\
                        </div>\
                      </div>\
                      <a class="link-position link-primary-sec-2 link-right post-link" href="' + urlDetail + '"><i class="fa fa-info-circle" aria-hidden="true" style="color: #2f6890;"></i>\
                      </a>\
                    </div>\
                  </div>';
            htmlResult = htmlResult + htmlString;
        }
        $('#findedFilter').html(htmlResult);
        $('#initialRows').hide();
        $('#filter').modal('hide');
        },
        error: function (e) {
            console.log(e)
        }
    });
}

function searchServIni($idCatalogo,$idSubCatalogo){
    var data = {filter:filtersServ,idCatalogo:$idCatalogo,idSubCatalogo:$idSubCatalogo};
    var url = dirServer + 'public/filterService';

    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data:data,
        success: function (r) {
        var htmlResult = '';
        var array = r.data;
        for (var i = 0; i < array.length; i++) {
            var id;
            if (array[i].id_usuario_servicio) {
                id = array[i].id_usuario_servicio;
            }else{
                id = array[i].id;
            }
            var url = dirServer + 'public/';
            var urlImg = url + 'images/fullsize/' + array[i].filename;
            var urlDetail = url + 'tokenDz$rip/' + id;
            var htmlString = '<div class="col-xs-12 col-sm-6 col-md-4 isotope-item" style=" padding-bottom: 25px;">\
                    <div class="post-masonry post-masonry-short post-content-white bg-post-2 bg-image box-skew post-skew-right-top post-skew-var-4" style="background: url(' + urlImg + ');\
                          background-size: cover;\
                          background-repeat: no-repeat;\
                          min-height: 200px;\
                          cursor: pointer;" onclick="openDetailOnClick(' + id + ')">\
                      <div class="post-masonry-content">\
                        <h4><a href="' + urlDetail + '">' + array[i].nombre_servicio + '</a></h4>\
                        <div style="overflow-x: hidden;">\
                          ' + array[i].detalle_servicio + '\
                        </div>\
                      </div>\
                      <a class="link-position link-primary-sec-2 link-right post-link" href="' + urlDetail + '"><i class="fa fa-info-circle" aria-hidden="true" style="color: #2f6890;"></i>\
                      </a>\
                    </div>\
                  </div>';
            htmlResult = htmlResult + htmlString;
        }
        $('#findedFilter').html(htmlResult);
        $('#initialRows').hide();
        },
        error: function (e) {
            console.log(e)
        }
    });
}

function openDetailOnClick(idServ){
    var url = dirServer + 'public/tokenDz$rip/' + idServ;
    window.location.href = url;
}

function getLastServicesCreated(){
    var url = dirServer + 'public/getLastServicesCreated';
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        data:{},
        success: function (r) {
            var htmlResult = '';
            var array = r.data;
            for (var i = 0; i < array.length; i++) {
                var id;
                if (array[i].id_usuario_servicio) {
                    id = array[i].id_usuario_servicio;
                }else{
                    id = array[i].id;
                }
                var url = dirServer + 'public/';
                var urlImg = url + 'images/fullsize/' + array[i].filename;
                var urlDetail = url + 'tokenDz$rip/' + id;
                var htmlString = '<div class="post-mini post-footer">\
                        <div class="unit unit-horizontal unit-spacing-xs">\
                          <div class="unit__left">\
                          <a href="' + urlDetail +'" ><img src="' + urlImg + '" alt="" width="70" height="70"/></a></div>\
                          <div class="unit__body">\
                            <a href="' + urlDetail +'" ><p>' + array[i].nombre_servicio  +'</p></a>\
                            <p>' + array[i].detalle_servicio.substring(0,20) + '...'  +'</p>\
                          </div>\
                        </div>\
                      </div>';
                htmlResult = htmlResult + htmlString;
            }
             $('#lastServicesCreated').html(htmlResult);
        },
        error: function (e) {
            console.log(e)
        }
    });
}

