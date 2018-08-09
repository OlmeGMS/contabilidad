var ValidadorEmpresa = function() {
  return {
    init: function() {
      $('#form-empresa').validate({
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
          nombre: {
            required: true,
            minlength: 3,
            maxlength: 100
          },

          pais: {
            required: true
          },
          departamento: {
            required: true
          },
          ciudad: {
            required: true
          },
          empresa: {
            required: true
          },
          marca: {
            required: true
          },
          nit: {
            required: true
          },
          telefono: {
            required: true
          },
          direccion: {
            required: true
          },
          n_contrato: {
            required: true
          },
          descripcion: {
            required: true
          },
          bloqueo: {
            required: true
          },
          porcentaje_adm: {
            required: true
          },
          presupuesto: {
            required: true
          },
          fecha_cont: {
            required: true
          }
        },
        messages: {
          nombre: {
            required: 'Digite el nombre',
            minlength: 'El nombre debe tener minimo 3 caracteres',
            maxlength: 'El nombre debe tener menos de 100 carateres'
          },
          pais: {
            required: 'Seleccione el país'
          },
          departamento: {
            required: 'Seleccione el departamento'
          },
          ciudad: {
            required: 'Seleccione la ciudad'
          },
          empresa: {
            required: 'Seleccione la empresa'
          },
          marca: {
            required: 'Seleccione la marca'
          },
          nit: {
            required: 'Seleccione el número nit'
          },
          telefono: {
            required: 'Seleccione el teléfono de la empresa'
          },
          direccion: {
            required: 'Seleccione la dirección de la empresa'
          },
          n_contrato: {
            required: 'Seleccione el número de contrato'
          },
          descripcion: {
            required: 'Seleccione la descripción'
          },
          bloqueo: {
            required: 'Seleccione el tipo de bloqueo'
          },
          porcentaje_adm: {
            required: 'Digite el porcentaje de la adminitración'
          },
          presupuesto: {
            required: 'Digite el presupuesto'
          },
          fecha_cont: {
            required: 'Seleccione la fecha del contrato'
          }


        }
      });
    }
  };
}();
