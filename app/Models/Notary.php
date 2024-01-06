<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Notary extends Model
{
    // use HasFactory;
    use HasApiTokens;
    protected $fillable = ["id","nombre","apellido","matricula","email","password","tipo","habilitado","created_at","updated_at"];
}
