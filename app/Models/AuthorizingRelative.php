<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorizingRelative extends Model
{
    // use HasFactory;
    protected $fillable = ["id","codigo","descripcion","created_at","updated_at"];
}
