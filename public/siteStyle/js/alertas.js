var dirServer = $('#serverDir').val();

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
          var url = dirServer + "public/"+ redirect;
      		window.location.href = url;
      	}
      });
}