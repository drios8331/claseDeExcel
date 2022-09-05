$(function () {
    $("#insertar_productora").on("click", function (e) {
        if (e.target.id === "insertar_productora") {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                type: "POST",
                url: "configuracion/modalRegistroProductora",
                data: {},
                success: function (response) {
                    $("#respuesta").html(response);
                },
            });
        }
    });

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

    $(document).on("click", function (e) {
        if (e.target.id === "btn_insertar_productora") {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            const productora = $("#productora").val();
            $.ajax({
                type: "POST",
                url: "configuracion/create",
                data: {
                    productora,
                },
                success: function (data) {
                    $("#respuesta").html(data);
                },
            });
        } 
    });

    

    // $(document).on("click", function (e) {
    //     if (e.target.id === "btn_info_producto") {
    //         $.ajaxSetup({
    //             headers:{
    //                 "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
    //                     "content"
    //                 ),
    //             },
    //         });
    //         $.ajax({
    //             type: "POST",
    //             url: "configuracion/edit",
    //             data: {},
    //             success: function (response) {
    //                 console.log('Prueba');
    //                 $("#respuesta").html(response);
    //             },
    //         });
    //     } else if (e.target.id === "btn_editar_producto") {
    //         $.ajaxSetup({
    //             headers:{
    //                 "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
    //                     "content"
    //                 ),
    //             },
    //         });
    //         $.ajax({
    //             type: "POST",
    //             url: "configuracion/modalRegistroProductora",
    //             data: {},
    //             success: function (response) {
    //                 $("#respuesta").html(response);
    //             },
    //         });
    //     } else if (e.target.id === "btn_info_bodega") {
    //         $.ajaxSetup({
    //             headers:{
    //                 "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
    //                     "content"
    //                 ),
    //             },
    //         });
    //         $.ajax({
    //             type: "POST",
    //             url: "configuracion/modalRegistroProductora",
    //             data: {},
    //             success: function (response) {
    //                 $("#respuesta").html(response);
    //             },
    //         });
    //     } else if (e.target.id === "btn_editar_bodega") {
    //         $.ajaxSetup({
    //             headers:{
    //                 "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
    //                     "content"
    //                 ),
    //             },
    //         });
    //         $.ajax({
    //             type: "POST",
    //             url: "configuracion/modalRegistroProductora",
    //             data: {},
    //             success: function (response) {
    //                 $("#respuesta").html(response);
    //             },
    //         });
    //     }
    // });
});
