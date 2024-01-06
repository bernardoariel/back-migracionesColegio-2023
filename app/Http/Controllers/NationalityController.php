<?php

namespace App\Http\Controllers;

use App\Models\Nationality;
use Illuminate\Http\Request;

class NationalityController extends Controller
{

    public function getNacionalidades(){
        return response()->json(Nationality::all(),200);
    }

    public function getNacionalidadId($id){

        $nacionalidad = Nationality::find($id);

        if(is_null($nacionalidad)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
        }

        return response()->json($nacionalidad::find($id),200);
    }
}
