<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use App\Custom\Modal;
use App\Models\Bodega;
use App\Models\Productora;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use PDOException;

class CarrosController extends Controller
{

    public function viewCarros()
    {

        $productora = Productora::all();
        $bodega = Bodega::all();
        $carros = Carro::join('tblbodegas', 'tblcarros.fk_Bodega', 'tblbodegas.idBodega')
            ->join('tblproductoras', 'tblcarros.fk_Productora', 'tblproductoras.idProductora')
            ->select(
                'tblcarros.idCarro as id',
                'tblcarros.nombreCarro as nombre',
                'tblproductoras.nombreProductora as productora',
                'tblcarros.fechaEnsamble as ensamble',
                'tblbodegas.nombreBodega as bodega',
                'tblbodegas.ciudadBodega as ciudad',
                'tblcarros.matriculaCarro as matricula',
                'tblcarros.modeloCarro as modelo'
            )->get();

        return view('carros', compact('carros', 'productora', 'bodega'));
    }

    public function createCarros(Request $request, Carro $carro, Modal $modal)
    {
        try {

            if (
                empty($request->vinVehiculo) != 1 && empty($request->nombreCarro) != 1
                && empty($request->plantaCarro) != 1 && empty($request->fechaEnsamble) != 1
                && empty($request->bodegaCarro) != 1 && empty($request->modeloCarro) != 1
                && empty($request->matriculaCarro) != 1
            ) {
                $fecha = date('Y-m-d');
                $carro->vinCarro = $request->vinVehiculo;
                $carro->fk_Productora = $request->plantaCarro;
                $carro->fk_Bodega = $request->bodegaCarro;
                $carro->nombreCarro = $request->nombreCarro;
                $carro->modeloCarro = $request->modeloCarro;
                $carro->matriculaCarro = $request->matriculaCarro;
                $carro->fechaEnsamble = $request->fechaEnsamble;
                $carro->fechaIngInventario = $fecha;
                if ($carro->save()) {
                    $modal->modalAlerta("text-primary", "Informacion", "informacion enviada exitosamente");
                }
            } else {
                $modal->modalAlerta("text-warning", "Informacion", "Todos los campos son requeridos");
            }
        } catch (PDOException $e) {
            $modal->modalAlerta("text-warning", "Informacion", "El codigo VIN del vehiculo es unico, ya en el sistema se encuentra registrado u numero igual al que desea registrar.");
        }
    }

    public function infoCarros($idVehiculo, Modal $modal)
    {

        $info = Carro::join('tblbodegas', 'tblcarros.fk_Bodega', 'tblbodegas.idBodega')
            ->join('tblproductoras', 'tblcarros.fk_Productora', 'tblproductoras.idProductora')
            ->select(
                'tblcarros.idCarro as id',
                'tblcarros.vinCarro as vin',
                'tblcarros.nombreCarro as nombre',
                'tblproductoras.nombreProductora as productora',
                'tblcarros.fechaEnsamble as ensamble',
                'tblbodegas.nombreBodega as bodega',
                'tblbodegas.ciudadBodega as ciudad',
                'tblcarros.matriculaCarro as matricula',
                'tblcarros.modeloCarro as modelo',
                'tblcarros.fechaIngInventario as inventario'
            )->Where('idCarro', $idVehiculo)->get();
        // $info = Carro::where('idCarro', $id)->get();

        foreach ($info as $key => $value) {
            $idCar = $value['id'];
            $vin = $value['vin'];
            $productora = $value['productora'];
            $bodega = $value['bodega'];
            $nameCarro = $value['nombre'];
            $modeloCarro = $value['modelo'];
            $matriculaCarro = $value['matricula'];
            $fechaEnsamble = $value['ensamble'];
            $fechaInventario = $value['inventario'];
        }

        $contenidoModal =   " <ul class='list-group list-group-flush p-0 m-0'>";
        $contenidoModal .=  "    <li class='list-group-item lp'><i class='bi bi-card-checklist text-primary fa-lg'></i> <b>Datos del Vehiculo</b>";
        $contenidoModal .=  "    <li class='list-group-item lp'><b>No</b>: $idCar</li>";
        $contenidoModal .=  "    <li class='list-group-item lp'><b>Numero VIM Chasis</b>: $vin</li>";
        $contenidoModal .=  "    <li class='list-group-item lp'><b>Planta productora</b>: $productora</li>";
        $contenidoModal .=  "    <li class='list-group-item lp'><b>Bodega almacenamiento</b>: $bodega</li>";
        $contenidoModal .=  "    <li class='list-group-item lp'><b>Nombre vehiculo</b>: $nameCarro</li>";
        $contenidoModal .=  "    <li class='list-group-item lp'><b>Modelo vehiculo</b>: $modeloCarro</li>";
        $contenidoModal .=  "    <li class='list-group-item lp'><b>Matricula del vehiculo</b>: $matriculaCarro</li>";
        $contenidoModal .=  "    <li class='list-group-item lp'><b>Fecha de ensamblaje</b>: $fechaEnsamble</li>";
        $contenidoModal .=  "    <li class='list-group-item lp'><b>Fecha de ingreso a inventario</b>: $fechaInventario</li>";
        $contenidoModal .=  "</ul>";

        $modal->modalAlerta('text-primary', 'Informacion del vehiculo', $contenidoModal);
    }

    public function editCarro(Modal $modal, $idVehiculo)
    {
        $infoCarro = Carro::where('idCarro', $idVehiculo)->get();

        foreach ($infoCarro as $key => $value) {
            $idCarro = $value['idCarro'];
            $modeloCarro = $value['modeloCarro'];
            $fechaEnsamble = $value['fechaEnsamble'];
        }

        $contenidoModal = " <div class='col-12'>";
        $contenidoModal .= "     <div class='form-floating mb-3'>";
        $contenidoModal .= "         <input type='text' class='form-control' id='idCarro'value='$idCarro' hidden>";
        $contenidoModal .= "         <input type='text' class='form-control' id='modeloCarro' placeholder='Modelo vehiculo' value='$modeloCarro'>";
        $contenidoModal .= "         <label for='modeloCarro'>Modelo vehiculo</label>";
        $contenidoModal .= "     </div>";
        $contenidoModal .= "     <div class='form-floating mb-3'>";
        $contenidoModal .= "         <input type='date' class='form-control' id='fechaEnsamble' placeholder='Fecha ensamble' value='$fechaEnsamble'>";
        $contenidoModal .= "         <label for='fechaEnsamble'>Fecha ensamble</label>";
        $contenidoModal .= "     </div>";
        $contenidoModal .= " </div>";
        $contenidoModal .= "<div class='d-grid'>";
        $contenidoModal .= "<button type='submit' class='btn btn-primary' id='btn_update_carro'>Modificar</button>";
        $contenidoModal .= "</div>";

        $modal->modalAlerta('text-primary', 'Editar Carro', $contenidoModal);
    }

    public function updateCarro(Request $request, Carro $carro, Modal $modal, $idCarro)
    {
        $carro = Carro::find($idCarro);
        $carro->modeloCarro = $request->modeloCarro;
        $carro->fechaEnsamble = $request->fechaEnsamble;
        if ($carro->update()) {
            $modal->modalAlerta("text-primary", "Informacion", "informacion modificada exitosamente");
        }
    }
}
