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
        Schema::create('hopital', function (Blueprint $table) {
            $table->id('id');
            $table->string('Nom');
            $table->string('Specialite');
            $table->string('Rue');
            $table->string('Voie');
            $table->integer('CP');
            $table->integer('ref_utilisateur');
            $table->timestamps();

            //Clé étrangers

            $table->foreign('ref_utilisateur')->references('id')->on('utilisateur');
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
