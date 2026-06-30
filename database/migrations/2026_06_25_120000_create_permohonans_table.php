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
        Schema::create('permohonans', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_number')->unique();
            $table->string('nama');
            $table->string('email');
            $table->string('nik');
            $table->string('telepon');
            $table->text('alamat');
            $table->string('kategori'); // permohonan, keberatan, penyalahgunaan, pengaduan
            $table->string('subjek');
            $table->text('perincian');
            $table->string('bentuk_informasi')->nullable();
            $table->string('cara_mendapatkan')->nullable();
            $table->string('file_bukti')->nullable();
            $table->string('status')->default('Pending'); // Pending, Ditinjau, Selesai, Ditolak
            $table->text('tanggapan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonans');
    }
};
