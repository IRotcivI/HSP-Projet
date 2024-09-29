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
        Schema::create('utilisateur_offre', function (Blueprint $table) {
            $table->integer('ref_utilisateur');
            $table->integer('ref_offre');

            //Clé étrangers

            $table->foreign('ref_utilisateur')->references('id')->on('utilisateur');
            $table->foreign('ref_offre')->references('id')->on('offre');
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
