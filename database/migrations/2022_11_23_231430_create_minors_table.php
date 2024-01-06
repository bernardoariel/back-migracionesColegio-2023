<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minors', function (Blueprint $table) {
            $table->id();
            $table->string('apellido',30);
            $table->string('segundo_apellido',30)->nullable();
            $table->string('nombre',30);
            $table->string('otros_nombres',30)->nullable();
            $table->foreignId('nationality_id');
            $table->foreignId('type_document_id');
            $table->foreignId('issuer_document_id');
            $table->string('numero_de_documento',15);
            $table->date('fecha_de_nacimiento');
            $table->foreignId('sex_id');
            $table->string('domicilio',100);
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
        Schema::dropIfExists('minors');
    }
}
