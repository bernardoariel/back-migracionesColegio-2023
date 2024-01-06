<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notaries', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("apellido");
            $table->string("matricula");
            $table->string("email");
            $table->string("password");
            $table->string("tipo");
            $table->enum('habilitado', ['habilitado', 'inhabilitado']);
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
        Schema::dropIfExists('notaries');
    }
}
