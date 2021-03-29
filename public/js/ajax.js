// window.onload = function () {

// }

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#EnviarDatos").click(function (e) {
        e.preventDefault(); //Evitar recargar la pagina
        var dataString = $('#Crear').serialize();
        $.ajax({
            type: "POST",
            url: 'Total',
            data: dataString,
            cache: false,
            processData: false,
            success: function (response) {
                if (response) {
                    $("#Lista").load(" #Lista");
                }
            }
        });
    });
});

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
