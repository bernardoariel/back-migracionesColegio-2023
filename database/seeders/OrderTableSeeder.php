<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seed = new Order();
        $seed->notary_id = 1;
        $seed->minor_id=2;
        $seed->numero_actuacion_notarial_cert_firma = "100";
        $seed->fecha_del_instrumento = "2022/11/12";
        $seed->cualquier_pais = "y";
        $seed->serie_foja = "0645065046";
        $seed->tipo_foja = "4064654";
        $seed->vigencia_hasta_mayoria_edad = "y";
        $seed->fecha_vigencia_desde = "2023/01/01";
        $seed->fecha_vigencia_hasta = "2023/02/01";
        $seed->instrumento = "t";
        $seed->nro_foja = "046404";
        $seed->paises_desc = "brasil, uruguay, europa";
        $seed->save();
    }
}
