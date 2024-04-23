<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListeAgencesTable extends Migration
{
    public function up()
    {
        Schema::create('liste_agence', function (Blueprint $table) {
            $table->id();
            $table->string('code_agence');
            $table->string('nom_agence');
            $table->foreignId('code_wilaya');
            $table->foreign('code_wilaya')->references('code')->on('wilayas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('liste_agence');
    }
}