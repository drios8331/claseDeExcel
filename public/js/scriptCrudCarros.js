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
            const vinVehiculo = $("#vinVehiculo").val();
            const nombreCarro = $("#nombreCarro").val();
            const plantaCarro = $("#planta").val();
            const fechaEnsamble = $("#fechaEnsamble").val();
            const bodegaCarro = $("#bodega").val();
            const matriculaCarro = $("#matricula").val();
            const modeloCarro = $("#carroModelo").val();
            $.ajax({
                type: "POST",
                url: "carro/create",
                data: {
                    vinVehiculo: vinVehiculo,
                    nombreCarro: nombreCarro,
                    plantaCarro: plantaCarro,
                    fechaEnsamble: fechaEnsamble,
                    bodegaCarro: bodegaCarro,
                    matriculaCarro: matriculaCarro,
                    modeloCarro: modeloCarro,
                },
                success: function (response) {
                    // console.log(nombreCarro);
                    $("#respuesta").html(response);
                },
            });
            // ev.preventDefault();
        }
    });

    $(document).on("click", function (e) {
        if (e.target.id === "btn_info_carro") {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            const idVehiculo = e.target.value;
            $.ajax({
                type: "GET",
                url: "carro/" + idVehiculo + "/info",
                data: {},
                success: function (data) {
                    $("#respuesta").html(data);
                },
            });
        } else if (e.target.id === "btn_editar_carro") {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            const idVehiculo = e.target.value;
            $.ajax({
                type: "GET",
                url: "carro/" + idVehiculo + "/editCarro",
                data: {},
                success: function (data) {
                    $("#respuesta").html(data);
                },
            });
        } else if (e.target.id === "btn_update_carro") {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            const idCarro = $("#idCarro").val();
            const modeloCarro = $("#modeloCarro").val();
            const fechaEnsamble = $("#fechaEnsamble").val();
            $.ajax({
                type: "POST",
                url: "carro/" + idCarro,
                data: {
                    idCarro: idCarro,
                    modeloCarro: modeloCarro,
                    fechaEnsamble: fechaEnsamble,
                },
                success: function (data) {
                    $("#respuesta").html(data);
                },
            });
        } else if (e.target.id === "btn_reserva_carro") {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            const idCarro = e.target.value;
            $.ajax({
                type: "GET",
                url: "reserva/" + idCarro + "/modalCreate",
                data: {},
                success: function (data) {
                    $("#respuesta").html(data);
                },
            });
        } else if (e.target.id === "btn_insertar_reserva") {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            const carro = $("#idCarro").val();
            const documento = $("#documento").val();
            const nombre = $("#nombre").val();
            $.ajax({
                type: "POST",
                url: "reserva/" + carro + "/create",
                data: {
                    carro: carro,
                    documento: documento,
                    nombre: nombre,
                },
                success: function (data) {
                    $("#respuesta").html(data);
                },
            });
        } else if (e.target.id === "btn_info_reserva") {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            const idReserva = e.target.value;
            $.ajax({
                type: "GET",
                url: "reserva/" + idReserva + "/info",
                data: {},
                success: function (data) {
                    $("#respuesta").html(data);
                },
            });
        }
    });
});
