<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Inventarios extends Model
{
    use HasFactory;

    public function getProductos(){
        $productos = DB::table('productos')
                        ->select('*')
                        ->get();

        return $productos;
    }

    public function getProductosId($codigo){
        $productos = DB::table('productos')
                        ->select('*')
                        ->where('codigo', $codigo)
                        ->first();

        return $productos;
    }

    public function insertProductos($request){
        $producto = [
            "url_imagen" => $request[''],
            "categoria" => $request[''],
            "codigo" => $request[''],
            "codigo_barras" => $request[''],
            "nombre" => $request[''],
            "medida" => $request[''],
            "precio" => $request[''],
            "costo_proveedor" => $request[''],
            "moneda" => $request[''],
            "descripcion" => $request[''],
            "stock" => $request[''],
            "estado" => $request[''],
            "cantidad" => $request[''],
            "fecha" => $request[''],
            "hora" => $request[''],
            "usuario" => $request[''],
            "producto_venta" => $request[''],
            "producto_ecommerce" => $request[''],
            "merma" => $request[''],
        ];
        DB::table('productos')
            ->insert($producto);
    }

    public function updateProducto($codigo){
        $producto = [
            "url_imagen" => $request[''],
            "categoria" => $request[''],
            "codigo" => $request[''],
            "codigo_barras" => $request[''],
            "nombre" => $request[''],
            "medida" => $request[''],
            "precio" => $request[''],
            "costo_proveedor" => $request[''],
            "moneda" => $request[''],
            "descripcion" => $request[''],
            "stock" => $request[''],
            "estado" => $request[''],
            "cantidad" => $request[''],
            "fecha" => $request[''],
            "hora" => $request[''],
            "usuario" => $request[''],
            "producto_venta" => $request[''],
            "producto_ecommerce" => $request[''],
            "merma" => $request[''],
        ];
        DB::table('productos')
            ->where('codigo', $codigo)
            ->update($producto);
    }
}
