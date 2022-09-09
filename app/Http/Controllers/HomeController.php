<?php

namespace App\Http\Controllers;

use App\Custom\Modal;
use App\Models\Cliente;
use App\Models\Reserva;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __invoke()
    {

        $reserva = Reserva::join('tblclientes', 'tblreservas.fk_Cliente', 'tblclientes.idClientes')
            ->join('tblcarros', 'tblreservas.fk_Carro', 'tblcarros.idCarro')
            ->select(
                'tblreservas.idReserva as id',
                'tblclientes.documento as documento',
                'tblclientes.nombreCompleto as nombre',
                'tblcarros.nombreCarro as carro',
                'tblreservas.estadoReserva as estado',
                'tblreservas.fechaHoraReserva as fecha'
            )
            ->where('estadoReserva', '=', 1)->get();

        return view('home', compact('reserva'));
    }

    public function modalCreate(Modal $modal, $idCarro)
    {

        $contenidoModal = " <div class='col-12'>";
        $contenidoModal .= "         <input type='text' class='form-control' id='idCarro' value='$idCarro' hidden>";
        $contenidoModal .= "     <div class='form-floating mb-3'>";
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

    public function createReserva(Request $request, Reserva $reserva, Modal $modal, $carro, Cliente $cliente)
    {
        if (
            empty($request->carro) != 1 && empty($request->documento) != 1
            && empty($request->nombre) != 1
        ) {
            $carro = $request->carro;
            $documento = $request->documento;
            $nombre = $request->nombre;
            $fechaHora = now();
            $estado = 1;
            $mensaje = '';

            $clientes = Cliente::all();
            $clienteCount = Cliente::where('documento', $documento)->count('documento');
            $reservaOk = Reserva::where([['fk_Carro', $carro], ['estadoReserva', $estado]])->count('fk_Carro');

            if ($clientes->isEmpty() || $clienteCount < 1) {
                $cliente->documento = $documento;
                $cliente->nombreCompleto = $nombre;
                $cliente->save();
            }

            $clientecheck = Cliente::where('documento', $documento)->get();
            foreach ($clientecheck as $key => $value) {
                $clienteId = $value['idClientes'];
            }

            $reservaConteo = Reserva::where([['fk_Cliente', $clienteId], ['estadoReserva', $estado]])->count('fk_Cliente');

            if ($reservaOk > 0) {
                $modal->modalAlerta('text-warning', 'Alerta', 'El vehiculo ya se encuentra reservado');
            } else if ($reservaConteo < 3) {
                $reserva->fk_Cliente = $clienteId;
                $reserva->fk_Carro = $carro;
                $reserva->estadoReserva = 1;
                $reserva->fechaHoraReserva = $fechaHora;
                $reserva->save();
                $modal->modalAlerta('text-warning', 'Alerta', 'Reserva exitosa');
            } else {
                $modal->modalAlerta('text-warning', 'Alerta', 'Usted tiene 3 vehiculos reservados, no es posible agendar mas reservas por el dia de hoy, Gracias!!!.');
            }
        }
    }

    public function infoReserva($idReserva, Modal $modal)
    {

        $info = Reserva::join('tblclientes', 'tblreservas.fk_Cliente', 'tblclientes.idClientes')
            ->join('tblcarros', 'tblreservas.fk_Carro', 'tblcarros.idCarro')
            ->select(
                'tblreservas.idReserva as id',
                'tblclientes.documento as documento',
                'tblclientes.nombreCompleto as nombre',
                'tblcarros.nombreCarro as carro',
                'tblreservas.estadoReserva as estado',
                'tblreservas.fechaHoraReserva as fecha'
            )
            ->where('idReserva', $idReserva)->get();

        foreach ($info as $key => $value) {
            $idReserva = $value['id'];
            $documento = $value['documento'];
            $nombre = $value['nombre'];
            $carro = $value['carro'];
            $estado = $value['estado'];
            $fecha = $value['fecha'];
        }

        $contenidoModal =   " <ul class='list-group list-group-flush p-0 m-0'>";
        $contenidoModal .=  "    <li class='list-group-item lp'><i class='bi bi-card-checklist text-primary fa-lg'></i> <b>Datos del Vehiculo</b>";
        $contenidoModal .=  "    <li class='list-group-item lp'><b>No de reserva</b>: $idReserva</li>";
        $contenidoModal .=  "    <li class='list-group-item lp'><b>Documento del cliente</b>: $documento</li>";
        $contenidoModal .=  "    <li class='list-group-item lp'><b>Nombre del cliente</b>: $nombre</li>";
        $contenidoModal .=  "    <li class='list-group-item lp'><b>Vehiculo reservado</b>: $carro</li>";
        $contenidoModal .=  "    <li class='list-group-item lp'><b>Estado de la reserva</b>:" . $estado = 1 ? ' Reservado' : ' Disponible' . " $estado</li>";
        $contenidoModal .=  "    <li class='list-group-item lp'><b>Fecha de reserva</b>: $fecha</li>";
        $contenidoModal .=  "</ul>";

        $modal->modalAlerta('text-primary', 'Informacion del vehiculo', $contenidoModal);
    }

    public function actEstado()
    {
        $reserva = Reserva::where('estadoReserva', 1)->get();

        foreach ($reserva as $key => $value) {
            $idReserva = $value['idReserva'];
            $fecha = $value['fechaHoraReserva'];
            $reservas = Reserva::find($idReserva);
            $fechaRegistro = Carbon::parse($fecha);
            $fechaAnterior = $fechaRegistro->addDay(1);
            $fechaActual = now();
            if ($fechaActual >= $fechaAnterior) {
                $reservas->estadoReserva = 0;
                $reservas->save();
            }
        }
    }
}
