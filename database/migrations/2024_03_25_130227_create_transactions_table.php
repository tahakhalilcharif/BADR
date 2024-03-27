<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id('trn_ref_no');
            $table->foreignId('id_compte_source')->nullable();
            $table->foreignId('id_compte_destination')->nullable();
            $table->decimal('montant', 10, 2)->nullable();
            $table->enum('type', ['D', 'C']);
            $table->datetime('date_trn')->nullable();
            $table->index('id_compte_source');
            $table->index('id_compte_destination');
            $table->foreign('id_compte_source')->references('id_cmpt')->on('compte');
            $table->foreign('id_compte_destination')->references('id_cmpt')->on('compte');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
