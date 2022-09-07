<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Models\Productora;
use Illuminate\Http\Request;
use App\Models\Pruebas;

class PruebasController extends Controller
{
    
    public function viewPruebas()
    {
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        $idCarro = 7;
        $documento = 1128385296;
        $estado = 0;






        $data = Pruebas::all();
        $bodega = Bodega::all();
        // return response()->json($data, 200, []);
        // return "json";
        return view('pruebas', compact('data', 'bodega'));
    }

    public function Pruebas()
    {

        // if (condition) {
        //     # code...
        // }
        $estado = 1;
        $fecha = date('Y-m-d');
        $data = Pruebas::all();
        $productora = Productora::all();
        // return response()->json($data, 200, []);
        // return "json";















        return view('pruebas', compact('estado', 'fecha'));
    }

    // public function createReserva(Request $request, Reserva $reserva, Modal $modal, $idCarro)
    // {
    //     // if (
    //     //     empty($request->vinVehiculo) != 1 && empty($request->nombreCarro) != 1
    //     //     && empty($request->plantaCarro) != 1 && empty($request->fechaEnsamble) != 1
    //     //     && empty($request->bodegaCarro) != 1 && empty($request->modeloCarro) != 1
    //     //     && empty($request->matriculaCarro) != 1
    //     // ) {
    //     $estado = 1;
    //     $fecha = date('Y-m-d');

    //     return view('home', compact('reserva'));

    //     // $carro->vinCarro = $request->vinVehiculo;
    //     // $carro->fk_Productora = $request->plantaCarro;
    //     // $carro->fk_Bodega = $request->bodegaCarro;
    //     // $carro->nombreCarro = $request->nombreCarro;
    //     // $carro->modeloCarro = $request->modeloCarro;
    //     // $carro->matriculaCarro = $request->matriculaCarro;
    //     // $carro->fechaEnsamble = $request->fechaEnsamble;
    //     // $carro->estado = $estado;
    //     // $carro->fechaIngInventario = $fecha;
    //     //     if ($reserva->save()) {
    //     //         $modal->modalAlerta("text-primary", "Informacion", "Reserva creada exitosamente");
    //     //     }
    //     // } else {
    //     //     $modal->modalAlerta("text-warning", "Informacion", "Todos los campos son requeridos");
    //     // }
    // }
}
