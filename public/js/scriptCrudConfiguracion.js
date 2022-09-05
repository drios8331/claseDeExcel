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

    // $(document).on("click", function (e) {
    //     if (e.target.id === "btn_insertar_productora") {
    //         console.log(e.target.id);
    //         $.ajaxSetup({
    //             headers: {
    //                 "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
    //                     "content"
    //                 ),
    //             },
    //         });
    //         const productora = $("#productora").val();
    //         $.ajax({
    //             type: "POST",
    //             url: "{{ route('configuracion/create') }}",
    //             data: { productora },
    //             success: function (data) {
    //                 $("#respuesta").html(data);
    //             },
    //         });
    //     }
    // });
});
