<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id('id_client');
            $table->string('nom');
            $table->string('prenom');
            $table->decimal('revenu', 10, 2);
            $table->enum('sexe', ['homme', 'femme']);
            $table->date('date_n');
            $table->string('lieu_n');
            $table->string('email')->unique();
            $table->string('num_tlf');
            $table->string('adresse');
            $table->string('wilaya');
            $table->string('commune');
            $table->string('daira');
            $table->enum('category', ['Personne Physique', 'Personne Morale']);
            $table->enum('type', ['Professionnel', 'Commercant', 'Particulier'])->nullable();
            $table->unsignedBigInteger('forme_juridique_id')->nullable(); // Foreign key to forme_juridiques table
            $table->foreign('forme_juridique_id')->references('id')->on('forme_juridiques');
            $table->string('denomination')->nullable();
            $table->string('activite')->nullable();
            $table->enum('status', ['vivant', 'mort']);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('clients');
    }
};
