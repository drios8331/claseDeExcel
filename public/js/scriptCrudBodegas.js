$(function () {
    $("#insertar_bodega").on("click", function (e) {
        if (e.target.id === "insertar_bodega") {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                type: "POST",
                url: "configuracion/modalRegistroBodega",
                data: {},
                success: function (response) {
                    $("#respuesta").html(response);
                },
            });
        }
    });

    // $("#btn_insertar_bodega").on("click", function (e) {
    //     if (e.target.id === "btn_insertar_bodega") {
    //         $.ajaxSetup({
    //             headers: {
    //                 "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
    //                     "content"
    //                 ),
    //             },
    //         });
    //         $.ajax({
    //             type: "POST",
    //             url: "configuracion/modalRegistroBodega",
    //             data: {},
    //             success: function (response) {
    //                 $("#respuesta").html(response);
    //             },
    //         });
    //     }
    // });
});
