/*function validar(){
  var nombre;
  nombre = document.getElementById("nombre").value;
  if (nombre === "") {
    alert("El campo nombre esta vacio");
    return false;
  }
}*/

var btnVales = function() {
  return {
    init: function() {

      $('#btn_vale').click(function(e) {

        var nVale = $('#nVale').val();
        var dataVale = {
          vale: nVale
        };
        $('#status_vale').removeClass('hidden');
        $.post("../../controllers/app/validadorValesAjax.php", dataVale, function(mensaje) {
          $("#status_vale").html(mensaje);
        });

      });
    }
  };
}();

var btnValesArray = function() {
  return {
    init: function() {
      $('#btn_valess').click(function(e) {
        e.preventDefault();
        var cant = $('#cantidad').val();
        var nVales = [];
        var idDiv = '#status_vales'+1;

        //nVales[0] = $('#nVales').val();

        for (var i = 1; i < cant; i++) {
          //var nVales[] = $('#nVales' + i).val();
          var idDiv = '#status_vales'+i;
          nVales[i] = $('#nVales' + i).val();

          var jsonStrings = JSON.stringify(nVales);

          var dataVale = {
            vale: nVales[i]

          };


          var dat = {
            vali : jsonStrings
          }

          //$(idDiv).removeClass('hidden');
          $.post("../../controllers/app/validadorValesAjaxs.php", dat, function(mensaje) {
            $(idDiv).html(mensaje);
          });





        }







        /*

        for (var i = 1; i < cant; i++) {
          nVales[i] = $('#nVales' + i).val();
        }

        for (var i = 1; i < cant; i++) {
          var idDiv = '#status_vales'+i;
          var val = nVales[i];
          var dataVale = {vale: val}
          $(idDiv).removeClass('hidden');

          $.post("../../controllers/app/validadorValesAjaxs.php", dataVale, function(mensaje) {
            $(idDiv).html(mensaje);
          });
        }

        alert(nVales);

*/


      });
    }
  };
}();
