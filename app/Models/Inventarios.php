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
            "url_imagen" => $request['url_imagen'],
            "categoria" => $request['categoria'],
            "codigo" => $request['codigo'],
            "codigo_barras" => $request['codigo_barras'],
            "nombre" => $request['nombre'],
            "medida" => $request['medida'],
            "precio" => $request['precio'],
            "costo_proveedor" => $request['costo_proveedor'],
            "moneda" => $request['moneda'],
            "descripcion" => $request['descripcion'],
            "stock" => $request['stock'],
            "estado" => $request['estado'],
            "cantidad" => $request['cantidad'],
            "fecha" => $request['fecha'],
            "hora" => $request['hora'],
            "usuario" => $request['usuario'],
            "producto_venta" => $request['producto_venta'],
            "producto_ecommerce" => $request['producto_ecommerce'],
            "merma" => $request['merma'],
        ];
        DB::table('productos')
            ->insert($producto);
    }

    public function updateProducto($codigo){
        $producto = [
            "url_imagen" => $request['url_imagen'],
            "categoria" => $request['categoria'],
            "codigo" => $request['codigo'],
            "codigo_barras" => $request['codigo_barras'],
            "nombre" => $request['nombre'],
            "medida" => $request['medida'],
            "precio" => $request['precio'],
            "costo_proveedor" => $request['costo_proveedor'],
            "moneda" => $request['moneda'],
            "descripcion" => $request['descripcion'],
            "stock" => $request['stock'],
            "estado" => $request['estado'],
            "cantidad" => $request['cantidad'],
            "fecha" => $request['fecha'],
            "hora" => $request['hora'],
            "usuario" => $request['usuario'],
            "producto_venta" => $request['producto_venta'],
            "producto_ecommerce" => $request['producto_ecommerce'],
            "merma" => $request['merma'],
        ];
        DB::table('productos')
            ->where('codigo', $codigo)
            ->update($producto);
    }

    public function getCategorias(){
        $categoria = DB::table('categorias')
                        ->select('*')
                        ->get();

        return $categoria;
    }

    public function postAgregarProductos($request){
        $producto = [
            "url_imagen" => $request['url_imagen'],
            "categoria" => $request['categoria'],
            "codigo" => $request['codigo_barras'],
            "codigo_barras" => $request['codigo_barras'],
            "nombre" => $request['nombre'],
            "medida" => $request['medida'],
            "precio" => $request['precio'],
            "costo_proveedor" => $request['costo_proveedor'],
            "moneda" => $request['moneda'],
            "descripcion" => $request['descripcion'],
            "stock" => $request['stock'],
            "estado" => $request['estado'],
            "cantidad" => $request['cantidad'],
            "fecha" => $request['fecha'],
            "hora" => $request['hora'],
            "usuario" => $request['usuario'],
            "producto_venta" => $request['producto_venta'],
            "producto_ecommerce" => $request['producto_ecommerce'],
            "merma" => $request['merma'],
        ];
        DB::table('productos')
           ->insert($producto);
    }
}
