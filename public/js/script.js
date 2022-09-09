$(function () {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "get",
            url: "reserva/actEstado",
            data: {},
            success: function (data) {
                $("#respuesta").html(data);
            },
        });
    });
