<?php

namespace App\Http\Controllers;

use App\Models\AuthorizingRelative;
use Illuminate\Http\Request;

class AuthorizingRelativeController extends Controller
{
    public function getAuthorizacionesRelativas(){
        return response()->json(AuthorizingRelative::all(),200);
    }

    public function getAuthorizacioneRelativaId($id){

        $autorizacionesRelativas = AuthorizingRelative::find($id);

        if(is_null($autorizacionesRelativas)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
        }

        return response()->json($autorizacionesRelativas::find($id),200);
    }


}
