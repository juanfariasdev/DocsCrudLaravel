<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nps_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Usuário que fez a avaliação
            $table->foreignId('business_id')->constrained('business')->onDelete('cascade'); // Empresa que foi avaliada
            $table->tinyInteger('rating')->unsigned(); // Avaliação de 1 a 5 estrelas
            $table->text('feedback')->nullable(); // Texto opcional para feedback
            $table->timestamp('started_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nps_reviews');
    }
};
