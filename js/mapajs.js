var MapaJs = function() {
  return {
    init: function() {
    //  var divMap = document.getElementById('gmap-geolocation');
      var divMap = document.getElementById('gmap-markers');
      var objConfig = {
        zoom: 13,
        center: {
          lat: 4.6097100,
          lng: -74.0817500
        },
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      var gLatLongStart = new google.maps.LatLng(4.6097100, -74.0817500);
      var gMap = new google.maps.Map(divMap, objConfig);
      var latLngIncio = new google.maps.LatLng(4.6097100, -74.0817500);
      var cnf = {
        map: gMap,
        animation: google.maps.Animation.DROP,
        position: latLngIncio,
        title: 'Punto de inicio'
      };
      var centerPoint = new google.maps.Marker(cnf);
    }
  };
}();

var MoverMarker = function(){
  return {
    init: function(){
      function openInfoWindow(marker) {
          var markerLatLng = marker.getPosition();
          infoWindow.setContent([
              ' Arrástrame para actualizar la posición..'
          ].join(''));
          infoWindow.open(map, marker);
      }
    }
  };
}();

var actualizarUbicacionMarker =function(){
  return {
    init: function(){
      google.maps.event.addListener(marker, 'mouseup', function(){
          var geocoder = new google.maps.Geocoder();
          openInfoWindow(marker);
          var markerLatLng = marker.getPosition();
          var caplat = markerLatLng.lat();
          var caplng = markerLatLng.lng();
          document.forms['form-validation']['lat_company'].value = caplat;
          document.forms['form-validation']['lng_company'].value = caplng;
          document.forms['form-validation']['address_company'].value = address;

          var puntero = new google.maps.LatLng(caplat, caplng);
          geocoder.geocode({'latLng': puntero}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
              if (results[0]) {
                map.fitBounds(results[0].geometry.viewport);
                        marker.setMap(map);
                        marker.setPosition(puntero);
                        var dir_punt = results[0].formatted_address;

                $('#dir_caja').text(dir_punt);
                $('#caja_ubicacion_adress').removeClass('hidden');
                $('#caja_ubicacion').addClass('hidden');

              } else {
                alert('No results found');
              }
            } else {
              alert('Geocoder failed due to: ' + status);
            }
          });


      });
    }
  };
}();


var BuscarDestinoMap = function(){
  return {
    init: function(){
      $('#btn-conf-dir_destino').click(function(){
        var dir = $('#dir').val();
        var nombre_dir = $('#nombre_direccion').val();
        var nDos = $('#ndos').val();
        var numm = $('#noo').val();
        //var barrio = $('#barrio').val();
        var barrio = $('#barrio-select').val();
        var nombre = $('#nombre').val();
        var observaciones = $('#observaciones').val();
        var destino = $('#destino').val();
        var direcionCompleta = dir+' '+nombre_dir+' #'+nDos+'-'+numm+', '+barrio;
        var millos = direcionCompleta;

        //
        alert('holas');
        if (dir === undefined || nombre_dir === undefined || nDos === undefined || numm === undefined || barrio === undefined) {
          alert('No han seleccionado la dirección del servicio');
          return false;
        }else if (dir === '' || nombre_dir === '' || nDos === '' || numm === '' || barrio === '') {
          alert('Por favor llenar todos los campos de la dirección');
          return false;
        }else{
          // Obtenemos la dirección y la asignamos a una variable
           var address = millos;

           // Creamos el Objeto Geocoder
           var geocoder = new google.maps.Geocoder();
           // Hacemos la petición indicando la dirección e invocamos la función
           // geocodeResult enviando todo el resultado obtenido
           geocoder.geocode({ 'address': address}, geocodeResult);

           document.forms['form-validation']['lat_company'].value = lat_place;
           document.forms['form-validation']['lng_company'].value = lng_place;
           document.forms['form-validation']['address_company'].value = address;

        }

      });
    }
  };
}();
