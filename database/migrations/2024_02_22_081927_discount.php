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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Ganti kolom 'discount_name' menjadi 'name'
            $table->enum('type', ['percentage', 'fixed']); // Tipe diskon: persentase atau nilai tetap
            $table->decimal('value', 10, 2); // Nilai diskon, dengan 10 digit di depan koma dan 2 digit di belakang koma
            $table->decimal('min_purchase_amount', 10, 2)->nullable(); // Jumlah minimum pembelian untuk memenuhi syarat diskon
            $table->date('start_date'); // Tanggal mulai diskon
            $table->date('end_date'); // Tanggal berakhir diskon
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('discount');
    }
};
