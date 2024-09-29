<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventarios;

class InventariosController extends Controller
{
    public function __construct() {
        $this->Inventarios = new Inventarios();
      }
    //
    public function getProductos(){

        return $this->Inventarios->getProductos();
    }

    public function getCategorias(){

        return $this->Inventarios->getCategorias();
    }

    public function getProductosId(Request $request){
        $codigo = $request->codigo;
        return $this->Inventarios->getProductosId($codigo);
    }

    public function insertProducto(Request $request){
        try{
            $url_imagen = $request->url_imagen;
            $categoria = $request->categoria;
            $codigo = $request->codigo;
            $codigo_barras = $request->codigo_barras;
            $nombre = $request->nombre;
            $medida = $request->medida;
            $precio = $request->precio;
            $costo_proveedor = $request->costo_proveedor;
            $moneda = $request->moneda;
            $descripcion = $request->descripcion;
            $stock = $request->stock;
            $estado = $request->estado;
            $cantidad = $request->cantidad;
            $fecha = date('Y-d-m');
            $hora = date('H:i');
            $usuario = $request->usuario;
            $producto_venta = $request->producto_venta;
            $producto_ecommerce = $request->producto_ecommerce;
            $merma = $request->merma;

            $producto = [
                "url_imagen" => $url_imagen,
                "categoria" => $categoria,
                "codigo" => $codigo,
                "codigo_barras" => $codigo_barras,
                "nombre" => $nombre,
                "medida" => $medida,
                "precio" => $precio,
                "costo_proveedor" => $costo_proveedor,
                "moneda" => $moneda,
                "descripcion" => $descripcion,
                "stock" => $stock,
                "estado" => $estado,
                "cantidad" => $cantidad,
                "fecha" => $fecha,
                "hora" => $hora,
                "usuario" => $usuario,
                "producto_venta" => $producto_venta,
                "producto_ecommerce" => $producto_ecommerce,
                "merma" => $merma,
            ];

            $this->producto->insertProducto($producto);

            return response()->json([
                'message' => 'La ecografia genetica se ha creado en la base de datos',
                'status' => 200
              ]);
        }
        catch(\exception $e){
            return response()->json([
                'status' => 400,
                'message' => $e->getMessage()
              ]);
        }
    }

    public function updateProducto(Request $request){
        try{
            $url_imagen = $request->url_imagen;
            $categoria = $request->categoria;
            $codigo = $request->codigo;
            $codigo_barras = $request->codigo_barras;
            $nombre = $request->nombre;
            $medida = $request->medida;
            $costo_proveedor = $request->costo_proveedor;
            $moneda = $request->moneda;
            $descripcion = $request->descripcion;
            $stock = $request->stock;
            $estado = $request->estado;
            $cantidad = $request->cantidad;
            $fecha = $request->fecha;
            $hora = $request->hora;
            $usuario = $request->usuario;
            $producto_venta = $request->producto_venta;
            $producto_ecommerce = $request->producto_ecommerce;
            $merma = $request->merma;

            $producto = [
                "url_imagen" => $url_imagen,
                "categoria" => $categoria,
                "codigo" => $codigo,
                "codigo_barras" => $codigo_barras,
                "nombre" => $nombre,
                "medida" => $medida,
                "precio" => $precio,
                "costo_proveedor" => $costo_proveedor,
                "moneda" => $moneda,
                "descripcion" => $descripcion,
                "stock" => $stock,
                "estado" => $estado,
                "cantidad" => $cantidad,
                "fecha" => $fecha,
                "hora" => $hora,
                "usuario" => $usuario,
                "producto_venta" => $producto_venta,
                "producto_ecommerce" => $producto_ecommerce,
                "merma" => $merma,
            ];

            $this->producto->updateProducto($producto, $request->codigo);

            return response()->json([
                'message' => 'La ecografia genetica se ha creado en la base de datos',
                'status' => 200
              ]);
        }
        catch(\exception $e){
            return response()->json([
                'status' => 400,
                'message' => $e->getMessage()
              ]);
        }
    }

    public function postAgregarProductos(Request $request){
        try{
            $url_imagen = $request->url_imagen;
            $categoria = $request->categoria;
            $codigo = $request->codigo;
            $codigo_barras = $request->codigo_barras;
            $nombre = $request->nombre;
            $medida = $request->medida;
            $precio = $request->precio;
            $costo_proveedor = $request->costo_proveedor;
            $moneda = $request->moneda;
            $descripcion = $request->descripcion;
            $stock = $request->stock;
            $estado = "ACTIVO";
            $cantidad = $request->cantidad;
            $fecha = date("Y-m-d");
            $hora = date("H:i");
            $usuario = $request->usuario;
            $producto_venta = $request->producto_venta;
            $producto_ecommerce = $request->producto_ecommerce;
            $merma = 0;

            $producto = [
                "url_imagen" => $url_imagen,
                "categoria" => $categoria,
                "codigo" => $codigo,
                "codigo_barras" => $codigo_barras,
                "nombre" => $nombre,
                "medida" => $medida,
                "precio" => $precio,
                "costo_proveedor" => $costo_proveedor,
                "moneda" => $moneda,
                "descripcion" => $descripcion,
                "stock" => $stock,
                "estado" => $estado,
                "cantidad" => $cantidad,
                "fecha" => $fecha,
                "hora" => $hora,
                "usuario" => $usuario,
                "producto_venta" => $producto_venta,
                "producto_ecommerce" => $producto_ecommerce,
                "merma" => $merma,
            ];

            $this->Inventarios->postAgregarProductos($producto);

            return response()->json([
                'message' => 'El producto se ha creado en la base de datos',
                'status' => 200
              ]);
        }
        catch(\exception $e){
            return response()->json([
                'status' => 400,
                'message' => $e->getMessage()
              ]);
        }
    }
}
