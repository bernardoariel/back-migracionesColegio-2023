<?php

namespace Database\Seeders;

use App\Models\Sex;
use Illuminate\Database\Seeder;

class SexesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $seed = new Sex();
        $seed->codigo = "F";
        $seed->descripcion = "Femenino";
        $seed->save();

        $seed = new Sex();
        $seed->codigo = "M";
        $seed->descripcion = "Masculino";
        $seed->save();
    }
}
