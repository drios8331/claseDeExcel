$(function () {
    $("#btn_insertar_carro").on("click", function (e) {
        if (e.target.id === "btn_insertar_carro") {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            // const nombreCarro = $('#nombreCarro').val();
            // const nombreCarro = $('#nombreCarro').val();
            // const nombreCarro = $('#nombreCarro').val();
            // const nombreCarro = $('#nombreCarro').val();
            // const nombreCarro = $('#nombreCarro').val();
            // const nombreCarro = $('#nombreCarro').val();
            // const nombreCarro = $('#nombreCarro').val();
            $.ajax({
                type: "POST",
                url: "carro/create",
                data: {

                },
                success: function (response) {
                    $("#respuesta").html(response);
                },
            });
            ev.preventDefault();
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
                url: "produtora/create",
                data: {
                    productora,
                },
                success: function (data) {
                    $("#respuesta").html(data);
                },
            });
            ev.preventDefault();
        } 
    });
});
