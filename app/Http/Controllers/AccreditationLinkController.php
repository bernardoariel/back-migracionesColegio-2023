<?php

namespace App\Http\Controllers;

use App\Models\AccreditationLink;
use App\Models\AuthorizingRelative;
use Illuminate\Http\Request;

class AccreditationLinkController extends Controller
{
    public function getAcreditacioneslinks(){
        return response()->json(AccreditationLink::all(),200);
    }

    public function getAcreditacionLinkId($id){

        $acreditacionLink = AccreditationLink::find($id);

        if(is_null($acreditacionLink)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
        }

        return response()->json($acreditacionLink::find($id),200);
    }
}
