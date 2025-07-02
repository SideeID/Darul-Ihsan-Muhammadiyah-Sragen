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
        Schema::create('nderek_tanglet', function (Blueprint $table) {
            $table->id();
            $table->text('nama')->nullable();
            $table->string('email')->nullable();
            $table->string('pertanyaan')->nullable();
            $table->text('jawaban')->nullable();
            $table->bigInteger('id_narasumber')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nderek');
    }
};
