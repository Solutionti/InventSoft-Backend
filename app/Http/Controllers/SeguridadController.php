<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seguridad;

class SeguridadController extends Controller
{
    public function __construct() {
        $this->Seguridad = new Seguridad();
      }
    //
    public function getUsuarios(){

        return $this->Seguridad->getUsuarios();
    }
}
