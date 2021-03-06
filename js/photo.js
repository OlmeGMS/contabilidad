(function(){
  var video = document.getElementById('video'),
      canvas = document.getElementById('canvas'),
      context = canvas.getContext('2d'),
      vendorUrl = window.URL || window.webkitURL;


navigator.getMedia = navigator.getUserMedia ||
                     navigator.webkitGetUserMedia ||
                     navigator.mediaDevices.getUserMedia ||
                     navigator.mozGetUserMedia ||
                     navigator.msGetUserMedia;

  navigator.getMedia({
      video: true,
      audio: false
  }, function(stream) {
    //captura de video
    video.src = vendorUrl.createObjectURL(stream);
    //video.srcObject = vendorUrl.createObjectURL(stream);
    video.play();
  }, function(error) {
    //ocurrio un error
    //codigo
  });

  document.getElementById('capture').addEventListener('click', function(){
    context.drawImage(video, 0, 0, 400, 300);

  });

})();
