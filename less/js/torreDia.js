var torreDiaMaps = function() {

  return {
     init: function() {

       var mapOptions = {
           zoom: 13,
           mapTypeId: google.maps.MapTypeId.ROADMAP,
           center: new google.maps.LatLng(4.6097100, -74.0817500),

       };

       map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
       var trafficLayer = new google.maps.TrafficLayer();
       trafficLayer.setMap(map);


       google.maps.event.addDomListener(document.getElementById('add-markers'), 'click', addMarkers);
       google.maps.event.addDomListener(document.getElementById('remove-markers'), 'click', removeMarkers);

       //setInterval(removeMarkers, 2000);
       //setInterval(addMarkers, 2000);
       setInterval(refrescarTabla, 4000);




     }
  };

}();
