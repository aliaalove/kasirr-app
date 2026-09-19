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
    Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        $table->string('kode_transaksi')->unique();
        $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
        $table->integer('jumlah');
        $table->bigInteger('total_harga');
        $table->bigInteger('bayar');
        $table->bigInteger('kembalian');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
