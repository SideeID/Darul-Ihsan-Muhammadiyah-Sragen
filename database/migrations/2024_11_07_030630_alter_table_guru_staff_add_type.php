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
        Schema::table('guru_staff', function (Blueprint $table) {
            $table->string('type')->default('guru')->after('status');
            $table->string('sekolah')->nullable()->after('riwayat_pendidikan');
            $table->string('kota_pendidikan')->nullable()->after('sekolah');
            $table->string('tahun_mulai_pendidikan')->nullable()->after('kota_pendidikan');
            $table->string('tahun_berakhir_pendidikan')->nullable()->after('tahun_mulai_pendidikan');

            $table->string('pemberi_kerja')->nullable()->after('pengalaman');
            $table->string('kota_kerja')->nullable()->after('pemberi_kerja');
            $table->string('tahun_mulai_kerja')->nullable()->after('kota_kerja');
            $table->string('tahun_berakhir_kerja')->nullable()->after('tahun_mulai_kerja');

            $table->string('penyelenggara')->nullable()->after('prestasi');
            $table->string('juara')->nullable()->after('penyelenggara');
            $table->string('tingkat')->nullable()->after('juara');
            $table->string('tahun_prestasi')->nullable()->after('tingkat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guru_staff', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('sekolah');
            $table->dropColumn('kota_pendidikan');
            $table->dropColumn('tahun_mulai_pendidikan');
            $table->dropColumn('tahun_berakhir_pendidikan');
            $table->dropColumn('pemberi_kerja');
            $table->dropColumn('kota_kerja');
            $table->dropColumn('tahun_mulai_kerja');
            $table->dropColumn('tahun_berakhir_kerja');
            $table->dropColumn('penyelenggara');
            $table->dropColumn('juara');
            $table->dropColumn('tingkat');
            $table->dropColumn('tahun');
        });
    }
};
