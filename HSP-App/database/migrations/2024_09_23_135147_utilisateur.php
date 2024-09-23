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
        Schema::create('utilisateur', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('fonction');
            $table->text('cv');
            $table->string('entreprise');
            $table->integer('ref_post');
            $table->integer('ref_reponse');
            $table->integer('ref_offre');
            $table->timestamps();

            //Clé étrangers

            $table->foreign('ref_post')->references('id')->on('post');
            $table->foreign('ref_reponse')->references('id')->on('reponse');
            $table->foreign('ref_offre')->references('id')->on('offre');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
