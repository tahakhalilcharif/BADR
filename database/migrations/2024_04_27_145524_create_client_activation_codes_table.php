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
        Schema::create('client_activation_codes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_client')->unique();
            $table->foreign('id_client')->references('id_client')->on('clients');
            $table->string('activation_code')->unique();
            $table->boolean('is_activated')->default(false);
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
        Schema::dropIfExists('client_activation_codes');
    }
};
