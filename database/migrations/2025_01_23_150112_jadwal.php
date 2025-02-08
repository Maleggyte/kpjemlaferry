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
            Schema::create('jadwal', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('pilih_pelabuhan'); // pilih pelabuhan
            $table->string('nama_kapal'); // pilih nama kapal
            $table->date('tanggal_keberangkatan'); // Password
            $table->time('jam_sandar');
            $table->time('jam_keberangkatan');
            $table->string('dermaga');
            $table->timestamps(); // Timestamps untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
