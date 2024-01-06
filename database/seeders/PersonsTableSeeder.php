<?php

namespace Database\Seeders;

use App\Models\Persons;
use Illuminate\Database\Seeder;

class PersonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seed = new Persons();
        $seed->apellido = "Dominguez";
        $seed->segundo_apellido = "";
        $seed->nombre = "Juan";
        $seed->otros_nombres = "";
        $seed->type_document_id = 4;
        $seed->numero_de_documento = '11111111';
        $seed->save();

        $seed = new Persons();
        $seed->apellido = "Vengas";
        $seed->segundo_apellido = "";
        $seed->nombre = "Omar";
        $seed->otros_nombres = "Pablo";
        $seed->type_document_id = 4;
        $seed->numero_de_documento = '2222222';
        $seed->save();
    }
}
