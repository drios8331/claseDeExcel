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
                                            <button class="btn btn-outline-primary btn-sm" id="btn_info_producto"
                                                value="">
                                                <i class="bi bi-info-square" style="pointer-events: none;"></i>
                                            </button>
                                            <button class="btn btn-outline-primary btn-sm" id="btn_editar_producto"
                                                value="">
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
                                @foreach ($productora as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->idProductora }}</td>
                                        <td class="text-center">{{ $item->nombreProductora }}</td>
                                        <td class="text-center">{{ $item->nombreProductora }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-primary btn-sm" id="btn_info_producto"
                                                value="">
                                                <i class="bi bi-info-square" style="pointer-events: none;"></i>
                                            </button>
                                            <button class="btn btn-outline-primary btn-sm" id="btn_editar_producto"
                                                value="">
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

    </main>

@endsection

@section('js')
    <script>
        $(document).on("click", function(e) {
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
                    url: "{{ route('configuracion/create') }}",
                    data: {
                        productora
                    },
                    success: function(data) {
                        $("#respuesta").html(data);
                        // $("#modalAlerta").modal('hide');
                    },
                });
            }
        });

        
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $('#tableEmpresas').DataTable();
        $('#tableBodegas').DataTable();
    </script>
    <script src="js/scriptCrudConfiguracion.js"></script>
    <script src="js/scriptCrudBodegas.js"></script>
@endsection
