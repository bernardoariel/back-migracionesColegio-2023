<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authorizations extends Model
{
    // use HasFactory;
    protected $fillable = ["id","nombre","apellido","segundo_apellido","otros_nombres","nationality_id","type_document_id","issuer_document_id","numero_de_documento","fecha_de_nacimiento","sex_id","domicilio",
    "authorizing_relatives_id","accreditation_links_id","telefono","requiere_aut_adicional_de","created_at","updated_at"];
}
