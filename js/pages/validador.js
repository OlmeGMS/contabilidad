/*function validar(){
  var nombre;
  nombre = document.getElementById("nombre").value;
  if (nombre === "") {
    alert("El campo nombre esta vacio");
    return false;
  }
}*/

var Validador = function(){
  return {
    init: function(){

      $('#formulario-efectivo').validate({
        errorClass: 'help-block animation-slideDown',
        errorElement: 'div',
        errorPlacement: function(error, e) {
            e.parents('.form-group > div').append(error);
        },
        highlight: function(e) {
            $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
            $(e).closest('.help-block').remove();
        },
        success: function(e) {
            // You can use the following if you would like to highlight with green color the input after successful validation!
            e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
            e.closest('.help-block').remove();
        },
        rules: {
          nombre:{
            required: true,
            minlength: 3
          },
          apellido:{
            required: true,
            minlength: 3
          },
          destino:{
            required: true
          },
          tipoAgendamiento:{
            required: true
          }

        },
        messages:{
          nombre: {
            required: 'Digite el nombre',
            minlength: 'El nombre debe tener minimo 3 caracteres'
          },
          apellido: {
            required: 'Digite el apellido',
            minlength: 'El apellido debe tener minimo 3 caracteres'
          },
          destino:{
            required: 'Digite el destino'
          }
        }



      });
    }
  };
}();
