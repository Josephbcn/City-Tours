<?php

namespace App\Http\Controllers;

use App\Models\LugaresT;
use App\Models\Paquete;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index(){
        $lugares = LugaresT::all();
        $paquetes = Paquete::all();
        return view('welcome', compact('lugares', 'paquetes'));
    }
}
