<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authorizations', function (Blueprint $table) {
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
            $table->foreignId('authorizing_relatives_id');
            $table->foreignId('accreditation_links_id');
            $table->string('telefono',100)->nullable();
            $table->string('requiere_aut_adicional_de',100);
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
        Schema::dropIfExists('authorizations');
    }
}
