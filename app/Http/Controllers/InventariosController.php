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

    public function getProductoKardex(){

        return $this->Inventarios->getProductoKardex();
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
            $producto_venta = 0;
            $producto_ecommerce = $request->producto_ecommerce;
            $merma = 0;

            // IMAGEN 1
            $imagen = $request->file("url_imagen");
            $nombreimagen = $imagen->getClientOriginalName();
            $ruta = public_path("productos/");
            $rutacompleta = $codigo_barras.'-'.$nombreimagen;
            copy($imagen->getRealPath(),$ruta.$rutacompleta);
        // **************************************************

            $producto = [
                "url_imagen" => $rutacompleta,
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

    public function entradaKardex(Request $request){
        try {
            $id_producto = $request->producto_entrada;
            $tp_documento = $request->tp_documento;
            $entrada = $request->cantidad_entrada;
            $salida = $request->salida;
            $devolucion = "0";
            $fecha = date('Y-m-d');
            $hora = date('h:i');
            $descripcion = $request->comentarios_entrada;
            $usuario = $request->usuario;
            $sede = "001";
            $motivo = "Compra";
            $saldo = $request->saldo;

            $entradaa = [
                "id_producto" => $id_producto,
                "tp_documento" => "NE",
                "entrada" => $entrada,
                "salida" => 0,
                "devolucion" => $devolucion,
                "fecha" => $fecha,
                "hora" => $hora,
                "descripcion" => $descripcion,
                "usuario" => $usuario,
                "sede" => $sede,
                "motivo" => $motivo,
                "saldo" => 0,
            ];
            $this->Inventarios->entradaKardex($entradaa);

            return response()->json([
                'message' => 'la Entrada se ha creado en la base de datos',
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

    public function getProductoStock(Request $request ) {
      $codigo = $request->codigo;

      return $this->Inventarios->getProductoStock($codigo);
    }

    public function getProductStock(Request $request ) {
        $codigo = $request->codigo;

        return $this->Inventarios->getProductStock($codigo);
      }

      public function salidakardex(Request $request){
        try{
            $id_producto = $request->id_producto;
            $tp_documento = 'NE';
            $entrada = $request->entrada;
            $salida = $request->salida;
            $devolucion = '0';
            $fecha = date('Y-m-d');
            $hora = date('H:i');
            $descripcion = $request->descripcion;
            $usuario = $request->usuario;
            $sede = '001';
            $motivo = 'Gasto';
            $saldo = $request->saldo;

            $kardex = [
                "id_producto" => $id_producto,
                "tp_documento" => $tp_documento,
                "entrada" => 0,
                "salida" => $salida,
                "devolucion" => $devolucion,
                "fecha" => $fecha,
                "hora" => $hora,
                "descripcion" => $descripcion,
                "usuario" => $usuario,
                "sede" => $sede,
                "motivo" => $motivo,
                "saldo" => 0,
            ];
            $this->Inventarios->salidakardex($kardex);

            return response()->json([
                'message' => 'la salida se ha creado en la base de datos',
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
