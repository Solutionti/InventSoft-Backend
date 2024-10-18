<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ventas extends Model
{
    use HasFactory;

    public function getPedido(){
        $pedido = DB::table('pedidos')
                     ->select('*')
                     ->get();
        return $pedido;
    }

    public function getCompras(){
        $compras = DB::table('gastos')
                      ->Select('*')
                      ->get();
        return $compras;
    }
}
