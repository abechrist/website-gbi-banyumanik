<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('day'); // Senin, Selasa, Rabu, Kamis, Jumat, Sabtu, Minggu
            $table->time('start_time');
            $table->time('end_time');
            $table->string('type'); // ibadah, kegiatan
            $table->string('name'); // Ibadah Pagi, Sekolah Minggu, Persekutuan Doa, dll
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
