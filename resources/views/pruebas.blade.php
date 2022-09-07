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
        {{$estado}}
        {{$fecha}}
    </main>
@endsection

@section('js')
    <script>
        // const valorMatricula = document.querySelector('#matricula');
        // const valorModelo = document.querySelector('#modelo');
        // const ArraydigitoPlaca = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J', 'K', 'L', 'M', 'N', 'P', 'R', 'S', 'T', 'V',
        //     'W', 'X', 'Y', '1', '2', '3', '4', '5', '6', '7', '8', '9'
        // ];
        // //3G1SF2ZA7CS111357
        // cargarEventListeners();

        // function cargarEventListeners() {
        //     valorMatricula.addEventListener("change", arrayDato);
        // }

        // function arrayDato() {
        //     let dato = valorMatricula.value;
        //     let valor = dato.split('');
        //     if (valor.length >= 17) {
        //         for (let i = 9; i < 10; i++) {
        //             let digitoVin = valor[i];
        //             rangoFecha(digitoVin);
        //         }
        //     }
        // }

        // function rangoFecha(digitoVin) {
        //     const currentTime = new Date();
        //     const year = currentTime.getFullYear()
        //     let digito = digitoVin;
        //     if (year <= 2009) {
        //         const inicioCiclo = 2009 - 30;
        //         valorFecha(inicioCiclo, digito);
        //     } else if (year > 2009 && year <= 2039) {
        //         const inicioCiclo = 2010;
        //         valorFecha(inicioCiclo, digito);
        //     } else if (year > 2039) {
        //         const inicioCiclo = 2040;
        //         valorFecha(inicioCiclo, digito);
        //     }
        // }

        // function valorFecha(inicioCiclo, digito) {
        //     let contador = 0;
        //     let vin = digito;
        //     const resultado = ArraydigitoPlaca.forEach(caracter => {
        //         contador = contador + 1;
        //         if (caracter == vin) {
        //             const calculo = inicioCiclo + contador - 1;
        //             valorModelo.setAttribute("value", calculo);
        //         }
        //     });
        // }
    </script>
@endsection
