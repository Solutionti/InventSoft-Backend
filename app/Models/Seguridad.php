<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Seguridad extends Model
{
    use HasFactory;

    public function getUsuarios(){
        $usuarios = DB::table('usuarios')
                       ->select('*')
                       ->get();

        return $usuarios;
    }

}
