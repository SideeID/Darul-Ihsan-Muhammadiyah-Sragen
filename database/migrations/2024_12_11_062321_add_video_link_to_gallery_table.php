<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVideoLinkToGalleryTable extends Migration
{
    public function up()
    {
        Schema::table('gallery', function (Blueprint $table) {
            // Tambahkan kolom video_link jika belum ada
            if (!Schema::hasColumn('gallery', 'video_link')) {
                $table->text('video_link')->nullable()->after('type');
            }
        });
    }

    public function down()
    {
        Schema::table('gallery', function (Blueprint $table) {
            // Hapus kolom jika rollback
            if (Schema::hasColumn('gallery', 'video_link')) {
                $table->dropColumn('video_link');
            }
        });
    }
}