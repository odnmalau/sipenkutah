<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormAntrianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_antrian', function (Blueprint $table) {
            $table->id();
            $table->string('no_antrian', 100);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('tgl_kunjungan');
            $table->enum('waktu', ['Sesi Pagi - 09:00 s/d 11:00 WIB', 'Sesi Siang - 13:00 s/d 14:30 WIB'])->nullable();
            $table->integer('laki-laki')->nullable();
            $table->integer('perempuan')->nullable();
            $table->integer('anak-anak')->nullable();
            $table->integer('total_pengikut')->nullable();
            $table->string('jenis_barang', 50)->nullable();
            $table->integer('jumlah')->nullable();
            $table->text('keterangan')->nullable();
            $table->enum('status', ['Diterima', 'Ditolak'])->default('Ditolak')->nullable();
            $table->unsignedBigInteger('id_napi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_antrian');
    }
}
