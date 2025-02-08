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
        Schema::create('inputmuatan', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('nama_kapal'); // Nama Kapal
            $table->enum('trip', ['1', '2', '3', '4', '5', '6', '7', '8'])->nullable();
            $table->date('tanggal');

            // Penumpang
            $table->integer('penumpang_dewasa')->default(0);
            $table->integer('penumpang_lansia')->default(0);
            $table->integer('penumpang_anak')->default(0);
            $table->integer('penumpang_bayi')->default(0);

            // Golongan Kendaraan
            $table->integer('golongan_1')->default(0);
            $table->integer('golongan_2')->default(0);
            $table->integer('golongan_3')->default(0);

            // Golongan 4: Kendaraan Penumpang & Kendaraan Barang
            $table->integer('golongan_4_penumpang')->default(0);
            $table->integer('golongan_4_barang')->default(0);

            // Golongan 5: Kendaraan Penumpang & Kendaraan Barang
            $table->integer('golongan_5_penumpang')->default(0);
            $table->integer('golongan_5_barang')->default(0);

            // Golongan 6: Kendaraan Penumpang & Kendaraan Barang
            $table->integer('golongan_6_penumpang')->default(0);
            $table->integer('golongan_6_barang')->default(0);

            // Golongan Lainnya
            $table->integer('golongan_7')->default(0);
            $table->integer('golongan_8')->default(0);
            $table->integer('golongan_9')->default(0);

            // Total Jumlah
            $table->integer('jumlah')->default(0);

            $table->timestamps(); // Created_at & Updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inputmuatan');
    }
};
