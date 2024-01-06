<?php

namespace Database\Seeders;

use App\Models\IssuerDocument;
use Illuminate\Database\Seeder;

class IssuerDocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $seed = new IssuerDocument();
        $seed->codigo = "AFG";
        $seed->descripcion = "AFGANA";
        $seed->save();

        $seed = new IssuerDocument();
        $seed->codigo = "ALB";
        $seed->descripcion = "ALBANESA";
        $seed->save();

        $seed = new IssuerDocument();
        $seed->codigo = "DEU";
        $seed->descripcion = "ALEMANA";
        $seed->save();

        $seed = new IssuerDocument();
        $seed->codigo = "AND";
        $seed->descripcion = "ANDORRANA";
        $seed->save();

        $seed = new IssuerDocument();
        $seed->codigo = "AGO";
        $seed->descripcion = "ANGOLEÑA";
        $seed->save();

        $seed = new IssuerDocument();
        $seed->codigo = "AIA";
        $seed->descripcion = "ANGUILA";
        $seed->save();

        $seed = new IssuerDocument();
        $seed->codigo = "ATA";
        $seed->descripcion = "ANTARTIDA";
        $seed->save();

        $seed = new IssuerDocument();
        $seed->codigo = "ATG";
        $seed->descripcion = "ANTIGUA Y BARBUDA";
        $seed->save();

        $seed = new IssuerDocument();
        $seed->codigo = "ANT";
        $seed->descripcion = "ANTILLAS HOLANDESAS";
        $seed->save();

        $seed = new IssuerDocument();
        $seed->codigo = "ZZZ";
        $seed->descripcion = "APATRIDA";
        $seed->save();

        $seed = new IssuerDocument();
        $seed->codigo = "SAU";
        $seed->descripcion = "ARABIA SAUDITA";
        $seed->save();

        $seed = new IssuerDocument();
        $seed->codigo = "DZA";
        $seed->descripcion = "ARGELIA";
        $seed->save();

        $seed = new IssuerDocument();
        $seed->codigo = "ARG";
        $seed->descripcion = "ARGENTINA";
        $seed->save();

        $seed = new IssuerDocument();
        $seed->codigo = "ARM";
        $seed->descripcion = "ARMENIA";
        $seed->save();


    }
}
