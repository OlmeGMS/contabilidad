var cotizarViaje = function() {
  return {
    init: function() {
      $('#btn_cotizar').click(function(e) {
        e.preventDefault();
        var cant = $('#cantidad').val();
        var destino = [];
        var calidad = [];
        var latTo = $('#latitude-id').val();
        var lngTo = $('#longitude-id').val();

        destino[0] =  $('#destino0').val();
        calidad[0] = $('#factor_calidad0').val();

        for (var i = 0; i < cant; i++) {
          destino[i] = $('#destino' + i).val();
          calidad[i] = $('#factor_calidad' + i).val();
          var jsonString = JSON.stringify(destino);
          var calidads = JSON.stringify(calidad);
        }

        var data = {
          latOr: latTo,
          lngOr: lngTo,
          destinos: jsonString

        }
        $('#cotizar_viajes').removeClass('hidden');
        $.post("../../controllers/app/cotizarViajesAjax.php", data, function(coti) {
          $("#cotizar_viajes").html(coti);
        });




      });
    }
  };
}();

var cotizarViajeVale = function() {
  return {
    init: function() {
      $('#btn_cotizar_vale').click(function(e) {
        e.preventDefault();
        var cant = $('#cantidad').val();
        var destino = [];
        var calidad = [];
        var latTo = $('#latitude-name-vale').val();
        var lngTo = $('#longitude-name-vale').val();

        destino[0] =  $('#destino0').val();
        calidad[0] = $('#factor_calidad0').val();

        for (var i = 0; i < cant; i++) {
          destino[i] = $('#destino' + i).val();
          calidad[i] = $('#factor_calidad' + i).val();
          var jsonString = JSON.stringify(destino);
          var calidads = JSON.stringify(calidad);
        }

        var data = {
          latOr: latTo,
          lngOr: lngTo,
          destinos: jsonString

        }
        $('#cotizar_viajes_vale').removeClass('hidden');
        $.post("../../controllers/app/cotizarViajesAjax.php", data, function(coti) {
          $("#cotizar_viajes_vale").html(coti);
        });




      });
    }
  };
}();

var cotizarViajeValeMM = function() {
  return {
    init: function() {
      $('#btn_cotizar_valeM').click(function(e) {
        e.preventDefault();
        var cant = $('#cantidad').val();
        var destino = [];
        var calidad = [];
        var latTo = $('#latitude-id').val();
        var lngTo = $('#longitude-id').val();


        destino[0] =  $('#destinos0').val();
        calidad[0] = $('#factor_calidad0').val();


        for (var i = 0; i < cant; i++) {
          destino[i] = $('#destinos' + i).val();
          calidad[i] = $('#factor_calidad' + i).val();
          var jsonStrings = JSON.stringify(destino);
          var calidads = JSON.stringify(calidad);

        }

         

        var data = {
          latOr: latTo,
          lngOr: lngTo,
          destinos: jsonStrings

        }
        $('#cotizar_viajes_vale').removeClass('hidden');
        $.post("../../controllers/app/cotizarViajesAjax.php", data, function(coti) {
          $("#cotizar_viajes_vale").html(coti);
        });




      });
    }
  };
}();
