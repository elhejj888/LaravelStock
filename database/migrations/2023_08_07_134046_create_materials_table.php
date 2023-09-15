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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('TypeProduit');
            $table->string('Marque');
            $table->string('Tag')->nullable(); // 'Tag' peut être NULL
            $table->string('AdresseMac')->nullable(); // 'AdresseMac' peut être NULL
            $table->string('N_Facture')->nullable(); // 'N_Facture' peut être NULL
            $table->dateTime('DateAchat');
            $table->dateTime('DateSortie')->nullable();
            $table->string('Fournisseur');
            $table->string('Emplacement');
            $table->string('Site');
            $table->string('etat');
            $table->string('choix');
            $table->string('userId')->nullable();            
            $table->string('description')->nullable();
    
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
