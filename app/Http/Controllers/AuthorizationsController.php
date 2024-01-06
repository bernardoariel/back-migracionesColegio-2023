<?php

namespace App\Http\Controllers;

use App\Models\Authorizations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorizationsController extends Controller
{
    public function getAutorizantes(){
        return response()->json(Authorizations::all(),200);
    }
    public function getAutorizanteId($id){

        $autorizante = Authorizations::find($id);

        if(is_null($autorizante)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
        }

        return response()->json($autorizante::find($id),200);
    }

    public function agregarAutorizante(Request $request){

        $menor = Authorizations::create($request->all());
        return response($menor,200);

    }

    public function actualizarAutorizante(Request $request, $id){

        $menor = Authorizations::find($id);

        if(is_null($menor)){

            return response()->json(['Mensaje'=>'Registro no encontrado'],404);

        }

        $menor->update($request->all());

        return response($menor,200);
    }
    public function getAutorizantesTodos(){
        $menores = DB::table('authorizations')
        ->join('nationalities',   'authorizations.nationality_id',    '=', 'nationalities.id')
        ->join('type_documents',  'authorizations.type_document_id',  '=', 'type_documents.id')
        ->join('issuer_documents','authorizations.issuer_document_id','=', 'issuer_documents.id')
        ->join('sexes',           'authorizations.sex_id',            '=',  'sexes.id')
        ->select('authorizations.*', 'nationalities.nombre as nacionalidad','type_documents.descripcion as tipo_documento','issuer_documents.descripcion as emisor_documento','sexes.descripcion as sexo')
        ->get();
        return $menores;
    }
    public function eliminarAutorizante($id){

        $autorizante = Authorizations::find($id);

        if(is_null($autorizante)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
        }

        $autorizante->delete();

        return response()->json(['mensaje'=>'registro eliminado'],200);
    }
}
