<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('notary_id');
            $table->foreignId('minor_id');
            $table->string('aprobacion',50)->nullable();
            $table->string('numero_actuacion_notarial_cert_firma',50);
            $table->date('fecha_del_instrumento');
            $table->string('cualquier_pais',1);
            $table->string('serie_foja',25);
            $table->string('tipo_foja',25);
            $table->string('vigencia_hasta_mayoria_edad',1);
            $table->date('fecha_vigencia_desde');
            $table->date('fecha_vigencia_hasta');
            $table->string('instrumento',1);
            $table->string('nro_foja',50);
            $table->string('paises_desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
