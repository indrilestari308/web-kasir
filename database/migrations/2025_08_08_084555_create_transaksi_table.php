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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // kasir
            $table->string('kode_transaksi')->unique();
            $table->dateTime('tanggal');

            $table->decimal('total', 12, 2);       // total sebelum diskon
            $table->decimal('diskon', 5, 2)->default(0);  // diskon persen, misal 10.00 artinya 10%
            $table->decimal('total_setelah_diskon', 12, 2); // total - diskon
            $table->decimal('bayar', 12, 2);
            $table->decimal('kembalian', 12, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
