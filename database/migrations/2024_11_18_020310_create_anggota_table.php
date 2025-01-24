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
        Schema::create('anggota', function (Blueprint $table) {
            $table->id();
            $table->integer('nia');
            $table->string('nama_anggota');
            $table->integer('buku_yang_dibaca');
            $table->text('alamat');
            $table->enum('jenis_kelamin',['Pria', 'Wanita']);
            $table->integer('buku_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota');
    }
};
