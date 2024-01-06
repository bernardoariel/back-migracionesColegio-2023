<?php

namespace Database\Seeders;

use App\Models\OtherParents;
use Illuminate\Database\Seeder;

class OtherParensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $seed = new OtherParents();
        $seed->apellido = "Prinsich";
        $seed->segundo_apellido = "";
        $seed->nombre = "Alejandra";
        $seed->otros_nombres = "";
        $seed->type_document_id = 4;
        $seed->numero_de_documento = '35444111';
        $seed->save();

        $seed = new OtherParents();
        $seed->apellido = "Lorenzetti";
        $seed->segundo_apellido = "";
        $seed->nombre = "Gabriel";
        $seed->otros_nombres = "Carlos";
        $seed->type_document_id = 4;
        $seed->numero_de_documento = '22333111';
        $seed->save();
    }
}

