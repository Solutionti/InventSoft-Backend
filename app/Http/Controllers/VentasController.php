<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;

class VentasController extends Controller
{
    //
    public function __construct() {
        $this->Ventas = new Ventas();
      }

    public function getPedido(){

        return $this->Ventas->getPedido();

    }
}
