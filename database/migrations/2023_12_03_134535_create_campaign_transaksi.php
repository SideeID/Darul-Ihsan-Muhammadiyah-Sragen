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
        Schema::create('campaign_transaksi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_campaign')->nullable();
            $table->string('nama_donatur')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('bank')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->decimal('nominal', '19', '4')->nullable();
            $table->string('status')->nullable()->comment('waiting|confirmed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_transaksi');
    }
};
