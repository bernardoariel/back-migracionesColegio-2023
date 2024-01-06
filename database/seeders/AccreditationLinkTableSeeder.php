<?php

namespace Database\Seeders;

use App\Models\AccreditationLink;
use Illuminate\Database\Seeder;

class AccreditationLinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $seed = new AccreditationLink();
        $seed->codigo = "1";
        $seed->descripcion = "PARTIDA/CERTIFICADO NACIMIENTO";
        $seed->save();

        $seed = new AccreditationLink();
        $seed->codigo = "2";
        $seed->descripcion = "LIBRETA DE FAMILIA";
        $seed->save();

        $seed = new AccreditationLink();
        $seed->codigo = "3";
        $seed->descripcion = "PARTIDA DE DEFUNCION";
        $seed->save();

        $seed = new AccreditationLink();
        $seed->codigo = "4";
        $seed->descripcion = "TESTIMONIO JUDICIAL";
        $seed->save();
        $seed = new AccreditationLink();
        $seed->codigo = "5";
        $seed->descripcion = "NUEVO DNI";
        $seed->save();
    }
}
