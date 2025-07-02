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
        Schema::create('campaign', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->text('deskripsi')->nullable();
            $table->decimal('dana', '19', '4')->nullable();
            $table->text('poster')->nullable();
            $table->string('lembaga')->nullable();
            $table->string('penanggung_jawab')->nullable();
            $table->string('phone')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->string('status')->nullable()->comment('pending|approved|rejected|active|inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign');
    }
};
