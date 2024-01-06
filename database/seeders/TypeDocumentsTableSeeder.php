<?php

namespace Database\Seeders;

use App\Models\TypeDocument;
use Illuminate\Database\Seeder;

class TypeDocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $seed = new TypeDocument();
        $seed->codigo = "CI";
        $seed->descripcion = "CEDULA DE IDENTIDAD";
        $seed->save();

        $seed = new TypeDocument();
        $seed->codigo = "CD";
        $seed->descripcion = "CERTIFICADO DE VIAJE";
        $seed->save();

        $seed = new TypeDocument();
        $seed->codigo = "DD";
        $seed->descripcion = "DOCUMENTO DE VIAJE";
        $seed->save();

        $seed = new TypeDocument();
        $seed->codigo = "ID";
        $seed->descripcion = "DOCUMENTO NACIONAL DE IDENTIDAD";
        $seed->save();

        $seed = new TypeDocument();
        $seed->codigo = "LP";
        $seed->descripcion = "LAISSER PASSER";
        $seed->save();

        $seed = new TypeDocument();
        $seed->codigo = "LC";
        $seed->descripcion = "LIBRETA CIVICA";
        $seed->save();

        $seed = new TypeDocument();
        $seed->codigo = "LM";
        $seed->descripcion = "LIBRETA DE EMBARQUE (SEAMAN BOOK)";
        $seed->save();

        $seed = new TypeDocument();
        $seed->codigo = "LE";
        $seed->descripcion = "LIBRETA DE ENROLAMIENTO";
        $seed->save();

        $seed = new TypeDocument();
        $seed->codigo = "P";
        $seed->descripcion = "PASAPORTE";
        $seed->save();

        $seed = new TypeDocument();
        $seed->codigo = "PS";
        $seed->descripcion = "PASAPORTE DE SERVICIO";
        $seed->save();

        $seed = new TypeDocument();
        $seed->codigo = "PD";
        $seed->descripcion = "PASAPORTE DIPLOMATICO";
        $seed->save();

        $seed = new TypeDocument();
        $seed->codigo = "PO";
        $seed->descripcion = "PASAPORTE OFICIAL";
        $seed->save();

        $seed = new TypeDocument();
        $seed->codigo = "PP";
        $seed->descripcion = "PASAPORTE PROVISORIO";
        $seed->save();

        $seed = new TypeDocument();
        $seed->codigo = "SC";
        $seed->descripcion = "SALVOCONDUCTO";
        $seed->save();
    }
}
