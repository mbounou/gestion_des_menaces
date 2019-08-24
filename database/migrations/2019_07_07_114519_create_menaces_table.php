<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menaces', function (Blueprint $table) {
            $table->bigInteger('id',true);
            $table->bigInteger('categorie_id')->index('fk_menaces_categories');
            $table->text('signature');
            $table->text('nom_menace');
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
        Schema::dropIfExists('menaces');
    }
}
