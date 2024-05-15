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
        Schema::table('pertumbuhans', function (Blueprint $table) {
            $table->date('tglposyandu')->after('catatan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pertumbuhans', function (Blueprint $table) {
            $table->dropColumn('tglposyandu');
        });
    }
};
