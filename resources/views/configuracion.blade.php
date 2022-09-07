@extends('layouts.layout')

@section('title', 'Configuracion')

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
        {{-- {{"configuracion", $item->idProductora}} --}}
    </main>

@endsection

@section('js')

    <script>
        $(document).ready(function() {
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
        });
    </script>
    <script src="js/scriptCrudConfiguracion.js"></script>
    {{-- <script src="js/scriptCrudBodegas.js"></script> --}}
@endsection
