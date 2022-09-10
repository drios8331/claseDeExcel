@extends('layouts.layout')

@section('title', 'Pruebas')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
        <div class="card">
            <div class="card-body">
                <div class="col-12">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="matricula">
                        <label for="matricula">Matricula</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="modelo">
                        <label for="modelo">Modelo</label>
                    </div>
                </div>
            </div>
        </div>

        {{-- const data = '{!! $variable !!}'; --}}

        {{-- {{$fecha}}<br> --}}
        {{-- {{$fechaActual}}<br> --}}
        {{-- {{$fechaActual}}<br> --}}
        {{-- {{$fechaAnterior}}<br> --}}
        {{-- {{$mensaje}}<br> --}}
        {{-- {{$mensajeLimite}}<br> --}}
        
        {{$reserva}}<br>
    </main>
@endsection

@section('js')
    <script>
        // const fechaActual = new Date();
        // var mes = fechaActual.getMonth()+1;

        



        // console.log(mes);
        // console.log(JSON.parse(data));

    </script>
@endsection
