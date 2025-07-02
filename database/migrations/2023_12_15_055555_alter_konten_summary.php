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
        Schema::table('berita', function ($table) {
            $table->text('summary')->nullable();
        });

        Schema::table('artikel', function ($table) {
            $table->text('summary')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('berita', function ($table) {
            $table->dropColumn('summary');
        });

        Schema::table('artikel', function ($table) {
            $table->dropColumn('summary');
        });
    }
};
