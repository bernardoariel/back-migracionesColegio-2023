<?php

namespace Database\Seeders;

use App\Models\Authorizations;
use Illuminate\Database\Seeder;

class AuthorizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $seed = new Authorizations();
        $seed->apellido = "Bernardo";
        $seed->segundo_apellido = "";
        $seed->nombre = "Ariel";
        $seed->otros_nombres = "Hernan";
        $seed->nationality_id = 11;
        $seed->type_document_id = 4;
        $seed->issuer_document_id = 13;
        $seed->numero_de_documento = '24159131';
        $seed->fecha_de_nacimiento = "1974/08/26";
        $seed->sex_id = 2;
        $seed->domicilio = "Las Heras 123";
        $seed->authorizing_relatives_id = 1;
        $seed->accreditation_links_id = 2;
        $seed->telefono = "3704299434";
        $seed->requiere_aut_adicional_de = "N";
        $seed->save();

        $seed = new Authorizations();
        $seed->apellido = "Gonzalez";
        $seed->segundo_apellido = "";
        $seed->nombre = "Noelia";
        $seed->otros_nombres = "Beatriz";
        $seed->nationality_id = 11;
        $seed->type_document_id = 4;
        $seed->issuer_document_id = 13;
        $seed->numero_de_documento = '30533170';
        $seed->fecha_de_nacimiento = "1983/10/26";
        $seed->sex_id = 1;
        $seed->domicilio = "Marcos sastre 4624";
        $seed->authorizing_relatives_id = 2;
        $seed->accreditation_links_id = 4;
        $seed->telefono = "3704660160";
        $seed->requiere_aut_adicional_de = "N";
        $seed->save();
    }
}
