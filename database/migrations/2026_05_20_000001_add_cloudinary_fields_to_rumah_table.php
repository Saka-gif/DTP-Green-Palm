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
            $table->string('foto_public_id')->nullable();
            $table->string('denah_public_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rumah', function (Blueprint $table) {
            $table->dropColumn(['foto_public_id', 'denah_public_id']);
        });
    }
};
