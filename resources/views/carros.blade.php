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
                            <div class="col-12">
                                <div class="form-floating">
                                    <div class='form-floating mb-3'>
                                        <input type='text' class='form-control' id='nombreCarro' placeholder='Nombre Vehiculo'>
                                        <label for='nombreCarro'>Nombre Vehiculo</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <select class="form-select d-flex align-middle" id="idPlanta"
                                        aria-label="Default select example">
                                        @foreach ($collection as $item)
                                        <option selected>--Seleccione--</option>
                                        <option value="1">One</option>
                                        @endforeach
                                    </select>
                                    <label for="" class="ms-3">Plantas productoras</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <div class='form-floating mb-3'>
                                        <input type='text' class='form-control' id='productora' placeholder='Productora'>
                                        <label for='productora'>Fecha de ensamblaje</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <select class="form-select d-flex align-middle" id=""
                                        aria-label="Default select example">
                                        <option selected>--Seleccione--</option>
                                        <option value="1">One</option>
                                    </select>
                                    <label for="" class="ms-3">Bodega</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <div class='form-floating mb-3'>
                                        <input type='text' class='form-control' id='productora' placeholder='Productora'>
                                        <label for='productora'>Ciudad de almacenamiento</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <div class='form-floating mb-3'>
                                        <input type='text' class='form-control' id='productora' placeholder='Productora'>
                                        <label for='productora'>Matricula</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <div class='form-floating mb-3'>
                                        <input type='text' class='form-control' id='productora' placeholder='Productora'>
                                        <label for='productora'>Modelo</label>
                                    </div>
                                </div>
                            </div>
                            <div class='d-grid'>
                                <button type='submit' class='btn btn-primary' id='btn_insertar_carro'>Insertar</button>";
                            </div>
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
                                    <th class="text-center">Ciudad Almacenamiento</th>
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
                                        <td class="text-center">{{ $item->ciudad }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-primary btn-sm" id="btn_info_carro"
                                                value="{{ $item->idCarro }}">
                                                <i class="bi bi-info-square" style="pointer-events: none;"></i>
                                            </button>
                                            <button class="btn btn-outline-primary btn-sm" id="btn_editar_carro"
                                                value="{{ $item->idCarro }}">
                                                <i class="bi bi-pencil-square" style="pointer-events: none;"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary btn-sm" id="btn_reserva_carro"
                                                value="{{ $item->idCarro }}">
                                                <i class="bi bi-pencil-square" style="pointer-events: none;"></i>
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



</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $('#tableCarros').DataTable({
        "lengthMenu": [
            [5, 10, 25, 50],
            [5, 10, 25, 50]
        ],
        colReorder: true
    });
</script>
<script src="js/scriptCrudCarros.js"></script>
    
@endsection
