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
        Schema::create('fiche_evenement', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('description');
            $table->string('rue');
            $table->string('ville');
            $table->string('cp');
            $table->string('type');
            $table->integer('nb_place');
        //
        });}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
