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

    public function updateProductora(Request $request, Productora $productora, Modal $modal, $idProd)
    {
            $productora = Productora::find($idProd);
            $productora->nombreProductora = $request->nombre;
            if ($productora->update()) {
                $modal->modalAlerta("text-primary", "Informacion", "informacion enviada exitosamente");
            }
    }

    public function modalInsertarProductora(Modal $modal)
    {

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

    public function infoProductora($id, Modal $modal)
    {

        $info = Productora::where('idProductora', $id)->get();

        foreach ($info as $key => $value) {
            $nameProd = $value['nombreProductora'];
        }

        $contenidoModal = " <table class='table'>";
        $contenidoModal .= "  <thead>";
        $contenidoModal .= "    <tr>";
        $contenidoModal .= "      <th class='fs-5'>Nombre Empresa Productora</th>";
        $contenidoModal .= "    </tr>";
        $contenidoModal .= "  </thead>";
        $contenidoModal .= "  <tbody>";
        $contenidoModal .= "    <tr>";
        $contenidoModal .= "      <td><b>$nameProd</b></td>";
        $contenidoModal .= "    </tr>";
        $contenidoModal .= "  </tbody>";
        $contenidoModal .= "</table>";


        $modal->modalAlerta('text-primary', 'Insertar Empresa productora de carro', $contenidoModal);
    }

    public function editProductora(Modal $modal, $id)
    {
        $info = Productora::where('idProductora', $id)->get();

        foreach ($info as $key => $value) {
            $idProd = $value['idProductora'];
            $nameProd = $value['nombreProductora'];
        }

        $contenidoModal = " @csrf";
        $contenidoModal = " <div class='col-12'>";
        $contenidoModal .= "     <div class='form-floating mb-3'>";
        $contenidoModal .= "         <input type='text' class='form-control' id='idProductoraUpdate' value='$idProd' hidden>";
        $contenidoModal .= "         <input type='text' class='form-control' id='productoraUpdate' placeholder='Productora' value='$nameProd'>";
        $contenidoModal .= "         <label for='productora'>Nombre productora</label>";
        $contenidoModal .= "     </div>";
        $contenidoModal .= " </div>";
        $contenidoModal .= "<div class='d-grid'>";
        $contenidoModal .= "<button type='submit' class='btn btn-primary' id='btn_update_productora'>Modificar</button>";
        $contenidoModal .= "</div>";

        $modal->modalAlerta('text-primary', 'Insertar Empresa productora de carro', $contenidoModal);
    }


    public function modalInsertarBodega(Modal $modal)
    {

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

    public function infoBodega($idBodega, Modal $modal)
    {

        $info = Bodega::where('idBodega', $idBodega)->get();

        foreach ($info as $key => $value) {
            $nameBodega = $value['nombreBodega'];
            $ciudadBodega = $value['ciudadBodega'];
        }

        $contenidoModal = " <table class='table'>";
        $contenidoModal .= "  <thead>";
        $contenidoModal .= "    <tr>";
        $contenidoModal .= "      <th class='fs-5'>Nombre Bodega</th>";
        $contenidoModal .= "      <th class='fs-5'>Ciudad Ubicacion</th>";
        $contenidoModal .= "    </tr>";
        $contenidoModal .= "  </thead>";
        $contenidoModal .= "  <tbody>";
        $contenidoModal .= "    <tr>";
        $contenidoModal .= "      <td><b>$nameBodega</b></td>";
        $contenidoModal .= "      <td><b>$ciudadBodega</b></td>";
        $contenidoModal .= "    </tr>";
        $contenidoModal .= "  </tbody>";
        $contenidoModal .= "</table>";


        $modal->modalAlerta('text-primary', 'Insertar Empresa productora de carro', $contenidoModal);
    }

    public function editBodega(Modal $modal, $idBodega)
    {
        $infoBodega = Bodega::where('idBodega', $idBodega)->get();

        foreach ($infoBodega as $key => $value) {
            $idBodega = $value['idBodega'];
            $nameBodega = $value['nombreBodega'];
            $ciudadBodega = $value['ciudadBodega'];
        }

        $contenidoModal = " <div class='col-12'>";
        $contenidoModal .= "     <div class='form-floating mb-3'>";
        $contenidoModal .= "         <input type='text' class='form-control' id='idBodega'value='$idBodega' hidden>";
        $contenidoModal .= "         <input type='text' class='form-control' id='nombreBodega' placeholder='Nombre Bodega' value='$nameBodega'>";
        $contenidoModal .= "         <label for='nombreBodega'>Nombre Bodega</label>";
        $contenidoModal .= "     </div>";
        $contenidoModal .= "     <div class='form-floating mb-3'>";
        $contenidoModal .= "         <input type='text' class='form-control' id='ciudad' placeholder='Ciudad' value='$ciudadBodega'>";
        $contenidoModal .= "         <label for='ciudad'>Ciudad</label>";
        $contenidoModal .= "     </div>";
        $contenidoModal .= " </div>";
        $contenidoModal .= "<div class='d-grid'>";
        $contenidoModal .= "<button type='submit' class='btn btn-primary' id='btn_update_bodega'>Modificar</button>";
        $contenidoModal .= "</div>";

        $modal->modalAlerta('text-primary', 'Insertar Bodegas', $contenidoModal);
    }

    public function updateBodega(Request $request, Bodega $bodega, Modal $modal, $idBod)
    {
        if (empty($request->nomBod) != 1) {
            $bodega = Bodega::find($idBod);
            $bodega->nombreBodega = $request->nomBod;
            $bodega->ciudadBodega = $request->ciuBod;
            if ($bodega->update()) {
                $modal->modalAlerta("text-primary", "Informacion", "informacion actualizada exitosamente");
            }
        } else {
            $modal->modalAlerta("text-warning", "Informacion", "Todos los campos son requeridos");
        }
    }
}
