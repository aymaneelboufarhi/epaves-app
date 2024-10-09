<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('epaves', function (Blueprint $table) {
            // Ajouter la colonne user_id et créer la relation avec la table users
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->after('uuid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('epaves', function (Blueprint $table) {
            // Supprimer la colonne user_id
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

        });
    }
};
