<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
"id",
"notary_id",
"minor_id",
"aprobacion",
"numero_actuacion_notarial_cert_firma",
"fecha_del_instrumento",
"cualquier_pais",
"serie_foja",
"tipo_foja",
"vigencia_hasta_mayoria_edad",
"fecha_vigencia_desde",
"fecha_vigencia_hasta",
"instrumento",
"nro_foja",
"paises_desc",
"created_at",
"updated_at"];
}
