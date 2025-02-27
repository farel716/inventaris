<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    Schema::create('peminjamen', function (Blueprint $table) {
        $table->id();
        $table->string('nisn');
        $table->string('kode_barang');
        $table->string('jumlah');
        $table->string('kode_unik')->unique();
        $table->timestamp('dipinjam');
        $table->dateTime('dikembalikan');
        $table->timestamps();

        $table->foreign('nisn')->references('nisn')->on('siswa')->onDelete('cascade');
        $table->foreign('kode_barang')->references('kode_barang')->on('barangs')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
