<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('lowongan_kerjas', function (Blueprint $table) {
            $table->dropColumn('kualifikasi');
            $table->dropColumn('tugas');
        });
    }

    public function down()
    {
        Schema::table('lowongan_kerjas', function (Blueprint $table) {
            $table->text('kualifikasi')->nullable();
            $table->text('tugas')->nullable();
        });
    }
};