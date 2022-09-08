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

        // $documento = 1128385296;
        



        // $carro = 9;
        // $documento = 1128385296;
        // $nombre = 'David Rios';
        // $fechaHora = now();
        // $estado = 1;
        // $mensaje = '';

        // $reservas = Reserva::all();
        // $estado = 1;
        // $fechaHora = Carbon::now()->subDay(1);
        // $fecha = date('Y-m-d');
        // $data = Pruebas::all();
        // $productora = Productora::all();
        // 'fechaActual', 'reserva', 'fecha', 

        return view('pruebas', compact('reserva'));

        // $reserva = Reserva::join('tblclientes', 'tblreservas.fk_Cliente', 'tblclientes.idClientes')
        //     ->join('tblcarros', 'tblreservas.fk_Carro', 'tblcarros.idCarro')
        //     ->select(
        //         'tblcarros.idCarro as id',
        //         'tblcarros.nombreCarro as nombre',
        //         'tblproductoras.nombreProductora as productora',
        //         'tblcarros.fechaEnsamble as ensamble',
        //         'tblbodegas.nombreBodega as bodega',
        //         'tblbodegas.ciudadBodega as ciudad',
        //         'tblcarros.matriculaCarro as matricula',
        //         'tblcarros.modeloCarro as modelo'
        //     )->get();
    }
}
