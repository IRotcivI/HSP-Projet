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
        Schema::create('fich_eve_utilisateur', function (Blueprint $table) {
            $table->foreign('ref_utilisateur')->references('id')->on('users');
            $table->foreign('ref_fiche_evenement')->references('id')->on('fiche_evenement');
            //
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
