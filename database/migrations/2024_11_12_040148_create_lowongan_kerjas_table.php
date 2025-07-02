<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('lowongan_kerjas', function (Blueprint $table) {
            $table->id();
            $table->string('posisi')->nullable();
            $table->date('tanggal_dibuka')->nullable();
            $table->date('tanggal_ditutup')->nullable();
            $table->string('foto')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongan_kerjas');
    }
};
