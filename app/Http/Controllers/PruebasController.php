<?php

namespace App\Http\Controllers;

use App\Custom\Modal;
use App\Models\Bodega;
use App\Models\Carro;
use App\Models\Cliente;
use App\Models\Productora;
use Illuminate\Http\Request;
use App\Models\Pruebas;
use App\Models\Reserva;
use Carbon\Carbon;

class PruebasController extends Controller
{

    public function viewPruebas(Reserva $reserva)
    {
        return view('pruebas');
    }

    public function Pruebas(Request $request, Reserva $reservas)
    {

        $reserva = Reserva::where('')->count();


        return view('pruebas', compact('reserva'));

    }
}
