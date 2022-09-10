@extends('layouts.layout')

@section('title', 'Carros')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">Registro de carros</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-floating">
                                    <div class='form-floating mb-3'>
                                        <input type='text' class='form-control' style="text-transform:uppercase;"
                                            id='vinVehiculo' placeholder='VIN Vehiculo'
                                            onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        <label for='vinVehiculo'>VIN Vehiculo</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <div class='form-floating mb-3'>
                                        <input type='text' class='form-control' id='nombreCarro'
                                            placeholder='Nombre Vehiculo'>
                                        <label for='nombreCarro'>Nombre Vehiculo</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <select class="form-select d-flex align-middle" id="planta"
                                        aria-label="Default select example">
                                        <option selected>--Seleccione--</option>
                                        @if ($productora != null)
                                            @foreach ($productora as $key => $item)
                                                <option value="{{ $item->idProductora }}">{{ $item->nombreProductora }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    </select>
                                    <label for="">Plantas productoras</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <div class='form-floating mb-3'>
                                        <input type='date' class='form-control' id='fechaEnsamble'
                                            placeholder='Fecha de ensamblaje'>
                                        <label for='fechaEnsamble'>Fecha de ensamblaje</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <select class="form-select d-flex align-middle" id="bodega"
                                        aria-label="Default select example">
                                        <option selected>--Seleccione--</option>
                                        @if ($bodega != null)
                                            @foreach ($bodega as $key => $item)
                                                <option value="{{ $item->idBodega }}">{{ $item->nombreBodega }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <label for="">Bodega</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <div class='form-floating mb-3'>
                                        <input type='text' class='form-control' id='ciudadAlmacenamiento'
                                            placeholder='Ciudad de almacenamiento'>
                                        <label for='ciudadAlmacenamiento'>Ciudad de almacenamiento</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <div class='form-floating mb-3'>
                                        <input type='text' class='form-control' id='matricula'
                                            style="text-transform:uppercase;" placeholder='Matricula'
                                            onkeyup="javascript:this.value=this.value.toUpperCase();" disabled>
                                        <label for='matricula'>Matricula</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <div class='form-floating mb-3'>
                                        <input type='text' class='form-control' id='carroModelo' placeholder='Modelo'>
                                        <label for='carroModelo'>Modelo</label>
                                    </div>
                                </div>
                            </div>
                            <div class='d-grid'>
                                <button type='submit' class='btn btn-primary' id='btn_insertar_carro'>Insertar</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-12">
                            <p>El campo VIN es el numero alfanumerico de chasis del vehiculo, por favor poner los 17
                                caracteres completos, ejemplo: 3G1SF2ZA7CS111357</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">Listado de carros</div>
                    <div class="card-body">
                        <table class="table table-hover table-sm display" id="tableCarros" style="width: 100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Modelo</th>
                                    <th class="text-center">Acciones</th>
                                    <th class="text-center">Reserva</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carros as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->id }}</td>
                                        <td class="text-center">{{ $item->nombre }}</td>
                                        <td class="text-center">{{ $item->modelo }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-primary btn-sm" id="btn_info_carro"
                                                value="{{ $item->id }}">
                                                <i class="bi bi-info-square" style="pointer-events: none;"></i>
                                            </button>
                                            <button class="btn btn-outline-primary btn-sm" id="btn_editar_carro"
                                                value="{{ $item->id }}">
                                                <i class="bi bi-pencil-square" style="pointer-events: none;"></i>
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-primary btn-sm" id="btn_reserva_carro"
                                                value="{{ $item->id }}">
                                                <i class="bi bi-cash" style="pointer-events: none;"></i>
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
        const data = '{!! $bodega !!}';
        $(document).ready(function() {
            $('#tableCarros').DataTable({
                "responsive": true,
                "lengthMenu": [
                    [6, 10, 25, 50],
                    [6, 10, 25, 50]
                ],
            });
        });
    </script>
    <script src="js/script.js"></script>
    <script src="js/scriptCarros.js"></script>  
    <script src="js/scriptCrudCarros.js"></script>

@endsection
