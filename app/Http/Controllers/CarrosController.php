<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use App\Custom\Modal;
use App\Models\Bodega;
use App\Models\Productora;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class CarrosController extends Controller
{
    
    public function viewCarros(){

        $productora = Productora::all();
        $bodega = Bodega::all();
        $carros = Carro::join('tblbodegas', 'tblcarros.fk_Bodega', 'tblbodegas.idBodega')
        ->join('tblproductoras', 'tblcarros.fk_Productora', 'tblproductoras.idProductora')
        ->select('tblcarros.idCarro as id', 'tblcarros.nombreCarro as nombre', 
        'tblproductoras.nombreProductora as productora', 'tblcarros.fechaEnsamble as ensamble', 
        'tblbodegas.nombreBodega as bodega', 'tblbodegas.ciudadBodega as ciudad', 
        'tblcarros.matriculaCarro as matricula', 'tblcarros.modeloCarro as modelo')->get();

        return view('carros', compact('carros', 'productora', 'bodega'));
        
    }

    public function createCarros(Request $request, Carro $carro, Modal $modal)
    {
        if (empty($request->productora) != 1) {
            $carro->nombreProductora = $request->carro;
            if ($carro->save()) {
                $modal->modalAlerta("text-primary", "Informacion", "informacion enviada exitosamente");
            }
        } else {
            $modal->modalAlerta("text-warning", "Informacion", "Todos los campos son requeridos");
        }
    }
}
