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
        Schema::create('_historiques', function (Blueprint $table) {
            $table->id();
            $table->string('id');
            $table->string('NewStatut');
            $table->string('IdProduct');
            $table->string('IdUser');
            $table->string('IdResponsable');
            $table->dateTime('DateAffectation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_historiques');
    }
};
