<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BodegasController extends Controller
{
    public function viewBodegas(){

        return view('bodegas');
    }
}
