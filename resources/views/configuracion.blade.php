@extends('layouts.layout')

@section('title', 'Configuracion')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">Empresas productoras</div>
                    <div class="card-body">
                        <table class="table table-hover table-sm display" id="tableEmpresas" style="width: 100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Empresa</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productora as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->idProductora }}</td>
                                        <td class="text-center">{{ $item->nombreProductora }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-primary btn-sm" id="btn_info_productora"
                                                value="{{ $item->idProductora }}">
                                                <i class="bi bi-info-square" style="pointer-events: none;"></i>
                                            </button>
                                            <button class="btn btn-outline-primary btn-sm" id="btn_editar_productora"
                                                value="{{ $item->idProductora }}">
                                                <i class="bi bi-pencil-square" style="pointer-events: none;"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer p-0">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary" id="insertar_productora">Agregar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">Bodegas de almacenamiento</div>
                    <div class="card-body">
                        <table class="table table-hover table-sm display" id="tableBodegas" style="width: 100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Bodega</th>
                                    <th class="text-center">Ciudad</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bodegas as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->idBodega }}</td>
                                        <td class="text-center">{{ $item->nombreBodega }}</td>
                                        <td class="text-center">{{ $item->ciudadBodega }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-primary btn-sm" id="btn_info_bodega"
                                                value="{{ $item->idBodega }}">
                                                <i class="bi bi-info-square" style="pointer-events: none;"></i>
                                            </button>
                                            <button class="btn btn-outline-primary btn-sm" id="btn_editar_bodega"
                                                value="{{ $item->idBodega }}">
                                                <i class="bi bi-pencil-square" style="pointer-events: none;"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer p-0">
                        <div class="d-grid">
                            <button class="btn btn-primary" id="insertar_bodega">Agregar </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- {{ route('configuracion.edit') }} --}}
    </main>

@endsection

@section('js')
    <script>
        $(document).on("click", function(e) {
            if (e.target.id === "btn_insertar_bodega") {
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
                    url: "{{ route('bodega/create') }}",
                    data: {
                        bodega,
                        ciudad
                    },
                    success: function(data) {
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
                    url: "configuracion/" + idProductora + "/info",
                    data: {},
                    success: function(response) {
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
                    url: "configuracion/" + idProductora + "/editProductora",
                    data: {},
                    success: function(response) {
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
                    url: "configuracion/" + idBodega + "/infoBodega",
                    data: {},
                    success: function(response) {
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
                    url: "configuracion/" + idBodega + "/editBodega",
                    data: {},
                    success: function(response) {
                        console.log(e.target.value);
                        $("#respuesta").html(response);
                    },
                });
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $('#tableEmpresas').DataTable({
            "lengthMenu": [
                [5, 10, 25, 50],
                [5, 10, 25, 50]
            ],
        });
        $('#tableBodegas').DataTable({
            "lengthMenu": [
                [5, 10, 25, 50],
                [5, 10, 25, 50]
            ],
        });
    </script>
    <script src="js/scriptCrudConfiguracion.js"></script>
    {{-- <script src="js/scriptCrudBodegas.js"></script> --}}
@endsection
