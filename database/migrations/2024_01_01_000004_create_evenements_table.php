<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('theme');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->text('description')->nullable();
            $table->decimal('cout_journalier', 10, 2);
            $table->foreignId('expert_id')->constrained('experts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evenements');
    }
};
