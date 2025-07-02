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
        Schema::create('fasilitas_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fasilitas_id')->constrained('fasilitas')->onDelete('cascade');
            $table->string('file');
            $table->string('original');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas_files');
    }
};
