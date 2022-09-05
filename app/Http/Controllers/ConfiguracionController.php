<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Custom\Modal;
use App\Models\Productora;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    public function viewConfiguracion()
    {
        $productora = Productora::all();
        $bodegas = Bodega::all();

        return view('configuracion', compact('productora', 'bodegas'));
    }

    // public function viewBodega()
    // {
    //     $bodegas = Bodega::all();

    //     return view('configuracion', compact('bodegas'));
    // }

    public function createProductora(Request $request, Productora $productora, Modal $modal)
    {
        if (empty($request->productora) != 1) {
            $productora->nombreProductora = $request->productora;
            if ($productora->save()) {
                $modal->modalAlerta("text-primary", "Informacion", "informacion enviada exitosamente");
            }
        } else {
            $modal->modalAlerta("text-warning", "Informacion", "Todos los campos son requeridos");
        }
    }

    public function editProductora(Request $request, Modal $modal, $infoProductora)
    {
        // if (empty($request->modalInfoProductora) != 1) {

        //     $productora = Productora::where('idProductora', $infoProductora)->get();

        //     foreach ($productora as $key => $value) {
        //         $nombreProductora = $value['nombreProductora'];
        //     }

        //     $contenidoModal = " <table>";
        //     $contenidoModal = " <tr>";
        //     $contenidoModal = " <th>Nombre de la planta</th>";
        //     $contenidoModal = " </tr>";
        //     $contenidoModal = " <tr>";
        //     $contenidoModal = " <td>$nombreProductora</td>";
        //     $contenidoModal = " </tr>";

            $modal->modalAlerta('text-primary', 'Informacion Empresa productora', 'Prueba');
        // } else {
        //     $modal->modalAlerta('text-primary', 'Informacion Empresa productora', 'Todos los campos son requeridos');
        // }
    }

    public function createBodega(Request $request, Bodega $bodega, Modal $modal)
    {
        if (empty($request->bodega) != 1) {
            $bodega->nombreBodega = $request->bodega;
            $bodega->ciudadBodega = $request->ciudad;
            if ($bodega->save()) {
                $modal->modalAlerta("text-primary", "Informacion", "informacion enviada exitosamente");
            }
        } else {
            $modal->modalAlerta("text-warning", "Informacion", "Todos los campos son requeridos");
        }
    }

    public function modalInsertarProductora(Request $request, Modal $modal)
    {

        // $url = route('configuracion');

        $contenidoModal = " @csrf";
        $contenidoModal = " <div class='col-12'>";
        $contenidoModal .= "     <div class='form-floating mb-3'>";
        $contenidoModal .= "         <input type='text' class='form-control' id='productora' placeholder='Productora'>";
        $contenidoModal .= "         <label for='productora'>Nombre productora</label>";
        $contenidoModal .= "     </div>";
        $contenidoModal .= " </div>";
        $contenidoModal .= "<div class='d-grid'>";
        $contenidoModal .= "<button type='submit' class='btn btn-primary' id='btn_insertar_productora'>Agregar</button>";
        $contenidoModal .= "</div>";

        $modal->modalAlerta('text-primary', 'Insertar Empresa productora de carro', $contenidoModal);
    }

    public function modalInfoProductora(Request $request, Modal $modal, $infoProductora)
    {
        
    }

    public function modalUpdateProductora(Modal $modal)
    {

        // $url = route('configuracion');

        $contenidoModal = " @csrf";
        $contenidoModal = " <div class='col-12'>";
        $contenidoModal .= "     <div class='form-floating mb-3'>";
        $contenidoModal .= "         <input type='text' class='form-control' id='productora' placeholder='Productora'>";
        $contenidoModal .= "         <label for='productora'>Nombre productora</label>";
        $contenidoModal .= "     </div>";
        $contenidoModal .= " </div>";
        $contenidoModal .= "<div class='d-grid'>";
        $contenidoModal .= "<button type='submit' class='btn btn-primary' id='btn_insertar_productora'>Agregar</button>";
        $contenidoModal .= "</div>";

        $modal->modalAlerta('text-primary', 'Insertar Empresa productora de carro', $contenidoModal);
    }

    public function modalInsertarBodega(Modal $modal)
    {

        // $url = route('configuracion');

        $contenidoModal = " <div class='col-12'>";
        $contenidoModal .= "     <div class='form-floating mb-3'>";
        $contenidoModal .= "         <input type='text' class='form-control' id='bodega' placeholder='Bodega'>";
        $contenidoModal .= "         <label for='bodega'>Nombre bodega</label>";
        $contenidoModal .= "     </div>";
        $contenidoModal .= " </div>";
        $contenidoModal .= " <div class='col-12'>";
        $contenidoModal .= "     <div class='form-floating mb-3'>";
        $contenidoModal .= "         <input type='text' class='form-control' id='ciudad' placeholder='Ciudad'>";
        $contenidoModal .= "         <label for='ciudad'>Ciudad</label>";
        $contenidoModal .= "     </div>";
        $contenidoModal .= " </div>";
        $contenidoModal .= "<div class='d-grid'>";
        $contenidoModal .= "<button type='submit' class='btn btn-primary' id='btn_insertar_bodega'>Agregar</button>";
        $contenidoModal .= "</div>";

        $modal->modalAlerta('text-primary', 'Insertar Bodega', $contenidoModal);
    }
}
