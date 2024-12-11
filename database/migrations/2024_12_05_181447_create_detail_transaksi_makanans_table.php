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
        Schema::create('detail_transaksi_makanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_makanan_id')->constrained('transaksi_makanans')->onDelete('cascade');
            $table->foreignId('makanan_id')->constrained('makanans')->onDelete('cascade');
            $table->integer('jumlah_makanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi_makanans');
    }
};
