<?php

use App\Models\Pendaftaran;
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
        Schema::create('pertumbuhans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pendaftaran::class)->constrained()->cascadeOnDelete();
            $table->float('tb')->nullable();
            $table->float('bb')->nullable();
            $table->float('lk')->nullable();
            $table->string('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertumbuhans');
    }
};
