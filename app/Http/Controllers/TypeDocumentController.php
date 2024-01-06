<?php

namespace App\Http\Controllers;

use App\Models\TypeDocument;
use Illuminate\Http\Request;

class TypeDocumentController extends Controller
{
    public function getTipoDocumentos(){
        return response()->json(TypeDocument::all(),200);
    }

    public function getTipoDocumentoId($id){

        $tipoDocumento = TypeDocument::find($id);

        if(is_null($tipoDocumento)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
        }

        return response()->json($tipoDocumento::find($id),200);
    }
}
