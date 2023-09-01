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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
                $table->string('Qui')->nullable();
                $table->string('TypeProduit')->nullable();
                $table->string('Marque')->nullable();
                $table->string('Choix')->nullable();
                $table->string('Foutnisseur')->nullable();
                $table->string('Emplacement')->nullable();
                $table->string('Service')->nullable();
                $table->string('Site')->nullable();
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
