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
        Schema::create('input', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('pelabuhan'); // pilih pelabuhan
            $table->string('kapal'); // Password
            $table->date('tanggal_keberangkatan')->nullable();
            $table->time('jam_keberangkatan')->nullable();
            $table->string('trip')->nullable();
            $table->enum('jumlah_trip', ['1', '2', '3', '4', '5', '6', '7', '8'])->nullable();
            $table->string('dermaga');
            $table->string('keterangan');
            $table->timestamps(); // Timestamps untuk created_at dan updated_at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input');
    }
};
