<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherParents extends Model
{
    // use HasFactory;
    protected $fillable = ["id","apellido","segundo_apellido","nombre","otros_nombres","type_document_id","numero_de_documento","created_at","updated_at"];
}
