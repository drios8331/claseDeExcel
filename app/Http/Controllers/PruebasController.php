<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\DB;

class PruebasController extends Controller
{

    public function viewPruebas(Reserva $reserva)
    {
        return view('pruebas');
    }

    public function Pruebas(Request $request, Reserva $reservas)
    {

        // $sql = 'SELECT idReserva, COUNT(idReserva), DATE_FORMAT(fechaHoraReserva, "%d-%m-%Y"), start, end FROM tblreservas WHERE estadoReserva = 1 GROUP BY DATE_FORMAT(fechaHoraReserva, "%d-%m-%Y")';
        DB::statement("SET SQL_MODE=''");
        $reserva = Reserva::selectRaw('idReserva, COUNT(idReserva) as cantidad, DATE_FORMAT(fechaHoraReserva, "%d-%m-%Y") as fecha, start, end')->where('estadoReserva', 1)->groupBy('fecha')->get();

  

        return view('pruebas', compact('reserva'));

    }
}
