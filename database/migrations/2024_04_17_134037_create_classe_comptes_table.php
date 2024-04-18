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
        Schema::create('classe_comptes', function (Blueprint $table) {
            $table->id();
            $table->string('classe');
            $table->string('label');
            $table->timestamps();
        });

        // Insert account class labels
        $data = [
            ['classe' => '305', 'label' => 'COMPTES COURANTS ISLAMIQUE'],
            ['classe' => '300', 'label' => 'COMPTE COURANT'],
            ['classe' => '202', 'label' => 'COMPTES DEVISES COMMERÇANT'],
            ['classe' => '201', 'label' => 'COMPTE DEVISES PERSONNE PHYSIQUE'],
            ['classe' => '200', 'label' => 'COMPTE CHÈQUE'],
            ['classe' => '205', 'label' => 'COMPTE CHÈQUE ISLAMIQUE'],
            ['classe' => '252', 'label' => 'COMPTE LIVRET ÉPARGNE ISLAMIQUE'],
            ['classe' => '251', 'label' => 'COMPTE LIVRET ÉPARGNE BANQUE AVEC INTÉRÊTS'],
        ];

        DB::table('classe_comptes')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classe_comptes');
    }
};
