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
        Schema::create('post', function (Blueprint $table) {
            $table->id('id');
            $table->string('Titre');
            $table->string('Contenu');
            $table->string('Date');
            $table->time('Heure');
            $table->integer('ref_reponse');
            $table->timestamps();

            //Clé étrangers

            $table->foreign('ref_reponse')->references('id')->on('reponse');
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
