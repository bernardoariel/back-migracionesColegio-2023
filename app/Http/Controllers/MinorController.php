<?php

namespace App\Http\Controllers;

use App\Models\Minor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MinorController extends Controller
{
    public function getMenores(){
        return response()->json(Minor::all(),200);
    }

    public function getMenorId($id){

        $menores = Minor::find($id);

        if(is_null($menores)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
        }

        return response()->json($menores::find($id),200);
    }

    public function agregarMenor(Request $request){

        $menor = Minor::create($request->all());
        return response($menor,200);

    }

    public function actualizarMenor(Request $request, $id){

        $menor = Minor::find($id);

        if(is_null($menor)){

            return response()->json(['Mensaje'=>'Registro no encontrado'],404);

        }

        $menor->update($request->all());

        return response($menor,200);
    }

    public function eliminarMenor($id){

        $menor = Minor::find($id);

        if(is_null($menor)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
        }

        $menor->delete();

        return response()->json(['mensaje'=>'registro eliminado'],200);
    }

    public function getMenoresTodos(){
        $menores = DB::table('minors')
        ->join('nationalities',   'minors.nationality_id',    '=', 'nationalities.id')
        ->join('type_documents',  'minors.type_document_id',  '=', 'type_documents.id')
        ->join('issuer_documents','minors.issuer_document_id','=', 'issuer_documents.id')
        ->join('sexes',           'minors.sex_id',            '=',  'sexes.id')
        ->select('minors.*', 'nationalities.nombre as nacionalidad','type_documents.descripcion as tipo_documento','issuer_documents.descripcion as emisor_documento','sexes.descripcion as sexo')
        ->get();
        return $menores;
    }
}
