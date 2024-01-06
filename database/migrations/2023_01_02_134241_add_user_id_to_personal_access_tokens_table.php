<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToPersonalAccessTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personal_access_tokens', function (Blueprint $table) {
            //
            $table->integer('user_id')->default(0);
            // $table->foreign('user_id')->references('id')->on('notaries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personal_access_tokens', function (Blueprint $table) {
            //
        });
    }
}
