var showAlert = function(title,text,redirect,type,typebtn){
	swal({
        title: title,
        text: text,
        type: type,
        showCancelButton: false,
        confirmButtonClass: 'btn-' + typebtn,
        confirmButtonText: 'Aceptar',
        closeOnConfirm: true
      },
      function(){
      	if (redirect != null) {
          var url = 'http://' + window.location.hostname + "/voialApp/public/"+ redirect;
      		window.location.href = url;
      	}
      });
}