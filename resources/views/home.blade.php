@extends('layouts.layout')

@section('title', 'Home')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="row">
            <div class="col-7">
                <div class="card">
                    <div class="card-header">Calendario</div>
                    <div class="card-body">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">Listado de Reservas</div>
                    <div class="card-body">
                        <table class="table table-hover table-sm display" id="tableReservas" style="width: 100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Reserva #</th>
                                    <th class="text-center">Documento</th>
                                    {{-- <th class="text-center">Nombre</th> --}}
                                    <th class="text-center">Vehiculo</th>
                                    {{-- <th class="text-center">Estado</th> --}}
                                    <th class="text-center">Acciones</th>
                                </tr>
                                {{-- {{$reserva}} --}}
                            </thead>
                            <tbody>
                                @foreach ($reserva as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->id }}</td>
                                        <td class="text-center">{{ $item->documento }}</td>
                                        {{-- <td class="text-center">{{ $item->nombre }}</td> --}}
                                        <td class="text-center">{{ $item->carro }}</td>
                                        {{-- <td class="text-center">{{ $item->estado }}</td> --}}
                                        <td class="text-center">
                                            <button class="btn btn-outline-primary btn-sm" id="btn_info_reserva"
                                                value="{{ $item->id }}">
                                                <i class="bi bi-info-square" style="pointer-events: none;"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#tableReservas').DataTable({
                "responsive": true,
                "lengthMenu": [
                    [6, 10, 25, 50],
                    [6, 10, 25, 50]
                ],
            });
        });
    </script>
    <script src="js/calendario.js"></script>
    <script src="js/script.js"></script>
    <script src="js/scriptCrudCarros.js"></script>

@endsection
