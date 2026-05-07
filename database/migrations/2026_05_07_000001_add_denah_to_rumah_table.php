<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('rumah', function (Blueprint $table) {
            if (!Schema::hasColumn('rumah', 'denah')) {
                $table->string('denah')->nullable()->after('foto');
            }
        });
    }

    public function down(): void
    {
        Schema::table('rumah', function (Blueprint $table) {
            if (Schema::hasColumn('rumah', 'denah')) {
                $table->dropColumn('denah');
            }
        });
    }
};