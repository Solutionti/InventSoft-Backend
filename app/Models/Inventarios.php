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

    public function getCategorias(){
        $categoria = DB::table('categorias')
        ->select('*')
        ->get();

        return $categoria;
    }

    public function getProductoKardex(){
        $producto = DB::table('kardex')
                       ->select('*')
                       ->get();

        return $producto;
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

    public function entradaKardex($request){
        $kardex = [
            "id_producto" => $request['id_producto'],
            "tp_documento" => $request['tp_documento'],
            "entrada" => $request['entrada'],
            "salida" => $request['salida'],
            "devolucion" => $request['devolucion'],
            "fecha" => $request['fecha'],
            "hora" => $request['hora'],
            "descripcion" => $request['descripcion'],
            "usuario" => $request['usuario'],
            "sede" => $request['sede'],
            "motivo" => $request['motivo'],
            "saldo" => $request['saldo'],
        ];
        DB::table('kardex')
           ->insert($kardex);
    }

    public function getProductoStock($codigo) {
      $stock = DB::table("productos")
                  ->select("stock")
                  ->where("codigo_producto", $codigo)
                  ->first();

      return $stock;
    }

    public function getProductStock($codigo) {
        $stock = DB::table("productos")
                    ->select("stock")
                    ->where("codigo_producto", $codigo)
                    ->first();

        return $stock;
      }

      public function salidakardex($request){
        $kardex = [
            "id_producto" => $request['id_producto'],
            "tp_documento" => $request['tp_documento'],
            "entrada" => $request['entrada'],
            "salida" => $request['salida'],
            "devolucion" => $request['devolucion'],
            "fecha" => $request['fecha'],
            "hora" => $request['hora'],
            "descripcion" => $request['descripcion'],
            "usuario" => $request['usuario'],
            "sede" => $request['sede'],
            "motivo" => $request['motivo'],
            "saldo" => $request['saldo']
        ];
        DB::table('kardex')
           ->insert($kardex);
      }
//esta funcion se utiliza para actualizar el stock del kardex
      public function actualizarEstadoStock($stock, $codigo) {
        $producto = [
          "stock" => $stock
        ];
        DB::table("productos")
            ->where("codigo_producto", $codigo)
            ->update($producto);
      }
// esta funcion para no repetir codigos unicos de la tabla productos
      public function validarExitenteProducto($codigo) {
        $producto = DB::table("productos")
                       ->select("*")
                       ->where("codigo", $codigo)
                       ->get();

        return $producto;
      }
}
