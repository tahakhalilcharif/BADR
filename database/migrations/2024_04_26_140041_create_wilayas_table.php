<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWilayasTable extends Migration
{
    public function up()
    {
        Schema::create('wilayas', function (Blueprint $table) {
            $table->id();
            $table->string('wilaya');
            $table->string('code')->unique();;
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wilayas');
    }
}