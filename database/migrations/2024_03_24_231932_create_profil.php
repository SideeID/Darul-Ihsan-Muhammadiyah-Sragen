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
        Schema::create('profil', function (Blueprint $table) {
            $table->id();
            $table->text('judul')->nullable();
            $table->string('status')->nullable()->comment('waiting|published');
            $table->text('isi')->nullable();
            $table->timestamps();
        });

        Schema::create('profil_files', function (Blueprint $table) {
            $table->id();
            $table->integer('profil_id')->nullable();
            $table->text('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil');
        Schema::dropIfExists('profil_files');
    }
};
