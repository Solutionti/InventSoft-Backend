<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Proveedores extends Model
{
    use HasFactory;

    public function getPtoveedores(){
        $proveedores = DB::table('proveedores')
                          ->select('*')
                          ->get();

        return $proveedores;
    }

    public function getProveedoresId($nit){
        $proveedores = DB::table('proveedores')
                          ->select('*')
                          ->where('nit', $nit)
                          ->first();

        return $proveedores;
    }

    public function insertProveedores($request){
        $proveedores = [
            "nombre" => $request['nombre'],
            "nit" => $request['nit'],
            "telefono" => $request['telefono'],
            "correo" => $request['correo'],
            "descripcion" => $request['descripcion'],
        ];
        DB::table('proveedores')
           ->insert($proveedores);
    }

    public function updateProveedores($request){
        $proveedores = [
            "nombre" => $request['nombre'],
            "nit" => $request['nit'],
            "telefono" => $request['telefono'],
            "correo" => $request['correo'],
            "descripcion" => $request['descripcion'],
        ];
        DB::table('proveedores')
           ->where('nit', $nit)
           ->update($proveedores);
    }




}
