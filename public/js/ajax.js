$(window).on("load", function() {
    $('.loader').delay(100).fadeOut('slow');
    $('.loading').delay(100).fadeOut('slow');
});
// window.onload = function () {

// }

// $(document).ready(function () {
//     $("#EliminarDatos").click(function (e) {
//         var id = $('#id_mano_de_obra').val();
//         e.preventDefault(); //Evitar recargar la pagina
//         var dataString = $('#Eliminar').serialize();
//         $.ajax({
//             type: "DELETE",
//             url: "Eliminar/" + id,
//             cache: false,
//             processData: false,
//             success: function (response) {
//                 if (response) {
//                     $("#Lista").load(" #Lista");
//                 }
//             }
//         });
//     });
// });
