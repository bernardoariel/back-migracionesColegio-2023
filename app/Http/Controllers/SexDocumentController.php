<?php

namespace App\Http\Controllers;

use App\Models\Sex;
use Illuminate\Http\Request;

class SexDocumentController extends Controller
{
    public function getSexos(){
        return response()->json(Sex::all(),200);
    }

    public function getSexoId($id){

        $sexos = Sex::find($id);

        if(is_null($sexos)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
        }

        return response()->json($sexos::find($id),200);
    }
}
