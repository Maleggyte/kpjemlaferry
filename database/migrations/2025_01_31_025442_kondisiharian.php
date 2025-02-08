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
        Schema::create('kondisi', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('pilih_pelabuhan'); // pilih pelabuhan
            $table->date('tanggal'); // Password
            $table->integer('kapal_operasi')->nullable();
            $table->string('pola_operasi');
            $table->string('kendala');
            $table->enum('cuaca_pagi', ['cerah', 'hujan', 'berkabut', 'extreme'])->nullable();
            $table->enum('cuaca_siang', ['cerah', 'hujan', 'berkabut', 'extreme'])->nullable();
            $table->enum('cuaca_sore', ['cerah', 'hujan', 'berkabut', 'extreme'])->nullable();
            $table->enum('cuaca_malam', ['cerah', 'hujan', 'berkabut', 'extreme'])->nullable();
            $table->enum('angin_pagi', ['tenang', 'lemah', 'sedang', 'kencang'])->nullable();
            $table->enum('angin_siang', ['tenang', 'lemah', 'sedang', 'kencang'])->nullable();
            $table->enum('angin_sore', ['tenang', 'lemah', 'sedang', 'kencang'])->nullable();
            $table->enum('angin_malam', ['tenang', 'lemah', 'sedang', 'kencang'])->nullable();
            $table->enum('gelombang_pagi', ['tenang', 'rendah', 'sedang', 'tinggi'])->nullable();
            $table->enum('gelombang_siang', ['tenang', 'rendah', 'sedang', 'tinggi'])->nullable();
            $table->enum('gelombang_sore', ['tenang', 'rendah', 'sedang', 'tinggi'])->nullable();
            $table->enum('gelombang_malam', ['tenang', 'rendah', 'sedang', 'tinggi'])->nullable();
            $table->enum('lintasan_pagi', ['sepi', 'sedang', 'ramai'])->nullable();
            $table->enum('lintasan_siang', ['sepi', 'sedang', 'ramai'])->nullable();
            $table->enum('lintasan_sore', ['sepi', 'sedang', 'ramai'])->nullable();
            $table->enum('lintasan_malam', ['sepi', 'sedang', 'ramai'])->nullable();
            $table->timestamps(); // Timestamps untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kondisi');
    }
};
