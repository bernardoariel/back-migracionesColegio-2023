<?php

namespace App\Http\Controllers;

use App\Models\OtherParents;
use Illuminate\Http\Request;

class OtherParentsController extends Controller
{
    public function getOtrosProgenitores(){
        return response()->json(OtherParents::all(),200);
    }

    public function getOtroProgenitorId($id){

        $otrosParientes = OtherParents::find($id);

        if(is_null($otrosParientes)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
        }

        return response()->json($otrosParientes::find($id),200);
    }

    public function agregarProgenitor(Request $request){

        $otrosParientes = OtherParents::create($request->all());
        return response($otrosParientes,200);

    }

    public function actualizarProgenitor(Request $request, $id){

        $otrosParientes = OtherParents::find($id);

        if(is_null($otrosParientes)){

            return response()->json(['Mensaje'=>'Registro no encontrado'],404);

        }

        $otrosParientes->update($request->all());

        return response($otrosParientes,200);
    }
    public function eliminarProgenitor($id){

        $otrosParientes = OtherParents::find($id);

        if(is_null($otrosParientes)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
        }

        $otrosParientes->delete();

        return response()->json(['mensaje'=>'registro eliminado'],200);
    }
}
