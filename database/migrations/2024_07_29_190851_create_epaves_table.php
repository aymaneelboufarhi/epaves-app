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
        Schema::create('epaves', function (Blueprint $table) {
            $table->id();
            $table->string('categorie');
            $table->enum('type_lieu_decouverte', ['train', 'gare']);
            $table->string('lieu_decouverte');
            $table->dateTime('date_heure_decouverte');
            $table->text('description')->nullable();
            $table->string('localisation');
            $table->string('couleur');
            $table->string('dimensions');
            $table->string('signes_distinctifs')->nullable();
            $table->json('photos')->nullable();
            $table->enum('statut', ['enregistré', 'en transit', 'récupéré']);
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
        Schema::dropIfExists('epaves');

    }
};
