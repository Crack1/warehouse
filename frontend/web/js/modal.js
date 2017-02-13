// $(function(){
//     //get the click of modal button to create / update item
//     //we get the button by class not by ID because you can only have one id on a page and you can
//     //have multiple classes therefore you can have multiple open modal buttons on a page all with or without
//     //the same link.
// //we use on so the dom element can be called again if they are nested, otherwise when we load the content once it kills the dom element and wont let you load anther modal on click without a page refresh
//       $(document).on('click', '.showModalButton', function(){
//          //check if the modal is open. if it's open just reload content not whole modal
//         //also this allows you to nest buttons inside of modals to reload the content it is in
//         //the if else are intentionally separated instead of put into a function to get the
//         //button since it is using a class not an #id so there are many of them and we need
//         //to ensure we get the right button and content.
//         if ($('#modal').data('bs.modal').isShown) {
//             $('#modal').find('#modalContent')
//                     .load($(this).attr('value'));
//             //dynamiclly set the header for the modal
//             document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
//         } else {
//             //if modal isn't open; open it and load content
//             $('#modal').modal('show')
//                     .find('#modalContent')
//                     .load($(this).attr('value'));
//              //dynamiclly set the header for the modal
//             document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
//         }
//     });
// });


// $(function(){
//   $('#modalButton').click(function(){
//     $('#modal').modal('show')
//       .find('.modalContent')
//       .load($(this).attr('value'));
//   };)
// });
//
// $(function() {
//    $('#modalAccion').click(function(e) {
//      e.preventDefault();
//      $('#modal').modal('show').find('.modalContent')
//      .load($(this).attr('href'));
//    });
// });
//
// $(function() {
//     $('.modalButton').click(function(e){
//        e.preventDefault(); //for prevent default behavior of <a> tag.
//        var tagname = $(this)[0].tagName;
//        $('#modalAccion').modal('show').find('.modalContent').load($(this).attr('href'));
//    });
// });
//
// $(function() {
//     $("body").on("beforeSubmit", "form#lesson-learned-form-id", function () {
//         var form = $(this);
//         // return false if form still have some validation errors
//         if (form.find(".has-error").length) {
//             return false;
//         }
//         // submit form
//         $.ajax({
//             url    : form.attr("action"),
//             type   : "post",
//             data   : form.serialize(),
//             success: function (response) {
//                 $("#modalAccion").modal("toggle");
//                 $.pjax.reload({container:"#lotcontrol-grid-container-id"}); //for pjax update
//             },
//             error  : function () {
//                 //console.log("internal server error");
//             }
//         });
//         return false;
//      });
// });
