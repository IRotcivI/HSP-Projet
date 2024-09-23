<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fiche_etablissement', function (Blueprint $table) {
            $table->id('id');
            $table->string('Nom');
            $table->string('Rue');
            $table->string('Ville');
            $table->integer('CP');
            $table->string('Ville');
            $table->integer('ref_utilisateur');
            $table->timestamps();
        });
    }
        //

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
