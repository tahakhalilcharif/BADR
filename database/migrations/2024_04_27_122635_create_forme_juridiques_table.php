<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormeJuridiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forme_juridiques', function (Blueprint $table) {
            $table->id();
            $table->string('forme_juridique');
            $table->string('libelle');
            $table->timestamps();
        });

        DB::table('forme_juridiques')->insert([
            ['forme_juridique' => 'SARL', 'libelle' => 'Société à responsabilité limitée'],
            ['forme_juridique' => 'EURL', 'libelle' => 'Entreprise unipersonnelle à responsabilité limitée'],
            ['forme_juridique' => 'SNC', 'libelle' => 'Société en nom collectif'],
            ['forme_juridique' => 'SPA', 'libelle' => 'Société par actions'],
            ['forme_juridique' => 'SCPA', 'libelle' => 'Société en commandite par actions'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forme_juridiques');
    }
}
