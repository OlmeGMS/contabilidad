/*
 *  Document   : mapa.js
 *  Author     : Olme
 *  Description: Custom javascript code used in Maps page
 */
/*
 var Mapass = function(){
   return {
     init: function() {
       new google.maps.Map({
         div: '#gmap-markers',
         lat: 4.6097100,
         lng: -74.0817500,
         zoom: 15,
         disableDefaultUI: true,
         scrollwheel: false
       });
     }
   };
 }();

 */


var map = null;
var infoWindow = null;



function initialize() {

  var divMap = document.getElementById('gmap-markers');
  var objConfig = {
    zoom: 13,
    center: {
      lat: 4.6097100,
      lng: -74.0817500
    }
  }
  var map = new google.maps.Map(divMap, objConfig);
  var route = document.getElementById('gmap-markers');

  var flightPlanCoordinates = [];
  flightPlanCoordinates.push(4.61485, -74.12792);
  flightPlanCoordinates.push(4.61555, -74.12771);
  flightPlanCoordinates.push(4.61611, -74.12776);
  flightPlanCoordinates.push(4.61689, -74.12786);
  flightPlanCoordinates.push(4.61781, -74.12798);
  flightPlanCoordinates.push(4.61805, -74.12798);
  flightPlanCoordinates.push(4.61804, -74.12832);
  flightPlanCoordinates.push(4.61802, -74.12868);
  flightPlanCoordinates.push(4.61805, -74.12868);
  flightPlanCoordinates.push(4.61892, -74.12863);
  flightPlanCoordinates.push(4.61965, -74.12854);
  flightPlanCoordinates.push(4.62053, -74.12846);
  flightPlanCoordinates.push(4.62251, -74.12826);
  flightPlanCoordinates.push(4.62479, -74.128);
  flightPlanCoordinates.push(4.62489, -74.12797);
  flightPlanCoordinates.push(4.62499, -74.12801);
  flightPlanCoordinates.push(4.62534, -74.12826);
  flightPlanCoordinates.push(4.62673, -74.12811);
  flightPlanCoordinates.push(4.62681, -74.12812);
  flightPlanCoordinates.push(4.62684, -74.12812);

  var flightPath = new google.maps.Polyline({
            path: flightPlanCoordinates,
            geodesic: true,
            strokeColor: '#FF0000',
            strokeOpacity: 1.0,
            strokeWeight: 2
          });

          flightPath.setMap(map);



  $('tr #globe').click(function(e) {

    var fila = $(this).parent().parent().parent();
    var pol = fila.find('#route').text();
    alert('hola');
    alert(pol);
    console.log(pol);


    function decode(encoded) {
      // array that holds the points
      var points = []
      var index = 0,
        len = encoded.length;
      var lat = 0,
        lng = 0;
      while (index < len) {
        var b, shift = 0,
          result = 0;
        do {
          b = encoded.charAt(index++).charCodeAt(0) - 63; //finds ascii                                                                                    //and substract it by 63
          result |= (b & 0x1f) << shift;
          shift += 5;
        } while (b >= 0x20);
        var dlat = ((result & 1) != 0 ? ~(result >> 1) : (result >> 1));
        lat += dlat;
        shift = 0;
        result = 0;
        do {
          b = encoded.charAt(index++).charCodeAt(0) - 63;
          result |= (b & 0x1f) << shift;
          shift += 5;
        } while (b >= 0x20);
        var dlng = ((result & 1) != 0 ? ~(result >> 1) : (result >> 1));
        lng += dlng;
        points.push({
          latitude: (lat / 1E5),
          longitude: (lng / 1E5)
        })
      }

      return points
    }
    var routes = decode(pol);
    var cant = routes.length;


    console.log(routes);
    console.log(cant);
    //var decodes = google.maps.geometry.encoding.decodePath(pol);
    console.log('deco');
    //console.log(decodes);

/*
    var line = new google.maps.Polyline({
        path: routes,
        strokeColor: '#00008B',
        strokeOpacity: 1.0,
        strokeWeight: 4,
        zIndex: 3
    });

    line.setMap(map);
*/
var flightPlanCoordinates = [
{latitude: 4.61485, longitude: -74.12792},
{latitude: 4.61555, longitude: -74.12771},
{latitude: 4.61611, longitude: -74.12776},
{latitude: 4.61689, longitude: -74.12786},
{latitude: 4.61781, longitude: -74.12798},
{latitude: 4.61805, longitude: -74.12798},
{latitude: 4.61804, longitude: -74.12832},
{latitude: 4.61802, longitude: -74.12868},
{latitude: 4.61805, longitude: -74.12868},
{latitude: 4.61892, longitude: -74.12863},
{latitude: 4.61965, longitude: -74.12854},
{latitude: 4.62053, longitude: -74.12846},
{latitude: 4.62251, longitude: -74.12826},
{latitude: 4.62479, longitude: -74.128},
{latitude: 4.62489, longitude: -74.12797},
{latitude: 4.62499, longitude: -74.12801},
{latitude: 4.62534, longitude: -74.12826},
{latitude: 4.62673, longitude: -74.12811},
{latitude: 4.62681, longitude: -74.12812},
{latitude: 4.62684, longitude: -74.12812},
]
var flightPath = new google.maps.Polyline({
          path: flightPlanCoordinates,
          geodesic: true,
          strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 2
        });

        flightPath.setMap(map);


  });






}



$(document).ready(function() {

  initialize();

});
