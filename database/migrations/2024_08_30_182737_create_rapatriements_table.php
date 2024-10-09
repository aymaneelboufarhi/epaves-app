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
        Schema::create('rapatriements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('epave_id')->constrained()->onDelete('cascade');
            $table->string('gare_recuperation');
            $table->string('nom_client');
            $table->string('prenom_client');
            $table->string('cin_client');
            $table->string('email_client');
            $table->string('telephone_client');
            $table->string('od_client');
            $table->string('train_client');
            $table->dateTime('date_heure_voyage');
            $table->string('copie_billet')->nullable();
            $table->enum('statut', ['en attente', 'en cours', 'terminé'])->default('en attente');
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
        Schema::dropIfExists('rapatriements');
    }
};
