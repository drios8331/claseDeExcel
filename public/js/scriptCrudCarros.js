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
            const nombreCarro = $('#nombreCarro').val();
            const plantaCarro = $('#planta').val();
            const fechaEnsamble = $('#fechaEnsamble').val();
            const bodegaCarro = $('#bodega').val();
            const ciudadAlmacen = $('#ciudadAlmacenamiento').val();
            const matriculaCarro = $('#matricula').val();
            const modeloCarro = $('#carroModelo').val();
            $.ajax({
                type: "POST",
                url: "carro/create",
                data: {
                    nombreCarro: nombreCarro,
                    plantaCarro: plantaCarro,
                    fechaEnsamble: fechaEnsamble,
                    bodegaCarro: bodegaCarro,
                    ciudadAlmacen: ciudadAlmacen,
                    matriculaCarro: matriculaCarro,
                    modeloCarro: modeloCarro
                },
                success: function (response) {
                    console.log(nombreCarro);
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
