<?php

namespace Database\Seeders;

use App\Models\AuthorizingRelative;
use Illuminate\Database\Seeder;

class AuthorizingRelartivesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $seed = new AuthorizingRelative();
        $seed->codigo = "1";
        $seed->descripcion = "PADRE";
        $seed->save();

        $seed = new AuthorizingRelative();
        $seed->codigo = "2";
        $seed->descripcion = "MADRE";
        $seed->save();

        $seed = new AuthorizingRelative();
        $seed->codigo = "3";
        $seed->descripcion = "SUPLETORIA JUDICIAL";
        $seed->save();

        $seed = new AuthorizingRelative();
        $seed->codigo = "4";
        $seed->descripcion = "PADRE/MADRE FALLECIDO";
        $seed->save();

        $seed = new AuthorizingRelative();
        $seed->codigo = "5";
        $seed->descripcion = "NO SE PRESENTA";
        $seed->save();

        $seed = new AuthorizingRelative();
        $seed->codigo = "6";
        $seed->descripcion = "MADRE SOLTERA";
        $seed->save();

        $seed = new AuthorizingRelative();
        $seed->codigo = "7";
        $seed->descripcion = "PADRE SOLTERO";
        $seed->save();

        $seed = new AuthorizingRelative();
        $seed->codigo = "8";
        $seed->descripcion = "ASENTIMIENTO";
        $seed->save();

        $seed = new AuthorizingRelative();
        $seed->codigo = "9";
        $seed->descripcion = "TUTOR";
        $seed->save();

        $seed = new AuthorizingRelative();
        $seed->codigo = "10";
        $seed->descripcion = "CURADOR";
        $seed->save();

        $seed = new AuthorizingRelative();
        $seed->codigo = "11";
        $seed->descripcion = "OTRO";
        $seed->save();
    }
}
