<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id('id_prd');
            $table->foreignId('id_carte');
            $table->foreignId('id_compte');
            $table->date('date_expiration');
            $table->foreignId('id_demande')->nullable();
            $table->index('id_compte');
            $table->foreign('id_carte')->references('id_carte')->on('carte');
            $table->foreign('id_compte')->references('id_cmpt')->on('compte');
            $table->foreign('id_demande')->references('id_demande')->on('demande');
            $table->enum('statut' , ['valide', 'expiré']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
