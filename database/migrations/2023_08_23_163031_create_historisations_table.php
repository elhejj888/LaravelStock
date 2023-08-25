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
        Schema::create('historisations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('edited_id');
            $table->string('FullName'); // nom complet du modificateur
            $table->string('operation'); // created, updated, deleted
            $table->string('type'); // created, updated, deleted
            $table->json('changes'); // Pour stocker les changements en JSON
            $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historisations');
    }
};
