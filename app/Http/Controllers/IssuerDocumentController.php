<?php

namespace App\Http\Controllers;

use App\Models\IssuerDocument;
use Illuminate\Http\Request;

class IssuerDocumentController extends Controller
{
    public function getEmisorDocumentos(){
        return response()->json(IssuerDocument::all(),200);
    }

    public function getEmisorDocumentoId($id){

        $emisor_documento = IssuerDocument::find($id);

        if(is_null($emisor_documento)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
        }

        return response()->json($emisor_documento::find($id),200);
    }
}
