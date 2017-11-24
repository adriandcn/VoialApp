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
      		window.location.href = window.location.href + redirect
      	}
      });
}