<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrosController extends Controller
{
    
    public function viewCarros(){

        return view('carros');
    }
}
