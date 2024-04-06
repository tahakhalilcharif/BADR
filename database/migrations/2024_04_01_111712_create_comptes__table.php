<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComptesTable extends Migration
{
    public function up()
    {
        Schema::create('comptes', function (Blueprint $table) {
            $table->id('id_cmpt');
            $table->foreignId('id_client')->nullable();
            $table->double('solde');
            $table->date('date_ouv')->default(now());
            $table->double('derniere_trn');
            $table->enum('statut', ['actif', 'bloque'])->default('bloque');
            $table->tinyInteger('interdit_au_credit')->default(0);
            $table->tinyInteger('interdit_au_debit')->default(0);
            $table->string('banque', 3)->default('003');
            $table->string('agence', 5);
            $table->string('num_serie', 7);
            $table->string('cle', 2)->storedAs("97 - ((CAST(SUBSTRING(CONCAT(banque, agence, num_serie, classe), 4, 15) AS UNSIGNED) * 100) % 97)");
            $table->string('num_cmt', 20)->storedAs("CONCAT(banque, agence, num_serie, classe, cle)");
            $table->index('id_client');
            $table->foreign('id_client')->references('id_client')->on('clients');
            $table->enum('classe' , ['201', '202', '300', '251', '200', '255']);
        });

    
        Schema::table('produits', function (Blueprint $table) {
            $table->string('numero_carte', 16)->unique()->default($this->generateRandomCardNumber());
            $table->string('cvv2', 3)->default($this->generateRandomCVV());
            $table->string('code_pin', 4)->default($this->generateRandomPIN());
        });
    }

    private function generateRandomCardNumber()
    {
        return '6280' . rand(100000000000000, 999999999999999);
    }

    private function generateRandomCVV()
    {
        return str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
    }

    private function generateRandomPIN()
    {
        return str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
    }

    

    public function down()
    {
        Schema::dropIfExists('comptes');
    }
}
