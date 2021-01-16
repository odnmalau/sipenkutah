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
            $table->integer('laki-laki');
            $table->integer('perempuan');
            $table->integer('anak-anak');
            $table->integer('total_pengikut');
            $table->string('jenis_barang', 50);
            $table->integer('jumlah');
            $table->string('keterangan', 100);
            $table->foreignId('id_napi')->constrained('narapidana')->onDelete('cascade');
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
