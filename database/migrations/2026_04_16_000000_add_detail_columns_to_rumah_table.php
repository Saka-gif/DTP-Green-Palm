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
        Schema::table('rumah', function (Blueprint $table) {
            if (!Schema::hasColumn('rumah', 'tipe_id')) {
                $table->unsignedBigInteger('tipe_id')->nullable()->after('foto');
            }
            if (!Schema::hasColumn('rumah', 'luas_tanah')) {
                $table->string('luas_tanah')->nullable()->after('tipe_id');
            }
            if (!Schema::hasColumn('rumah', 'luas_bangunan')) {
                $table->string('luas_bangunan')->nullable()->after('luas_tanah');
            }
            if (!Schema::hasColumn('rumah', 'kamar_tidur')) {
                $table->integer('kamar_tidur')->nullable()->after('luas_bangunan');
            }
            if (!Schema::hasColumn('rumah', 'kamar_mandi')) {
                $table->integer('kamar_mandi')->nullable()->after('kamar_tidur');
            }
            if (!Schema::hasColumn('rumah', 'lantai')) {
                $table->integer('lantai')->nullable()->after('kamar_mandi');
            }
            if (!Schema::hasColumn('rumah', 'carport')) {
                $table->integer('carport')->nullable()->after('lantai');
            }

            if (!Schema::hasColumn('rumah', 'tipe_id')) {
                $table->foreign('tipe_id')->references('id')->on('tipe_rumah')->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rumah', function (Blueprint $table) {
            $table->dropForeign(['tipe_id']);
            $table->dropColumn(['tipe_id', 'luas_tanah', 'luas_bangunan', 'kamar_tidur', 'kamar_mandi', 'lantai', 'carport']);
        });
    }
};
