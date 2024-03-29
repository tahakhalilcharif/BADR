<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartesTable extends Migration
{
    public function up()
    {
        Schema::create('cartes', function (Blueprint $table) {
            $table->id('id_carte');
            $table->string('libelle', 100)->nullable();
            $table->decimal('plafond_atm', 10, 2)->nullable();
            $table->decimal('plafond_internet', 10, 2)->nullable();
            $table->decimal('plafond_poste', 10, 2)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cartes');
    }
}
