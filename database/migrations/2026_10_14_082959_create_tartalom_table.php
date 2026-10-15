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
        Schema::create('tartalom', function (Blueprint $table) {
            $table->id();
            $table->foreignId('suti_id')->constrained('suti')->cascadeOnDelete();
            $table->string('mentes', 5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tartalom');
    }
};
