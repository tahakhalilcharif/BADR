<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id('id_demande');
            $table->foreignId('id_client');
            $table->foreignId('id_carte');
            $table->foreignId('id_compte');
            $table->date('date_demande');
            $table->index('id_client');
            $table->index('id_carte');
            $table->index('id_compte');
            $table->foreign('id_client')->references('id_client')->on('clients');
            $table->foreign('id_carte')->references('id_carte')->on('cartes');
            $table->foreign('id_compte')->references('id_cmpt')->on('comptes');
            $table->enum('statut' , ['accepte', 'en attente', 'rejete', 'construite'])->default('en attente');
        });
    }

    public function down()
    {
        Schema::dropIfExists('demandes');
    }
}