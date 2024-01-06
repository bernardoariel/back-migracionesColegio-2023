<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    protected $fillable = ["id","order_id","id_detalle","nombre_tabla","created_at","updated_at"];
}




