<?php

namespace App\Http\Controllers;

use App\Models\Productora;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    public function viewConfiguracion(){
         $productora = Productora::all();
                
        return view('configuracion', compact('productora'));
    }

    public function createProductora(){
        
    }

    public function showProductora($productora){
        
    }
}
