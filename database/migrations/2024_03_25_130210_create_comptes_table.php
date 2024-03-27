<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComptesTable extends Migration
{
    public function up()
    {
        Schema::create('compte', function (Blueprint $table) {
            $table->id('id_cmpt');
            $table->foreignId('id_client')->nullable();
            $table->double('solde');
            $table->date('date_ouv');
            $table->double('derniere_trn');
            $table->enum('statut', ['actif', 'bloque'])->default('actif');
            $table->tinyInteger('interdit_au_credit')->default(0);
            $table->tinyInteger('interdit_au_debit')->default(0);
            $table->string('banque', 3)->default('003');
            $table->string('agence', 5);
            $table->string('num_serie', 7);
            $table->string('cle', 2)->storedAs("97 - ((CAST(SUBSTRING(CONCAT(banque, agence, num_serie, classe), 4, 15) AS UNSIGNED) * 100) % 97)");
            $table->string('num_cmt', 20)->storedAs("CONCAT(banque, agence, num_serie, classe, cle)");
            $table->index('id_client');
            $table->foreign('id_client')->references('id_client')->on('client');
            $table->enum('classe' , ['201', '202', '300', '390', '397', '398']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('compte');
    }
}
