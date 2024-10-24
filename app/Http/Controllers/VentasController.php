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

    public function getCompras(){

        return $this->Ventas->getCompras();
    }

    public function getComprasInsert(Request $request){
        try{
            $categoria = $request->categoria;
            $proveedor = $request->proveedor;
            $fecha = $request->fecha;
            $fecha_limite = $request->fecha_limite;
            $descripcion = $request->descripcion;
            $precio = $request->precio;
            $usuario = $request->usuario;
            $porpagar = $request->porpagar;

            $gastos = [
                "categoria" => $categoria,
                "proveedor" => $proveedor,
                "fecha" => $fecha,
                "fecha_limite" => $fecha_limite,
                "descripcion" => $descripcion,
                "precio" => $precio,
                "usuario" => $usuario,
                "porpagar" => $porpagar,
            ];
            $this->Ventas->getComprasInsert($gastos);

            return response()->json([
                'message' => 'El gasto se ha creado en la base de datos',
                'status' => 200
              ]);
        }
        catch(\exception $e){
            return response()->json([
                'status' => 400,
                'message' => $e->getMessage()
              ]);
        };
    }
}
