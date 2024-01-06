<?php

namespace App\Http\Controllers;
use App\Models\Notary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotaryController extends Controller
{
    public function getEscribanos(){
        return response()->json(Notary::all(),200);
    }

    public function getEscribanoId($id){

        $escribano = Notary::find($id);

        if(is_null($escribano)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
        }

        return response()->json($escribano::find($id),200);
    }

    public function agregarEscribano(Request $request){

        $escribano = Notary::create($request->all());
        return response($escribano,200);

    }

    public function actualizarEscribano(Request $request, $id){

        $escribano = Notary::find($id);

        if(is_null($escribano)){

            return response()->json(['Mensaje'=>'Registro no encontrado'],404);

        }

        $escribano->update($request->all());

        return response($escribano,200);
    }

    public function eliminarEscribano($id){

        $escribano = Notary::find($id);

        if(is_null($escribano)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
        }

        $escribano->delete();

        return response()->json(['mensaje'=>'registro eliminado'],200);
    }


public function sendEmail()
{
    $email = 'arielbernardo@hotmail.com';
        $message = 'esto es una prueba';
   Mail::raw($message, function($message) use ($email) {
      $message->to($email)->subject('Mensaje personalizado');
      $message->from('xyz@example.com','Virat Gandhi');
   });
}
}
