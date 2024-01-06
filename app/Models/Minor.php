<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minor extends Model
{
    // use HasFactory;
    protected $fillable = ["id","nombre","apellido","segundo_apellido","otros_nombres","nationality_id","type_document_id","issuer_document_id","numero_de_documento","fecha_de_nacimiento","sex_id","domicilio","created_at","updated_at"];
}
