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
        Schema::create('gallery_files', function (Blueprint $table) {
            $table->id();
            $table->integer('gallery_id')->nullable();
            $table->text('file');
            $table->timestamps();
        });

        Schema::table('gallery', function (Blueprint $table) {
            $table->dropColumn('file');
            $table->string('status')->nullable();
            $table->date('tanggal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_files');
    }
};
