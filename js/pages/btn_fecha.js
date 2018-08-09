var btnFecha = function() {
  return {
    init: function() {
      $('#btn_fecha_plus').click(function(e){
        var ffe = $('#venntc').val();
        var fecha_input = $('#venTc').val();
        if (ffe != '' || ffe != undefined || ffe != null) {
          var dataFecha = {
            fecha_b: ffe,
            fecha_input: fecha_input
          };
        }else {
          var dataFecha = {
            fecha_input: fecha_input
          };
        }
        //document.forms['form-validation']['venntc'].value = fecha_input;
        $.post("../../controllers/app/agregarFechas.php", dataFecha, function(mensaje) {
          $("#ff").html(mensaje);
        });
      });
    }
  };
}();
