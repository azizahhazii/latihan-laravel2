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
        Schema::create('user', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('email')->unique();
        $table->string('password');
        $table->date('tanggal_lahir')->nullable();
        $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
        $table->integer('tinggi_badan_awal')->nullable();
        $table->string('status_akun')->default('aktif');
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
