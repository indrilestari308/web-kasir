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
    Schema::create('laporan', function (Blueprint $table) {
        $table->id();

        // Jenis laporan
        $table->enum('tipe_laporan', [
            'penjualan',
            'detail_penjualan',
            'stok_produk',
            'keuangan'
        ]);

        // Relasi utama
        $table->foreignId('user_id')->nullable()
              ->constrained('users')
              ->onDelete('set null'); // Kasir/Admin/Pemilik

        $table->foreignId('produk_id')->nullable()
              ->constrained('produk')
              ->onDelete('set null'); // Barang terkait laporan

        $table->foreignId('transaksi_id')->nullable()
              ->constrained('transaksi')
              ->onDelete('set null'); // Transaksi terkait laporan

        $table->foreignId('transaksi_detail_id')->nullable()
              ->constrained('transaksi_detail')
              ->onDelete('set null'); // Detail transaksi (opsional)

        // Kolom tambahan untuk catatan historis
        $table->string('nama_produk')->nullable(); // snapshot nama produk
        $table->decimal('harga_produk', 12, 2)->nullable(); // snapshot harga saat itu
        $table->integer('jumlah')->nullable(); // jumlah barang terjual

        $table->decimal('total', 12, 2)->nullable();
        $table->decimal('diskon', 5, 2)->nullable();
        $table->decimal('total_setelah_diskon', 12, 2)->nullable();
        $table->decimal('bayar', 12, 2)->nullable();
        $table->decimal('kembalian', 12, 2)->nullable();

        $table->timestamps();
    });
}
};
