$('#tblcasos-tipo_llamada').on('change', function () {
    if(this.value > 1){
        $("#formSimple").show();
        $("#formFull").hide();
    } else {
        $("#formSimple").hide();
        $("#formFull").show();
    }
    if(this.value == 0)
    {
      $("#formSimple").hide();
      $("#formFull").hide();
    }
});

function SendTipoLlamada(data) {
    if(data.value == 1){
      document.getElementById ("test1").value = data.value;
      document.getElementById("titlex1").innerHTML = 'Caso de '+data.options[data.selectedIndex].text;;
    } else {
      document.getElementById ("test2").value = data.value;
      document.getElementById("titlex2").innerHTML = 'Caso de '+data.options[data.selectedIndex].text;;
    }
}

// $('.btn-ajax-modal').click(function (){
//     var elm = $(this),
//         target = elm.attr('data-target'),
//         ajax_body = elm.attr('value');
//
//     $(target).modal('show')
//         .find('.modal-content')
//         .load(ajax_body);
// });
//
// $(function(){
//   $('#modalButton').click(function(){
//     $('#modal').modal('show')
//       .find('.modalContent')
//       .load($(this).attr('value'));
//   };)
// });
