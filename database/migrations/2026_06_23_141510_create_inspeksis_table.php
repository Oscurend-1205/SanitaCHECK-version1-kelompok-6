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
        Schema::create('inspeksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fasilitas_id')->constrained('fasilitas')->onDelete('cascade');
            $table->foreignId('petugas_id')->constrained('users')->onDelete('cascade');
            $table->dateTime('tanggal_inspeksi');
            $table->enum('kondisi_kebersihan', ['baik', 'cukup', 'buruk']);
            $table->boolean('ketersediaan_air')->default(true);
            $table->boolean('ketersediaan_sabun')->default(true);
            $table->boolean('bau_tidak_sedap')->default(false);
            $table->text('catatan')->nullable();
            $table->enum('status_tindak_lanjut', ['aman', 'perlu dibersihkan', 'perlu perbaikan'])->default('aman');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspeksis');
    }
};
