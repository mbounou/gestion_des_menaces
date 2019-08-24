<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToMenacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menaces', function (Blueprint $table) {
            $table->foreign('categorie_id','fk_menaces_categories')->references('id')->on('categorie_m_s')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menaces', function (Blueprint $table) {
            $table->dropForeign('fk_menaces_categories');
        });
    }
}
