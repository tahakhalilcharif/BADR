<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id('id_client');
            $table->string('nom', 100);
            $table->string('prenom', 100);
            $table->integer('revenu')->default(0);
            $table->date('date_N');
            $table->string('lieu_N', 100);
            $table->string('email', 100);
            $table->string('num_tlf', 100);
            $table->string('adresse', 100);
            $table->string('wilaya', 100);
            $table->string('commune', 100);
            $table->string('daira', 100);
            $table->enum('categorie', ['Personne Physique', 'Personne Morale']);
            $table->enum('statut', ['vivant', 'mort'])->default('vivant');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
