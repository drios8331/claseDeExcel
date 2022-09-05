<?php

namespace App\Http\Controllers;

use App\Custom\Modal;
use App\Models\Productora;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    public function viewConfiguracion()
    {
        $productora = Productora::all();

        return view('configuracion', compact('productora'));
    }

    public function createProductora(Request $request, Productora $productora, Modal $modal)
    {
        if (empty($request->productora) != 1) {
            $productora->nombreProductora = $request->productora;
            if ($productora->save()) {
                $modal->modalAlerta("text-primary", "Informacion", "informacion enviada exitosamente");
            }
        }else {
            $modal->modalAlerta("text-warning", "Informacion", "Todos los campos son requeridos");
        }
    }

    public function showProductora($productora)
    {
    }

    public function modalInsertarProductora(Modal $modal)
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

}
