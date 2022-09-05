<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Custom\Modal;

class BodegasController extends Controller
{
    public function viewBodegas(){

        return view('bodegas');
    }

    public function modalInsertarProductora(Modal $modal)
    {

        // $url = route('configuracion');

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
