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
        Schema::create('log_parkir', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kendaraan')->constrained('kendaraan')->onDelete('cascade');
            $table->foreignId('id_tempat')->constrained('tempat')->onDelete('cascade');
            $table->timestamp('waktu_masuk');
            $table->timestamp('waktu_keluar')->nullable();
            $table->enum('status', ['gerbang_depan, gerbang_belakang'])->deafult('gerbang_belakang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
