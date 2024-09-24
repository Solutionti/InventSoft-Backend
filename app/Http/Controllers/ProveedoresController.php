<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedores;

class ProveedoresController extends Controller
{
    public function __construct() {
        $this->Proveedores = new Proveedores();
      }
    //

    public function getProveedores(){
        return $this->Proveedores->getProveedores();
    }

    public function getProveedoresId(){
        $nit = $request->nit;
        return $this->proveedores->getProveedoresId($nit);
    }

    public function insertProveedores($request){
        try{
            $nombre = $request->nombre;
            $nit = $request->nit;
            $telefono = $request->telefono;
            $correo = $request->correo;
            $descripcion = $request->descripcion;

            $proveedores = [
                "nombre" => $nombre,
                "nit" => $nit,
                "telefono" => $telefono,
                "correo" => $correo,
                "descripcion" => $descripcion,
            ];
            $this->proveedores->insertProveedores($proveedores);

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

    public function updateProveedores($request){
        try{
            $nombre = $request->nombre;
            $nit = $request->nit;
            $telefono = $request->telefono;
            $correo = $request->correo;
            $descripcion = $request->descripcion;

            $proveedores = [
                "nombre" => $nombre,
                "nit" => $nit,
                "telefono" => $telefono,
                "correo" => $correo,
                "descripcion" => $descripcion,
            ];
            $this->proveedores->updateProveedores($proveedores, $request->nit);

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
}
