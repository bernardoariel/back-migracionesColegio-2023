<?php

namespace Database\Seeders;

use App\Models\Nationality;
use Illuminate\Database\Seeder;

class NationalityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $seed = new Nationality();
        $seed->codigo = "AFG";
        $seed->nombre = "AFGANA";
        $seed->save();

        $seed = new Nationality();
        $seed->codigo = "ALB";
        $seed->nombre = "ALBANESA";
        $seed->save();

        $seed = new Nationality();
        $seed->codigo = "DEU";
        $seed->nombre = "ALEMANA";
        $seed->save();

        $seed = new Nationality();
        $seed->codigo = "AND";
        $seed->nombre = "ANDORRANA";
        $seed->save();

        $seed = new Nationality();
        $seed->codigo = "AGO";
        $seed->nombre = "ANGOLEÑA";
        $seed->save();

        $seed = new Nationality();
        $seed->codigo = "AIA";
        $seed->nombre = "ANGUILENSE";
        $seed->save();

        $seed = new Nationality();
        $seed->codigo = "ATG";
        $seed->nombre = "ANTIGUANA";
        $seed->save();

        $seed = new Nationality();
        $seed->codigo = "ANT";
        $seed->nombre = "ANTILLANO NEERLANDES";
        $seed->save();

        $seed = new Nationality();
        $seed->codigo = "ZZZ";
        $seed->nombre = "APATRIDA";
        $seed->save();

        $seed = new Nationality();
        $seed->codigo = "DZA";
        $seed->nombre = "ARGELINA";
        $seed->save();

        $seed = new Nationality();
        $seed->codigo = "ARG";
        $seed->nombre = "ARGENTINA";
        $seed->save();

        $seed = new Nationality();
        $seed->codigo = "ARM";
        $seed->nombre = "ARMENIA";
        $seed->save();

        $seed = new Nationality();
        $seed->codigo = "ABW";
        $seed->nombre = "ARUBANA";
        $seed->save();
    }
}
