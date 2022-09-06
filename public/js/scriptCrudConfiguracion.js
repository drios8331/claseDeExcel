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
                url: "produtora/modalRegistroProductora",
                data: {},
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
        } else if (e.target.id === "insertar_bodega") {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                type: "POST",
                url: "bodega/modalInsertarBodega",
                data: {},
                success: function (response) {
                    $("#respuesta").html(response);
                },
            });
            ev.preventDefault();
        } else if (e.target.id === "btn_insertar_bodega") {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            const bodega = $("#bodega").val();
            const ciudad = $("#ciudad").val();
            $.ajax({
                type: "POST",
                url: "bodega/create",
                data: {
                    bodega,
                    ciudad,
                },
                success: function (data) {
                    $("#respuesta").html(data);
                    // $("#modalAlerta").modal('hide');
                },
            });
        } else if (e.target.id === "btn_info_productora") {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            const idProductora = e.target.value;
            $.ajax({
                type: "get",
                url: "produtora/" + idProductora + "/info",
                data: {},
                success: function (response) {
                    console.log(e.target.value);
                    $("#respuesta").html(response);
                },
            });
        } else if (e.target.id === "btn_editar_productora") {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            const idProductora = e.target.value;
            $.ajax({
                type: "get",
                url: "produtora/" + idProductora + "/editProductora",
                data: {},
                success: function (response) {
                    console.log(e.target.value);
                    $("#respuesta").html(response);
                },
            });
        } else if (e.target.id === "btn_info_bodega") {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            const idBodega = e.target.value;
            $.ajax({
                type: "get",
                url: "bodega/" + idBodega + "/infoBodega",
                data: {},
                success: function (response) {
                    console.log(e.target.value);
                    $("#respuesta").html(response);
                },
            });
        } else if (e.target.id === "btn_editar_bodega") {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            const idBodega = e.target.value;
            $.ajax({
                type: "get",
                url: "bodega/" + idBodega + "/editBodega",
                data: {},
                success: function (response) {
                    console.log(e.target.value);
                    $("#respuesta").html(response);
                },
            });
        } else if (e.target.id === "btn_update_productora") {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            const idProd = $("#idProductoraUpdate").val();
            const nombre = $("#productoraUpdate").val();
            $.ajax({
                type: "POST",
                url: "produtora/" + idProd,
                data: {
                    nombre: nombre,
                    idProd: idProd,
                },
                success: function (data) {
                    // console.log(idProductora);
                    $("#respuesta").html(data);
                },
            });
        } else if (e.target.id === "btn_update_bodega") {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            const idBod = $("#idBodega").val();
            const nomBod = $("#nombreBodega").val();
            const ciuBod = $("#ciudad").val();
            $.ajax({
                type: "POST",
                url: "bodega/" + idBod,
                data: {
                    idBod: idBod,
                    nomBod: nomBod,
                    ciuBod: ciuBod,
                },
                success: function (data) {
                    $("#respuesta").html(data);
                },
            });
        }
    });
});
