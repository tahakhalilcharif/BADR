<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyClientActivationCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_activation_codes', function (Blueprint $table) {
            // Remove the foreign key constraint and drop the 'id_client' column
            $table->dropForeign(['id_client']);
            $table->dropColumn('id_client');

            // Add the new 'user_id' column with a foreign key constraint
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_activation_codes', function (Blueprint $table) {
            // Add the 'id_client' column back and re-create the foreign key constraint
            $table->foreignId('id_client')->unique();
            $table->foreign('id_client')->references('id')->on('clients');

            // Drop the 'user_id' column
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
