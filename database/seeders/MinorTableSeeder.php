<?php

namespace Database\Seeders;

use App\Models\Minor;
use Illuminate\Database\Seeder;

class MinorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $menor = new Minor();
        $menor->apellido = "NN";
        $menor->segundo_apellido = "";
        $menor->nombre = "NN";
        $menor->otros_nombres = "";
        $menor->nationality_id = 11;
        $menor->type_document_id = 4;
        $menor->issuer_document_id = 13;
        $menor->numero_de_documento = '0';
        $menor->fecha_de_nacimiento = "2012/05/22";
        $menor->sex_id = 2;
        $menor->domicilio = "SIN DETERMINAR";
        $menor->save();

        $menor = new Minor();
        $menor->apellido = "Baez";
        $menor->segundo_apellido = "";
        $menor->nombre = "Misael";
        $menor->otros_nombres = "Alan";
        $menor->nationality_id = 11;
        $menor->type_document_id = 4;
        $menor->issuer_document_id = 13;
        $menor->numero_de_documento = '45423421';
        $menor->fecha_de_nacimiento = "2012/05/22";
        $menor->sex_id = 2;
        $menor->domicilio = "Parque Urbano I";
        $menor->save();

        $menor = new Minor();
        $menor->apellido = "Baez";
        $menor->segundo_apellido = "";
        $menor->nombre = "Naomi";
        $menor->otros_nombres = "Martina Esther";
        $menor->nationality_id = 11;
        $menor->type_document_id = 4;
        $menor->issuer_document_id = 13;
        $menor->numero_de_documento = '45662132';
        $menor->fecha_de_nacimiento = "2014/08/12";
        $menor->sex_id = 1;
        $menor->domicilio = "Parque Urbano I";
        $menor->save();
    }
}

