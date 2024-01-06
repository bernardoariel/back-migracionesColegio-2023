<?php

namespace App\Http\Controllers;

use App\Models\Persons;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function gePersonas(){
        return response()->json(Persons::all(),200);
    }

    public function getPersonaId($id){

        $persona = Persons::find($id);

        if(is_null($persona)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
        }

        return response()->json($persona::find($id),200);
    }

    public function agregarPersona(Request $request){

        $persona = Persons::create($request->all());
        return response($persona,200);

    }

    public function actualizarPersona(Request $request, $id){

        $persona = Persons::find($id);

        if(is_null($persona)){

            return response()->json(['Mensaje'=>'Registro no encontrado'],404);

        }

        $persona->update($request->all());

        return response($persona,200);
    }
    public function eliminarPersona($id){

        $persona = Persons::find($id);

        if(is_null($persona)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
        }

        $persona->delete();

        return response()->json(['mensaje'=>'registro eliminado'],200);
    }
}
