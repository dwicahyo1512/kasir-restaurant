<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kasirs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemesan');
            $table->integer('totaldiscount');
            $table->integer('totalpayment');
            $table->string('nama_discount');
            $table->string('type_discount');
            $table->string('value_discount');
            $table->string('min_purchase_amount');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            // Definisi foreign key constraints
        });

    }




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kasirs');
    }
};
