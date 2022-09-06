<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use Illuminate\Http\Request;
use App\Models\Pruebas;

class PruebasController extends Controller
{
    
    public function viewPruebas()
    {
        $data = Pruebas::all();
        $bodega = Bodega::all();
        // return response()->json($data, 200, []);
        // return "json";
        return view('pruebas', compact('data', 'bodega'));
    }

    public function Pruebas()
    {
        $data = Pruebas::all();
        // return response()->json($data, 200, []);
        // return "json";
        return view('pruebas', compact('data'));
    }
}
