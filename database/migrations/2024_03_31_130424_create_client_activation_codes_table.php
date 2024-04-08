<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientActivationCodesTable extends Migration
{
    public function up()
    {
        Schema::create('client_activation_codes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_client')->nullable();
            $table->foreign('id_client')->references('id_client')->on('clients');
            $table->string('activation_code')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('client_activation_codes');
    }
}
