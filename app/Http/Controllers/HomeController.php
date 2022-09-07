<?php

namespace App\Http\Controllers;

use App\Custom\Modal;
use App\Models\Reserva;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __invoke()
    {
        // $reserva = Reserva::all();

        $reserva = Reserva::join('tblclientes', 'tblreservas.fk_Cliente', 'tblclientes.idClientes')
            ->join('tblcarros', 'tblreservas.fk_Carro', 'tblcarros.idCarro')
            ->select(
                'tblreservas.idReserva as id',
                'tblclientes.documento as documento',
                'tblcarros.nombreCarro as carro',
                'tblreservas.estadoReserva as estado',
                'tblreservas.fechaHoraReserva as fecha',
                // 'tblbodegas.ciudadBodega as ciudad',
                // 'tblreservas.modeloCarro as modelo',
                // 'tblreservas.nombreCarro as nombre',
            )->get();

        return view('home', compact('reserva'));
    }

    public function modalCreate(Modal $modal, $idCarro)
    {

        $contenidoModal = " <div class='col-12'>";
        $contenidoModal .= "     <div class='form-floating mb-3'>";
        $contenidoModal .= "         <input type='text' class='form-control' id='idCarro' value='$idCarro' hidden>";
        $contenidoModal .= "         <input type='text' class='form-control' id='documento' placeholder='Documento de identidad'>";
        $contenidoModal .= "         <label for='documento'>Documento de identidad</label>";
        $contenidoModal .= "     </div>";
        $contenidoModal .= " </div>";
        $contenidoModal .= " <div class='col-12'>";
        $contenidoModal .= "     <div class='form-floating mb-3'>";
        $contenidoModal .= "         <input type='text' class='form-control' id='nombre' placeholder='Nombres y apellidos'>";
        $contenidoModal .= "         <label for='nombre'>Nombres y apellidos</label>";
        $contenidoModal .= "     </div>";
        $contenidoModal .= " </div>";
        $contenidoModal .= "<div class='d-grid'>";
        $contenidoModal .= "<button type='submit' class='btn btn-primary' id='btn_insertar_reserva'>Agregar</button>";
        $contenidoModal .= "</div>";

        $modal->modalAlerta('text-primary', 'Reserva Vehicular', $contenidoModal);
    }

    // public function createReserva(Request $request, Reserva $reserva, Modal $modal, $idCarro)
    // {
        // if (
        //     empty($request->vinVehiculo) != 1 && empty($request->nombreCarro) != 1
        //     && empty($request->plantaCarro) != 1 && empty($request->fechaEnsamble) != 1
        //     && empty($request->bodegaCarro) != 1 && empty($request->modeloCarro) != 1
        //     && empty($request->matriculaCarro) != 1
        // ) {
        // $estado = 1;
        // $fecha = date('Y-m-d');

        // return view('home', compact('reserva'));

        // $carro->vinCarro = $request->vinVehiculo;
        // $carro->fk_Productora = $request->plantaCarro;
        // $carro->fk_Bodega = $request->bodegaCarro;
        // $carro->nombreCarro = $request->nombreCarro;
        // $carro->modeloCarro = $request->modeloCarro;
        // $carro->matriculaCarro = $request->matriculaCarro;
        // $carro->fechaEnsamble = $request->fechaEnsamble;
        // $carro->estado = $estado;
        // $carro->fechaIngInventario = $fecha;
        //     if ($reserva->save()) {
        //         $modal->modalAlerta("text-primary", "Informacion", "Reserva creada exitosamente");
        //     }
        // } else {
        //     $modal->modalAlerta("text-warning", "Informacion", "Todos los campos son requeridos");
        // }
    // }
}
